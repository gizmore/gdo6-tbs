<?php
namespace GDO\TBS\Method;

use GDO\Form\GDT_Form;
use GDO\Form\MethodForm;
use GDO\TBS\Module_TBS;
use GDO\UI\GDT_Page;
use GDO\Form\GDT_Submit;
use GDO\Form\GDT_AntiCSRF;
use GDO\TBS\GDO_TBS_ChallengeSolvedCategory;
use GDO\Core\Application;
use GDO\Core\MethodAdmin;

final class RecalcPoints extends MethodForm
{
    use MethodAdmin;
    
    public function isTransactional() { return false; }
    
    public function beforeExecute()
    {
        if (Application::instance()->isHTML())
        {
            $this->renderNavBar('TBS');
            GDT_Page::$INSTANCE->topTabs->addField(
                Module_TBS::instance()->barAdminTabs()
            );
        }
    }
    
    public function createForm(GDT_Form $form)
    {
        $form->info(t('tbs_reacalc_points_info'));
        $form->addFields([
            GDT_AntiCSRF::make(),
        ]);
        $form->actions()->addField(GDT_Submit::make());
    }
    
    public function formValidated(GDT_Form $form)
    {
        set_time_limit(60*60);
        GDO_TBS_ChallengeSolvedCategory::updateUsers();
        return $this->message('tbs_msg_recalced');
    }
    
}
