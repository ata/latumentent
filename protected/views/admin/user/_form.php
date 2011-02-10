<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"></p>

	<?php echo $form->errorSummary($user); ?>

	<div class="row">
		<?php echo $form->labelEx($user,'username'); ?>
		<?php echo $form->textField($user,'username',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($user,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($user,'password'); ?>
		<?php echo $form->passwordField($user,'password',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($user,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($user,'email'); ?>
		<?php echo $form->textField($user,'email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($user,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($user,'role_id'); ?>
		<?php echo $form->dropDownList($user,'role_id',CHtml::listData(Role::model()->findAll(),'id','display')); ?>
		<?php echo $form->error($user,'role_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($user,'status'); ?>
		<?php echo $form->textField($user,'status'); ?>
		<?php echo $form->error($user,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($user,'fullname'); ?>
		<?php echo $form->textField($user,'fullname',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($user,'fullname'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($user->isNewRecord ? 'Create' : 'Save'); ?>
		<?php echo CHtml::link(Yii::t('app','cancel'),array('index'),array('class' => 'cancel'));?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
