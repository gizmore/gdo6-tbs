<?php
namespace GDO\TBS;

use GDO\User\GDO_User;
use GDO\Core\GDT;

/**
 * An icon that represents solvestate for a category.
 * @author gizmore
 * @see GDT_ChallengeCategory
 * @see GDO_Challenge
 */
final class GDT_TBS_GroupmasterIcon extends GDT
{
    /**
     * @return GDO_User
     */
    public function getUser()
    {
        return $this->gdo;
    }
    
    public function getPercent()
    {
        $catID = GDT_TBS_ChallengeCategory::getCategoryID($this->category);
        $user = $this->getUser();
        
        $key_points = "csc_points_{$catID}";
        $key_max_points = "csc_max_points_{$catID}";
        
        $update = false;
        
        if ($user->hasVar($key_points))
        {
            $vars = $user->getGDOVars();
        }
        elseif (!$user->tempHas($key_points))
        {
            $vars = GDO_TBS_ChallengeSolvedCategory::get($user)->getGDOVars();
            $update = true;
        }
        else
        {
            $vars = $user->temp;
        }
       
        $points = floatval($vars[$key_points]);
        $max = floatval($vars[$key_max_points]);
        
        if ($update)
        {
            $user->tempSet($key_points, $points);
            $user->tempSet($key_max_points, $max);
            $user->recache();
        }
        
        return $max > 0 ? $points / $max * 100.0 : 0.0;
    }
    
    public $category;
    public function category($category)
    {
        $this->category = $category;
        return $this;
    }
    
    public function renderCard()
    {
        return $this->renderCell();
    }
    
    /**
     * Render category badge.
     * @TODO The formula is wrong. On original TBS the badges are given differently.
     */
    public function renderCell()
    {
        $user = $this->getUser();
        $module = Module_TBS::instance();
        $catID = GDT_TBS_ChallengeCategory::getCategoryID($this->category);
        $catID += 1;
        $perc = $this->getPercent();
        $titlekey = 'tt_tbs_groupmaster';
        if ($perc >= 100)
        {
            $path = "groupmasters/{$catID}_all.gif";
        }
        elseif ($perc >= 50)
        {
            $path = "groupmasters/{$catID}_neutral.gif";
        }
        else
        {
            $path = "groupmasters/{$catID}_sad.gif";
        }
        
        $title = t($titlekey, [$user->displayNameLabel(), $perc, $this->category]);
        
        return $module->rawIcon($path, $title);
    }
    
}
