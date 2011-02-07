<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cost-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"></p>

	<?php echo $form->errorSummary($cost); ?>

	<div class="row">
		<?php echo $form->labelEx($cost,'amount'); ?>
		<?php echo $form->textField($cost,'amount'); ?>
		<?php echo $form->error($cost,'amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($cost,'period_id'); ?>
		<?php echo $form->dropDownList($cost,'period_id',CHtml::listData(Period::model()->findAll(),'id','display')); ?>
		<?php echo $form->error($cost,'period_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($cost,'service_id'); ?>
		<?php echo $form->dropDownList($cost,'service_id',CHtml::listData(Service::model()->findAll(),'id','display')); ?>
		<?php echo $form->error($cost,'service_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($cost,'user_id'); ?>
		<?php echo $form->textField($cost,'user_id'); ?>
		<?php echo $form->error($cost,'user_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($cost->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
