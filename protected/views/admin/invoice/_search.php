<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($invoice,'id'); ?>
		<?php echo $form->textField($invoice,'id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($invoice,'total_amount'); ?>
		<?php echo $form->textField($invoice,'total_amount',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($invoice,'total_compensation'); ?>
		<?php echo $form->textField($invoice,'total_compensation',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($invoice,'period_id'); ?>
		<?php echo $form->textField($invoice,'period_id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($invoice,'customer_id'); ?>
		<?php echo $form->textField($invoice,'customer_id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
