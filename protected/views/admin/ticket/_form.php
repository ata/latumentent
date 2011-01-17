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
		<?php echo $form->textField($ticket,'body',array('size'=>60,'maxlength'=>255)); ?>
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
		<?php echo $form->textField($ticket,'invoice_id'); ?>
		<?php echo $form->error($ticket,'invoice_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($ticket,'invoice_item_id'); ?>
		<?php echo $form->textField($ticket,'invoice_item_id'); ?>
		<?php echo $form->error($ticket,'invoice_item_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($ticket,'period_id'); ?>
		<?php echo $form->textField($ticket,'period_id'); ?>
		<?php echo $form->error($ticket,'period_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($ticket,'customer_id'); ?>
		<?php echo $form->textField($ticket,'customer_id'); ?>
		<?php echo $form->error($ticket,'customer_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($ticket,'technician_id'); ?>
		<?php echo $form->textField($ticket,'technician_id'); ?>
		<?php echo $form->error($ticket,'technician_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($ticket,'author_id'); ?>
		<?php echo $form->textField($ticket,'author_id'); ?>
		<?php echo $form->error($ticket,'author_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($ticket->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
