<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($periodicCost,'id'); ?>
		<?php echo $form->textField($periodicCost,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($periodicCost,'name'); ?>
		<?php echo $form->textField($periodicCost,'name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($periodicCost,'amount'); ?>
		<?php echo $form->textField($periodicCost,'amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($periodicCost,'note'); ?>
		<?php echo $form->textArea($periodicCost,'note',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
