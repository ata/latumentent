<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($ticketReply,'id'); ?>
		<?php echo $form->textField($ticketReply,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($ticketReply,'ticket_id'); ?>
		<?php echo $form->textField($ticketReply,'ticket_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($ticketReply,'message'); ?>
		<?php echo $form->textArea($ticketReply,'message',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($ticketReply,'author_id'); ?>
		<?php echo $form->dropDownList($ticketReply,'author_id',CHtml::listData(User::model()->findAll(),'id','display')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($ticketReply,'time'); ?>
		<?php echo $form->textField($ticketReply,'time'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
