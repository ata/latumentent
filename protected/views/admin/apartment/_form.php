<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'apartment-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"></p>

	<?php echo $form->errorSummary($apartment); ?>

	<div class="row">
		<?php echo $form->labelEx($apartment,'number'); ?>
		<?php echo $form->textField($apartment,'number',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($apartment,'number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($apartment,'status'); ?>
		<?php echo $form->textField($apartment,'status'); ?>
		<?php echo $form->error($apartment,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($apartment->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
