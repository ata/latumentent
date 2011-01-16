<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'period-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"></p>

	<?php echo $form->errorSummary($period); ?>

	<div class="row">
		<?php echo $form->labelEx($period,'month'); ?>
		<?php echo $form->textField($period,'month',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($period,'month'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($period,'year'); ?>
		<?php echo $form->textField($period,'year',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($period,'year'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($period->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
