<?php
namespace GDO\TBS\Method;

use GDO\Core\GDO;
use GDO\Core\MethodCompletionSearch;
use GDO\TBS\GDO_TBS_Challenge;

/**
 * Auto completion for challenges.
 * @author gizmore
 */
final class ChallengeCompletion extends MethodCompletionSearch
{
    public function gdoTable()
    {
        return GDO_TBS_Challenge::table();
    }

    public function renderJSON(GDO $gdo)
    {
        /** @var $gdo GDO_TBS_Challenge **/
        return [
            'id' => $gdo->getID(),
            'text' => $gdo->displayTitle(),
            'display' => $gdo->renderChoice(),
        ];
    }
    
    public function gdoHeaderColumns()
    {
        return GDO_TBS_Challenge::table()->gdoColumnsExcept(
            'chall_deleted', 'chall_deletor', 'chall_solution',
        );
    }
    
}
