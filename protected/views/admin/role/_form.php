<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'role-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"></p>

	<?php echo $form->errorSummary($role); ?>

	<div class="row">
		<?php echo $form->labelEx($role,'name'); ?>
		<?php echo $form->textField($role,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($role,'name'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($role->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
