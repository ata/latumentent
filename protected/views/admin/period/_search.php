<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($period,'id'); ?>
		<?php echo $form->textField($period,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($period,'name'); ?>
		<?php echo $form->textField($period,'name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($period,'total_revenue'); ?>
		<?php echo $form->textField($period,'total_revenue'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($period,'total_outlay'); ?>
		<?php echo $form->textField($period,'total_outlay'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
