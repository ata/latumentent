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
		<?php echo $form->dropDownList($invoiceItem,'invoice_id',CHtml::listData(Invoice::model()->findAll(),'id','display')); ?>
		<?php echo $form->error($invoiceItem,'invoice_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($invoiceItem,'period_id'); ?>
		<?php echo $form->dropDownList($invoiceItem,'period_id',CHtml::listData(Period::model()->findAll(),'id','display')); ?>
		<?php echo $form->error($invoiceItem,'period_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($invoiceItem,'customer_id'); ?>
		<?php echo $form->dropDownList($invoiceItem,'customer_id',CHtml::listData(Customer::model()->findAll(),'id','display')); ?>
		<?php echo $form->error($invoiceItem,'customer_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($invoiceItem,'service_id'); ?>
		<?php echo $form->dropDownList($invoiceItem,'service_id',CHtml::listData(Service::model()->findAll(),'id','display')); ?>
		<?php echo $form->error($invoiceItem,'service_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($invoiceItem,'billing_date'); ?>
		<?php echo $form->textField($invoiceItem,'billing_date'); ?>
		<?php echo $form->error($invoiceItem,'billing_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($invoiceItem,'paying_date'); ?>
		<?php echo $form->textField($invoiceItem,'paying_date'); ?>
		<?php echo $form->error($invoiceItem,'paying_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($invoiceItem->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
