<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($compensationSchema,'id'); ?>
		<?php echo $form->textField($compensationSchema,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($compensationSchema,'uptime'); ?>
		<?php echo $form->textField($compensationSchema,'uptime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($compensationSchema,'downtime'); ?>
		<?php echo $form->textField($compensationSchema,'downtime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($compensationSchema,'percentdown'); ?>
		<?php echo $form->textField($compensationSchema,'percentdown'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($compensationSchema,'percentup'); ?>
		<?php echo $form->textField($compensationSchema,'percentup'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($compensationSchema,'compensation'); ?>
		<?php echo $form->textField($compensationSchema,'compensation'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($compensationSchema,'service_id'); ?>
		<?php echo $form->dropDownList($compensationSchema,'service_id',CHtml::listData(Service::model()->findAll(),'id','display')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
