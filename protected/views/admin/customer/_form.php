<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'customer-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"></p>

	<?php echo $form->errorSummary($customer); ?>

	<div class="row">
		<?php echo $form->labelEx($customer,'user_id'); ?>
		<?php echo $form->dropDownList($customer,'user_id',CHtml::listData(User::model()->findAll(),'id','display')); ?>
		<?php echo $form->error($customer,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($customer,'status'); ?>
		<?php echo $form->textField($customer,'status'); ?>
		<?php echo $form->error($customer,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($customer,'contact_number'); ?>
		<?php echo $form->textField($customer,'contact_number',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($customer,'contact_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($customer,'ownership'); ?>
		<?php echo $form->textField($customer,'ownership'); ?>
		<?php echo $form->error($customer,'ownership'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($customer,'hire_up_to'); ?>
		<?php echo $form->textField($customer,'hire_up_to'); ?>
		<?php echo $form->error($customer,'hire_up_to'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($customer,'apartment_id'); ?>
		<?php echo $form->textField($customer,'apartment_id'); ?>
		<?php echo $form->error($customer,'apartment_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($customer->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
