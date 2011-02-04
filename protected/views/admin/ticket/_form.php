<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ticket-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"></p>

	<?php echo $form->errorSummary($ticket); ?>

	<div class="row">
		<?php echo $form->labelEx($ticket,'title'); ?>
		<?php echo $form->textField($ticket,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($ticket,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($ticket,'body'); ?>
		<?php echo $form->textArea($ticket,'body',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($ticket,'body'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($ticket,'status'); ?>
		<?php echo $form->textField($ticket,'status'); ?>
		<?php echo $form->error($ticket,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($ticket,'compensation'); ?>
		<?php echo $form->textField($ticket,'compensation'); ?>
		<?php echo $form->error($ticket,'compensation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($ticket,'invoice_id'); ?>
		<?php echo $form->dropDownList($ticket,'invoice_id',CHtml::listData(Invoice::model()->findAll(),'id','display')); ?>
		<?php echo $form->error($ticket,'invoice_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($ticket,'invoice_item_id'); ?>
		<?php echo $form->dropDownList($ticket,'invoice_item_id',CHtml::listData(InvoiceItem::model()->findAll(),'id','display')); ?>
		<?php echo $form->error($ticket,'invoice_item_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($ticket,'period_id'); ?>
		<?php echo $form->dropDownList($ticket,'period_id',CHtml::listData(Period::model()->findAll(),'id','display')); ?>
		<?php echo $form->error($ticket,'period_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($ticket,'customer_id'); ?>
		<?php echo $form->dropDownList($ticket,'customer_id',CHtml::listData(Customer::model()->findAll(),'id','display')); ?>
		<?php echo $form->error($ticket,'customer_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($ticket,'technician_id'); ?>
		<?php echo $form->dropDownList($ticket,'technician_id',CHtml::listData(User::model()->findAll(),'id','display')); ?>
		<?php echo $form->error($ticket,'technician_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($ticket,'author_id'); ?>
		<?php echo $form->dropDownList($ticket,'author_id',CHtml::listData(User::model()->findAll(),'id','display')); ?>
		<?php echo $form->error($ticket,'author_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($ticket,'service_id'); ?>
		<?php echo $form->dropDownList($ticket,'service_id',CHtml::listData(Service::model()->findAll(),'id','display')); ?>
		<?php echo $form->error($ticket,'service_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($ticket,'time_open'); ?>
		<?php echo $form->textField($ticket,'time_open'); ?>
		<?php echo $form->error($ticket,'time_open'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($ticket,'time_closed'); ?>
		<?php echo $form->textField($ticket,'time_closed'); ?>
		<?php echo $form->error($ticket,'time_closed'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($ticket,'problem_type_id'); ?>
		<?php echo $form->dropDownList($ticket,'problem_type_id',CHtml::listData(ProblemType::model()->findAll(),'id','display')); ?>
		<?php echo $form->error($ticket,'problem_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($ticket,'solved'); ?>
		<?php echo $form->textField($ticket,'solved'); ?>
		<?php echo $form->error($ticket,'solved'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($ticket,'down'); ?>
		<?php echo $form->textField($ticket,'down'); ?>
		<?php echo $form->error($ticket,'down'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($ticket->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
