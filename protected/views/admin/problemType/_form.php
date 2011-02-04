<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'problem-type-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"></p>

	<?php echo $form->errorSummary($problemType); ?>

	<div class="row">
		<?php echo $form->labelEx($problemType,'name'); ?>
		<?php echo $form->textField($problemType,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($problemType,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($problemType,'service_id'); ?>
		<?php echo $form->textField($problemType,'service_id'); ?>
		<?php echo $form->error($problemType,'service_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($problemType,'down'); ?>
		<?php echo $form->textField($problemType,'down'); ?>
		<?php echo $form->error($problemType,'down'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($problemType->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
