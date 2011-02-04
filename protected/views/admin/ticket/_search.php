<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($ticket,'id'); ?>
		<?php echo $form->textField($ticket,'id'); ?>
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
		<?php echo $form->label($ticket,'status'); ?>
		<?php echo $form->textField($ticket,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($ticket,'compensation'); ?>
		<?php echo $form->textField($ticket,'compensation'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($ticket,'invoice_id'); ?>
		<?php echo $form->dropDownList($ticket,'invoice_id',CHtml::listData(Invoice::model()->findAll(),'id','display')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($ticket,'invoice_item_id'); ?>
		<?php echo $form->dropDownList($ticket,'invoice_item_id',CHtml::listData(InvoiceItem::model()->findAll(),'id','display')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($ticket,'period_id'); ?>
		<?php echo $form->dropDownList($ticket,'period_id',CHtml::listData(Period::model()->findAll(),'id','display')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($ticket,'customer_id'); ?>
		<?php echo $form->dropDownList($ticket,'customer_id',CHtml::listData(Customer::model()->findAll(),'id','display')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($ticket,'technician_id'); ?>
		<?php echo $form->dropDownList($ticket,'technician_id',CHtml::listData(User::model()->findAll(),'id','display')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($ticket,'author_id'); ?>
		<?php echo $form->dropDownList($ticket,'author_id',CHtml::listData(User::model()->findAll(),'id','display')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($ticket,'service_id'); ?>
		<?php echo $form->dropDownList($ticket,'service_id',CHtml::listData(Service::model()->findAll(),'id','display')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($ticket,'time_open'); ?>
		<?php echo $form->textField($ticket,'time_open'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($ticket,'time_closed'); ?>
		<?php echo $form->textField($ticket,'time_closed'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($ticket,'problem_type_id'); ?>
		<?php echo $form->dropDownList($ticket,'problem_type_id',CHtml::listData(ProblemType::model()->findAll(),'id','display')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($ticket,'solved'); ?>
		<?php echo $form->textField($ticket,'solved'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($ticket,'down'); ?>
		<?php echo $form->textField($ticket,'down'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
