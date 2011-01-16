<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($invoiceItem,'id'); ?>
		<?php echo $form->textField($invoiceItem,'id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($invoiceItem,'amount'); ?>
		<?php echo $form->textField($invoiceItem,'amount',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($invoiceItem,'invoice_id'); ?>
		<?php echo $form->textField($invoiceItem,'invoice_id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($invoiceItem,'service_id'); ?>
		<?php echo $form->textField($invoiceItem,'service_id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($invoiceItem,'subtotal_compensation'); ?>
		<?php echo $form->textField($invoiceItem,'subtotal_compensation',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
