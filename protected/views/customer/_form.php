<div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'Customer-form',
	'enableAjaxValidation'=>false,))
    ?>
    <p class="note">Fields with <span class="required">*</span> are required.</p>
    
    <?php echo $form->errorSummary($customer); ?>

    <div>
	<?php echo $form->labelEx($customer->user,'username'); ?>
	<?php echo $form->textField($customer->user,'username');?>
	<?php echo $form->error($customer->user,'usernane')?>
    </div>

    <div>
	<?php echo $form->labelEx($customer->user,'password');?>
	<?php echo $form->passwordField($customer->user,'password');?>
	<?php echo $form->error($customer->user,'password')?>
    </div>

    <div>
	<?php echo $form->labelEx($customer->user,'email');?>
	<?php echo $form->textField($customer->user,'email');?>
	<?php echo $form->error($customer->user,'email');?>
    </div>

    <div>
	<?php echo $form->labelEx($customer,'number');?>
	<?php echo $form->textField($customer,'number');?>
	<?php echo $form->error($customer,'number');?>
    </div>

    <div>
	<?php echo $form->labelEx($customer,'customerServices');?>
	<?php echo $form->checkBoxList($customer,'customerServices',$services);?>
    </div>

    <div>
	<?php echo CHtml::submitButton($customer->isNewRecord ? 'Create' : 'Save'); ?>
    </div>
    <?php $this->endWidget();?>
</div>