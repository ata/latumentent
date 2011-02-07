<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($cost,'id'); ?>
		<?php echo $form->textField($cost,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($cost,'amount'); ?>
		<?php echo $form->textField($cost,'amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($cost,'period_id'); ?>
		<?php echo $form->dropDownList($cost,'period_id',CHtml::listData(Period::model()->findAll(),'id','display')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($cost,'service_id'); ?>
		<?php echo $form->dropDownList($cost,'service_id',CHtml::listData(Service::model()->findAll(),'id','display')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($cost,'user_id'); ?>
		<?php echo $form->textField($cost,'user_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
