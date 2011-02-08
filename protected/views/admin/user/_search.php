<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($user,'id'); ?>
		<?php echo $form->textField($user,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($user,'username'); ?>
		<?php echo $form->textField($user,'username',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($user,'email'); ?>
		<?php echo $form->textField($user,'email',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($user,'role_id'); ?>
		<?php echo $form->dropDownList($user,'role_id',CHtml::listData(Role::model()->findAll(),'id','display'),array(
			'empty'=>Yii::t('app','Select Role')
		)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($user,'status'); ?>
		<?php echo $form->dropDownList($user,'status',array(
			User::STATUS_ACTIVE => Yii::t('app','Active'),
			User::STATUS_DELETED => Yii::t('app','Non-Active')
		),array('empty'=>Yii::t('app','Select Status'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($user,'fullname'); ?>
		<?php echo $form->textField($user,'fullname',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
