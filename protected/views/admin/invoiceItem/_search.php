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
		<?php echo $form->dropDownList($invoiceItem,'invoice_id',CHtml::listData(Invoice::model()->findAll(),'id','display')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($invoiceItem,'period_id'); ?>
		<?php echo $form->dropDownList($invoiceItem,'period_id',CHtml::listData(Period::model()->findAll(),'id','display')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($invoiceItem,'customer_id'); ?>
		<?php echo $form->dropDownList($invoiceItem,'customer_id',CHtml::listData(Customer::model()->findAll(),'id','display')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($invoiceItem,'service_id'); ?>
		<?php echo $form->dropDownList($invoiceItem,'service_id',CHtml::listData(Service::model()->findAll(),'id','display')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($invoiceItem,'billing_date'); ?>
		<?php echo $form->textField($invoiceItem,'billing_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($invoiceItem,'paying_date'); ?>
		<?php echo $form->textField($invoiceItem,'paying_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
