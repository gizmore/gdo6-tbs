<?php /** @var $field \GDO\UI\GDT_Message **/ ?>
<div class="gdt-container<?=$field->classError()?>">
<!--   <div> -->
  <?=$field->htmlIcon()?>
  <label <?=$field->htmlForID()?>><?=$field->displayLabel()?></label>
<!--   </div> -->
  <textarea
   <?=$field->htmlID()?>
   class="<?=$field->classEditor()?>"
   <?=$field->htmlFormName()?>
   rows="6"
   <?=$field->htmlRequired()?>
   <?=$field->htmlDisabled()?>><?=html($field->getVarInput())?></textarea>
  <?=$field->htmlError()?>
</div>
