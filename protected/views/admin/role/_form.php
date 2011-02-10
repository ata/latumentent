<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'role-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"></p>

	<?php echo $form->errorSummary($role); ?>

	<div class="row">
		<?php echo $form->labelEx($role,'name'); ?>
		<?php echo $form->textField($role,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($role,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($role,'display'); ?>
		<?php echo $form->textField($role,'display',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($role,'display'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($role->isNewRecord ? 'Create' : 'Save'); ?>
		<?php echo CHtml::link(Yii::t('app','cancel'),array('index'),array('class' => 'cancel'));?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
