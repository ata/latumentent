<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($revenue,'id'); ?>
		<?php echo $form->textField($revenue,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($revenue,'amount'); ?>
		<?php echo $form->textField($revenue,'amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($revenue,'period_id'); ?>
		<?php echo $form->dropDownList($revenue,'period_id',CHtml::listData(Period::model()->findAll(),'id','name'),array(
			'empty'=>Yii::t('app','Select Period')
		)); ?>
	</div>
	
	<div class="row">
		<?php echo $form->label($revenue,'service_id'); ?>
		<?php echo $form->dropDownList($revenue,'service_id',CHtml::listData(Service::model()->findAll(),'id','name'),array(
			'empty'=>Yii::t('app','Select Service')
		)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($revenue,'user_id'); ?>
		<?php echo $form->dropDownList($revenue,'user_id',CHtml::listData(User::model()->findAll(),'id','fullname'),array(
			'empty'=>Yii::t('app','Select Customer')
		)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
