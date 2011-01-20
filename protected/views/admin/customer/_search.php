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
		<?php echo $form->textField($customer,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($customer,'status'); ?>
		<?php echo $form->textField($customer,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
