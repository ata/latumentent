<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'setting-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"></p>

	<?php echo $form->errorSummary($setting); ?>

	<div class="row">
		<?php echo $form->labelEx($setting,'key'); ?>
		<?php echo $form->textField($setting,'key',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($setting,'key'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($setting,'value'); ?>
		<?php echo $form->textField($setting,'value',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($setting,'value'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($setting->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
