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
		<?php echo $form->textField($ticket,'body',array('size'=>60,'maxlength'=>255)); ?>
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
		<?php echo $form->textField($ticket,'invoice_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($ticket,'invoice_item_id'); ?>
		<?php echo $form->textField($ticket,'invoice_item_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($ticket,'period_id'); ?>
		<?php echo $form->textField($ticket,'period_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($ticket,'customer_id'); ?>
		<?php echo $form->textField($ticket,'customer_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($ticket,'technician_id'); ?>
		<?php echo $form->textField($ticket,'technician_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($ticket,'author_id'); ?>
		<?php echo $form->textField($ticket,'author_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($ticket,'service_id'); ?>
		<?php echo $form->textField($ticket,'service_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
