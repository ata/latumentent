<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($ticket,'id'); ?>
		<?php echo $form->textField($ticket,'id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($ticket,'title'); ?>
		<?php echo $form->textField($ticket,'title',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($ticket,'body'); ?>
		<?php echo $form->textArea($ticket,'body',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($ticket,'compensation'); ?>
		<?php echo $form->textField($ticket,'compensation',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($ticket,'status'); ?>
		<?php echo $form->textField($ticket,'status',array('size'=>6,'maxlength'=>6)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($ticket,'invoice_id'); ?>
		<?php echo $form->textField($ticket,'invoice_id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($ticket,'invoice_item_id'); ?>
		<?php echo $form->textField($ticket,'invoice_item_id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($ticket,'technician_id'); ?>
		<?php echo $form->textField($ticket,'technician_id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
