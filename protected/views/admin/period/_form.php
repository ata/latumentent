<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'period-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"></p>

	<?php echo $form->errorSummary($period); ?>

	<div class="row">
		<?php echo $form->labelEx($period,'name'); ?>
		<?php echo $form->textField($period,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($period,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($period,'total_revenue'); ?>
		<?php echo $form->textField($period,'total_revenue'); ?>
		<?php echo $form->error($period,'total_revenue'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($period,'total_outlay'); ?>
		<?php echo $form->textField($period,'total_outlay'); ?>
		<?php echo $form->error($period,'total_outlay'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($period->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
