<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'periodic-cost-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"></p>

	<?php echo $form->errorSummary($periodicCost); ?>

	<div class="row">
		<?php echo $form->labelEx($periodicCost,'name'); ?>
		<?php echo $form->textField($periodicCost,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($periodicCost,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($periodicCost,'amount'); ?>
		<?php echo $form->textField($periodicCost,'amount'); ?>
		<?php echo $form->error($periodicCost,'amount'); ?>
	</div>
	
	
	<div class="row">
		<?php echo $form->labelEx($periodicCost,'payment_date'); ?>
		<?php echo $form->dropDownList($periodicCost,'payment_date',array_map(function($v){return $v + 1;},array_flip(range(1,31)))); ?>
		<?php echo $form->error($periodicCost,'payment_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($periodicCost,'note'); ?>
		<?php echo $form->textArea($periodicCost,'note',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($periodicCost,'note'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($periodicCost->isNewRecord ? 'Create' : 'Save'); ?>
		<?php echo CHtml::link(Yii::t('app','cancel'),array('index'),array('class' => 'cancel'));?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
