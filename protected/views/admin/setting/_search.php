<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($setting,'id'); ?>
		<?php echo $form->textField($setting,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($setting,'key'); ?>
		<?php echo $form->textField($setting,'key',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($setting,'value'); ?>
		<?php echo $form->textField($setting,'value',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
