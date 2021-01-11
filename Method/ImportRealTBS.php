<?php
namespace GDO\TBS\Method;

use GDO\Core\MethodAdmin;
use GDO\TBS\Module_TBS;
use GDO\TBS\Install\ImportTBS;
use GDO\UI\GDT_Page;
use GDO\Form\GDT_Form;
use GDO\Form\MethodForm;
use GDO\Form\GDT_Submit;
use GDO\Form\GDT_AntiCSRF;
use GDO\DB\GDT_Checkbox;
use GDO\DB\Database;

/**
 * Import data from the INPUT/ folder.
 * 
 * @see README.md for import instructions.
 * 
 * @author gizmore
 */
final class ImportRealTBS extends MethodForm
{
    use MethodAdmin;
    
    public function isTransactional() { return false; }
    
    /**
     * Before execute we add the top tabs.
     * @see MethodAdmin
     */
    public function beforeExecute()
    {
        $this->renderNavBar('TBS');
        GDT_Page::$INSTANCE->topTabs->addField(
            Module_TBS::instance()->barAdminTabs()
        );
    }
    
    public function createForm(GDT_Form $form)
    {
        $form->info(t('tbs_import_info'));
        $form->addFields([
            GDT_Checkbox::make('import_users')->initial('0'),
            GDT_Checkbox::make('import_challs')->initial('0'),
            GDT_Checkbox::make('import_chall_solved')->initial('0'),
            GDT_Checkbox::make('import_forum')->initial('0'),
            GDT_Checkbox::make('import_permissions')->initial('0'),
            GDT_Submit::make(),
            GDT_AntiCSRF::make(),
        ]);
    }
    
    function formValidated(GDT_Form $form)
    {
        $importer = new ImportTBS();
        try
        {
            $importer->import($form->getFormData());
        }
        catch (\Throwable $e)
        {
            throw $e;
        }
        finally
        {
            Database::instance()->enableForeignKeyCheck();
        }
        return $this->message('tbs_importer_done');
    }
    
}
