<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($problemType,'id'); ?>
		<?php echo $form->textField($problemType,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($problemType,'name'); ?>
		<?php echo $form->textField($problemType,'name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($problemType,'service_id'); ?>
		<?php echo $form->dropDownList($problemType,'service_id',CHtml::listData(Service::model()->findAll(),'id','display'),array(
			'empty'=>Yii::t('app','Select Service'))
		); ?>
	</div>

	<div class="row">
		<?php echo $form->label($problemType,'down'); ?>
		<?php echo $form->textField($problemType,'down'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
