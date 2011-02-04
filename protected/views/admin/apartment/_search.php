<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($apartment,'id'); ?>
		<?php echo $form->textField($apartment,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($apartment,'number'); ?>
		<?php echo $form->textField($apartment,'number',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($apartment,'status'); ?>
		<?php echo $form->textField($apartment,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
