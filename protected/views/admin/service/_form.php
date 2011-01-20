<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'service-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"></p>

	<?php echo $form->errorSummary($service); ?>

	<div class="row">
		<?php echo $form->labelEx($service,'name'); ?>
		<?php echo $form->textField($service,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($service,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($service,'price'); ?>
		<?php echo $form->textField($service,'price'); ?>
		<?php echo $form->error($service,'price'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($service->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
