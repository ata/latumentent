<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'invoice-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"></p>

	<?php echo $form->errorSummary($invoice); ?>

	<div class="row">
		<?php echo $form->labelEx($invoice,'total_amount'); ?>
		<?php echo $form->textField($invoice,'total_amount'); ?>
		<?php echo $form->error($invoice,'total_amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($invoice,'total_compensation'); ?>
		<?php echo $form->textField($invoice,'total_compensation'); ?>
		<?php echo $form->error($invoice,'total_compensation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($invoice,'period_id'); ?>
		<?php echo $form->dropDownList($invoice,'period_id',CHtml::listData(Period::model()->findAll(),'id','display')); ?>
		<?php echo $form->error($invoice,'period_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($invoice,'customer_id'); ?>
		<?php echo $form->dropDownList($invoice,'customer_id',CHtml::listData(Customer::model()->findAll(),'id','display')); ?>
		<?php echo $form->error($invoice,'customer_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($invoice->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
