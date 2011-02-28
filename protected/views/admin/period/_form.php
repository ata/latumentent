<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'period-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"></p>

	<?php echo $form->errorSummary($period); ?>
	
	<div class="row">
		<?php echo $form->labelEx($period,'name'); ?>
		<?php echo $form->textField($period,'name'); ?>
		<?php echo $form->error($period,'name'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($period,'start'); ?>
		<?php echo $form->textField($period,'start'); ?>
		<?php echo $form->error($period,'end'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($period,'end'); ?>
		<?php echo $form->textField($period,'end'); ?>
		<?php echo $form->error($period,'end'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($period->isNewRecord ? 'Create' : 'Save'); ?>
		<?php echo CHtml::link(Yii::t('app','cancel'),array('index'),array('class' => 'cancel'));?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
