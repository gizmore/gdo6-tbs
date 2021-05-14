<?php
namespace GDO\TBS;

use GDO\Core\GDT_Error;
use GDO\Core\GDT_Success;
use GDO\User\GDO_User;
use GDO\Util\Process;
use GDO\Util\Strings;
use GDO\Python\Module_Python;
use GDO\TBS\Method\Ranking;

/**
 * Logic for solution submission.
 * Also calls solutionChecker.py
 * @author gizmore
 * @version 6.10
 * @since 6.10
 */
final class ChallSolveEngine
{
    private $challenge;
    
    public function __construct(GDO_TBS_Challenge $challenge)
    {
        $this->challenge = $challenge;
    }
    
    public function onSolve($answer)
    {
        if (!$this->checkSolveAttempt())
        {
            return;
        }
        
        /** @var $bcrypt \GDO\Util\BCrypt **/
        $bcrypt = $this->challenge->getValue('chall_solution');
        if ($bcrypt === null)
        {
            if ($this->challenge->getStatus() === GDT_TBS_ChallengeStatus::NOT_TRIED)
            {
                $this->onSolveSolutionChecker($answer);
            }
        }
        elseif ($bcrypt->validate($answer))
        {
            $this->solved(GDO_User::current());
        }
        else
        {
            $this->wrong(GDO_User::current());
        }
    }
    
    /**
     * Check if a user needs to wait to submit another solution.
     * @return boolean
     */
    private function checkSolveAttempt()
    {
        $user = GDO_User::current();
        if ($time = GDO_TBS_ChallengeSolveAttempt::getTimeout($user))
        {
            echo GDT_Error::responseWith('err_tbs_solve_timeout', [$time])->render();
            return false;
        }
        return true;
    }
    
    private function getURL()
    {
        return $this->challenge->getURL()->raw;
    }
    
    private function onSolveSolutionChecker($answer)
    {
        $module = Module_TBS::instance();
        $python = Module_Python::instance()->cfgPythonPath();
        $script = GDO_PATH . 'GDO/TBS/bin/solutionChecker.py';
        $script = Process::osPath($script);
        $tbsURL = Strings::substrFrom($this->getURL(), '/challenges/');
        $user = $module->cfgSolveUser();
        $pass = $module->cfgSolvePass();
        $params = sprintf('"%s" "%s" "%s" "%s"',
            $tbsURL, $answer, $user, $pass);
        $output = null; # returned via reference
        $return = null; # returned via reference
        $command = "$python $script $params";
        exec($command, $output, $return);
        var_dump($output);
        if ($return === 0) #&& $output)
        {
            if ($output[0] === 'OK')
            {
                $this->solved(GDO_User::current());
                $this->onRegisterSolution($answer);
            }
            elseif ($output[0] === 'FAILED')
            {
                $this->wrong(GDO_User::current());
            }
            else
            {
                echo "Checker output is " . implode('<br/>', $output);
            }
        }
        else
        {
            echo "Checker returned $return: " . implode('<br/>', $output) . ".";
        }
    }
    
    private function onRegisterSolution($answer)
    {
        $this->challenge->saveVar('chall_solution', $answer);
    }
    
    private function wrong(GDO_User $user)
    {
        echo GDT_Error::responseWith('err_tbs_solve_wrong')->render();
        GDO_TBS_ChallengeSolveAttempt::tried(GDO_User::current(), $this->challenge);
        return false;
    }
    
    public function solved(GDO_User $user=null)
    {
        $user = $user === null ? GDO_User::current() : $user;
        
        if (!$this->challenge->isPersisted())
        {
            return $this->response('msg_tbs_solved_alpha');
        }
        
        if ($this->challenge->hasSolved($user))
        {
            return $this->response('msg_tbs_solved_already');
        }
        
        return $this->onSolved($user);
    }
    
    private function onSolved(GDO_User $user)
    {
        # Mark solved
        GDO_TBS_ChallengeSolved::challengeSolved($this->challenge, $user);
        
        # Calculate category stats
        list($before, $after) = GDO_TBS_ChallengeSolvedCategory::updateUser($user);

        # Flush Ranking cache
        Ranking::make()->fileUncache();
        
        # Response with gain.
        $gain = $after - $before;
        return $this->response('msg_tbs_solved', [$gain, $after]);
    }
    
    private function response($key, array $args=null)
    {
        echo GDT_Success::make()->text($key, $args)->render();
        return true;
    }
    
}
