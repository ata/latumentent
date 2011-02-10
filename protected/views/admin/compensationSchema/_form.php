<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'compensation-schema-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"></p>

	<?php echo $form->errorSummary($compensationSchema); ?>

	<div class="row">
		<?php echo $form->labelEx($compensationSchema,'uptime'); ?>
		<?php echo $form->textField($compensationSchema,'uptime'); ?>
		<?php echo $form->error($compensationSchema,'uptime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($compensationSchema,'downtime'); ?>
		<?php echo $form->textField($compensationSchema,'downtime'); ?>
		<?php echo $form->error($compensationSchema,'downtime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($compensationSchema,'percentdown'); ?>
		<?php echo $form->textField($compensationSchema,'percentdown'); ?>
		<?php echo $form->error($compensationSchema,'percentdown'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($compensationSchema,'percentup'); ?>
		<?php echo $form->textField($compensationSchema,'percentup'); ?>
		<?php echo $form->error($compensationSchema,'percentup'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($compensationSchema,'compensation'); ?>
		<?php echo $form->textField($compensationSchema,'compensation'); ?>
		<?php echo $form->error($compensationSchema,'compensation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($compensationSchema,'service_id'); ?>
		<?php echo $form->dropDownList($compensationSchema,'service_id',CHtml::listData(Service::model()->findAll(),'id','display')); ?>
		<?php echo $form->error($compensationSchema,'service_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($compensationSchema->isNewRecord ? 'Create' : 'Save'); ?>
		<?php echo CHtml::link(Yii::t('app','cancel'),array('index'),array('class' => 'cancel'));?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
