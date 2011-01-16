<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'customer-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"></p>

	<?php echo $form->errorSummary($customer); ?>

	<div class="row">
		<?php echo $form->labelEx($customer,'number'); ?>
		<?php echo $form->textField($customer,'number',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($customer,'number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($customer,'user_id'); ?>
		<?php echo $form->textField($customer,'user_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($customer,'user_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($customer->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
