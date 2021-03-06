<h2><?php echo Yii::t('app','Open New Period'); ?></h2>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'period-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"></p>

	<?php echo $form->errorSummary($period); ?>

	<div class="row">
		<?php echo $form->labelEx($period,'name'); ?>
		<?php echo $form->textField($period,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($period,'name'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($period->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
