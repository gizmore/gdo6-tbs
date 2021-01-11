<?php
namespace GDO\TBS;

use GDO\DB\GDT_Enum;

/**
 * Indicate challenge import status.
 * @author gizmore
 */
final class GDT_TBS_ChallengeStatus extends GDT_Enum
{
    const NOT_CHECKED = 'tbs_not_checked';
    const WONT_FIX = 'tbs_wont_fix';
    const NEED_FILES = 'tbs_need_files';
    const IN_PROGRESS = 'tbs_in_progress';
    const WORKING = 'tbs_working';
    
    protected function __construct()
    {
        parent::__construct();
        $this->enumValues(self::NOT_CHECKED, self::WONT_FIX, self::NEED_FILES, self::IN_PROGRESS, self::WORKING);
        $this->label('tbs_chall_status');
        $this->notNull();
        $this->initial(self::NOT_CHECKED);
    }

}
