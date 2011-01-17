<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($invoiceItem,'id'); ?>
		<?php echo $form->textField($invoiceItem,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($invoiceItem,'amount'); ?>
		<?php echo $form->textField($invoiceItem,'amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($invoiceItem,'subtotal_compensation'); ?>
		<?php echo $form->textField($invoiceItem,'subtotal_compensation'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($invoiceItem,'invoice_id'); ?>
		<?php echo $form->textField($invoiceItem,'invoice_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($invoiceItem,'period_id'); ?>
		<?php echo $form->textField($invoiceItem,'period_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($invoiceItem,'customer_id'); ?>
		<?php echo $form->textField($invoiceItem,'customer_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
