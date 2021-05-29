<?php
namespace GDO\TBS;

use GDO\DB\GDT_Enum;
use GDO\UI\GDT_Tooltip;
use GDO\User\GDO_User;
use GDO\UI\GDT_Link;

/**
 * Indicate challenge import status.
 * @author gizmore
 */
final class GDT_TBS_ChallengeStatus extends GDT_Enum
{
    const NOT_CHECKED = 'not_checked';
    const NOT_TRIED = 'not_tried';
    const IN_PROGRESS = 'in_progress';
    const WONT_FIX = 'wont_fix';
    const NEED_FILES = 'need_files';
    const WORKING = 'working';

    public static $COLORS = [
        self::NOT_CHECKED => '#666', # no auto checker. no exception for auto checker. initial
        self::NOT_TRIED => '#AAA', # auto checker, but no success yet. set automatically for not checked challs after import.
        self::IN_PROGRESS => '#933', # we have to manually work at it. manually assigned
        self::NEED_FILES => '#F77', # we are aware we need more files. manually assigned.
        self::WONT_FIX => '#F00', # cannot or won't fix. manually assigned.
        self::WORKING => '#0F0', # challenge should be working. manually assigned.
    ];
    
    /**
     * @var GDT_Tooltip
     */
    private $tooltip;
    
    /**
     * @var GDT_Link
     */
    private $editLink;
    
    protected function __construct()
    {
        parent::__construct();
        $this->enumValues(
            self::NOT_CHECKED,
            self::NOT_TRIED,
            self::IN_PROGRESS,
            self::NEED_FILES,
            self::WONT_FIX,
            self::WORKING);
        $this->label('tbs_chall_status');
        $this->notNull();
        $this->initial(self::NOT_CHECKED);
        $this->tooltip = GDT_Tooltip::make('chall_tooltip');
        $this->editLink = GDT_Link::make('chall_edit_link');
    }
    
    /**
     * @return GDO_TBS_Challenge
     */
    public function getChallenge()
    {
        return $this->gdo;
    }
    
    public function enumLabel($enumValue=null)
    {
        return $enumValue === null ? t($this->emptyLabel, $this->emptyLabelArgs) : t("tbs_tt_$enumValue");
    }
    
    
    public function renderCell()
    {
        # Build status tooltip icon.
        $key = 'tbs_tt_'.$this->getVar();
        $tt = $this->tooltip->tooltip($key)->render();
        $color = self::$COLORS[$this->getVar()];
        $icon = sprintf('<div style="color: %s;">%s</div>', $color, $tt);
        
        # If we can edit we return a link with icon as label.
        if (GDO_User::current()->isStaff())
        {
            return $this->editLink->href($this->getChallenge()->hrefEdit())->labelRaw($icon)->render();
        }
        
        # Else just the icon.
        return $icon;
    }

}
