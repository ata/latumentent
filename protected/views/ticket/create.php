
<h2><?php echo Yii::t('app','New Ticket')?></h2>
<div class="form span-16">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ticket-form',
	'enableAjaxValidation'=>true,
)); ?>
	<fieldset>
		<legend><?php Yii::t('app','New Ticket')?></legend>
		<p class="note">Fields with <span class="required">*</span> are required.</p>

		<?php echo $form->errorSummary($ticket); ?>
		
		<div class="row">
			<?php echo $form->labelEx($ticket,'service_id'); ?>
			<?php echo $form->dropDownList($ticket,'invoice_item_id', $invoiceItemList); ?>
			<?php echo $form->error($ticket,'service_id'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($ticket,'problem_type_id'); ?>
			<?php echo $form->dropDownList($ticket,'problem_type_id', $problemTypeList); ?>
			<?php echo $form->error($ticket,'problem_type_id'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($ticket,'title'); ?>
			<?php echo $form->textField($ticket,'title',array('style' => 'width:400px')); ?>
			<?php echo $form->error($ticket,'title'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($ticket,'body'); ?>
			<?php echo $form->textArea($ticket,'body',array('cols' =>60,'rows' => '10')); ?>
			<?php echo $form->error($ticket,'body'); ?>
		</div>

		
		<div class="row buttons">
			<?php echo CHtml::submitButton('Submit'); ?>
			<?php echo CHtml::link(Yii::t('app','cancel'),array('index'),array('class' => 'cancel'));?>
		</div>
	</fieldset>

<?php $this->endWidget(); ?>

</div><!-- form -->

<div class="form span-8 last">
	<fieldset>
		<legend><?php echo Yii::t('app','info')?></legend>
		<p>
			Disini Info
		</p>
	</fieldset>
</div>
