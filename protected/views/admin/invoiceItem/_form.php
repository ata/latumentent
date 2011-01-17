<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'invoice-item-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"></p>

	<?php echo $form->errorSummary($invoiceItem); ?>

	<div class="row">
		<?php echo $form->labelEx($invoiceItem,'amount'); ?>
		<?php echo $form->textField($invoiceItem,'amount'); ?>
		<?php echo $form->error($invoiceItem,'amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($invoiceItem,'subtotal_compensation'); ?>
		<?php echo $form->textField($invoiceItem,'subtotal_compensation'); ?>
		<?php echo $form->error($invoiceItem,'subtotal_compensation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($invoiceItem,'invoice_id'); ?>
		<?php echo $form->textField($invoiceItem,'invoice_id'); ?>
		<?php echo $form->error($invoiceItem,'invoice_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($invoiceItem,'period_id'); ?>
		<?php echo $form->textField($invoiceItem,'period_id'); ?>
		<?php echo $form->error($invoiceItem,'period_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($invoiceItem,'customer_id'); ?>
		<?php echo $form->textField($invoiceItem,'customer_id'); ?>
		<?php echo $form->error($invoiceItem,'customer_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($invoiceItem->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
