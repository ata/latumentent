<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($paymentMethod,'id'); ?>
		<?php echo $form->textField($paymentMethod,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($paymentMethod,'name'); ?>
		<?php echo $form->textField($paymentMethod,'name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
