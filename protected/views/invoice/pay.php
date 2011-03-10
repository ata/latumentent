<div class="form">
	<h2><?php echo Yii::t('app','Paying Invoice')?></h2>
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'invoice-form',
		'enableAjaxValidation'=>false,
	)); ?>
		<?php echo $form->errorSummary($invoice); ?>
		
		<div class="row">
			<?php echo $form->labelEx($invoice,'amount'); ?>
			<span class="value"><?php echo $invoice->allTotalAmountLocale?></span>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($invoice,'payment_method_id'); ?>
			<?php echo $form->dropDownList($invoice,'payment_method_id',$paymentMethodList); ?>
			<?php echo $form->error($invoice,'payment_method_id'); ?>
		</div>
		<div class="row buttons">
			<?php echo CHtml::submitButton(Yii::t('app','Pay')); ?>
		</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->
