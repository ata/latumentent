<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($customer,'id'); ?>
		<?php echo $form->textField($customer,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($customer,'number'); ?>
		<?php echo $form->textField($customer,'number',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($customer,'user_id'); ?>
		<?php echo $form->dropDownList($customer,'user_id',CHtml::listData(User::model()->findAll(),'id','display')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($customer,'status'); ?>
		<?php echo $form->textField($customer,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($customer,'contact_number'); ?>
		<?php echo $form->textField($customer,'contact_number',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($customer,'ownership'); ?>
		<?php echo $form->textField($customer,'ownership'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($customer,'hire_up_to'); ?>
		<?php echo $form->textField($customer,'hire_up_to'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($customer,'apartment_id'); ?>
		<?php echo $form->textField($customer,'apartment_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
