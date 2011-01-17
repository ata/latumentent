<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($role,'id'); ?>
		<?php echo $form->textField($role,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($role,'name'); ?>
		<?php echo $form->textField($role,'name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($role,'display'); ?>
		<?php echo $form->textField($role,'display',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
