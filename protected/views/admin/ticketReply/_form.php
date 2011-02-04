<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ticket-reply-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"></p>

	<?php echo $form->errorSummary($ticketReply); ?>

	<div class="row">
		<?php echo $form->labelEx($ticketReply,'ticket_id'); ?>
		<?php echo $form->textField($ticketReply,'ticket_id'); ?>
		<?php echo $form->error($ticketReply,'ticket_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($ticketReply,'message'); ?>
		<?php echo $form->textArea($ticketReply,'message',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($ticketReply,'message'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($ticketReply,'author_id'); ?>
		<?php echo $form->dropDownList($ticketReply,'author_id',CHtml::listData(User::model()->findAll(),'id','display')); ?>
		<?php echo $form->error($ticketReply,'author_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($ticketReply,'time'); ?>
		<?php echo $form->textField($ticketReply,'time'); ?>
		<?php echo $form->error($ticketReply,'time'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($ticketReply->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
