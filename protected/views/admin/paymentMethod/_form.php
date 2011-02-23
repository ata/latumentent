<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'payment-method-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"></p>

	<?php echo $form->errorSummary($paymentMethod); ?>

	<div class="row">
		<?php echo $form->labelEx($paymentMethod,'name'); ?>
		<?php echo $form->textField($paymentMethod,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($paymentMethod,'name'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($paymentMethod->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
