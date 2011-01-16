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
		<?php echo $form->labelEx($ticket,'compensation'); ?>
		<?php echo $form->textField($ticket,'compensation',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($ticket,'compensation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($ticket,'status'); ?>
		<?php echo $form->textField($ticket,'status',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($ticket,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($ticket,'invoice_id'); ?>
		<?php echo $form->textField($ticket,'invoice_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($ticket,'invoice_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($ticket,'invoice_item_id'); ?>
		<?php echo $form->textField($ticket,'invoice_item_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($ticket,'invoice_item_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($ticket,'technician_id'); ?>
		<?php echo $form->textField($ticket,'technician_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($ticket,'technician_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($ticket->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
