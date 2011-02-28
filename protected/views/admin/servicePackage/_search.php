<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($servicePackage,'id'); ?>
		<?php echo $form->textField($servicePackage,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($servicePackage,'name'); ?>
		<?php echo $form->textField($servicePackage,'name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($servicePackage,'note'); ?>
		<?php echo $form->textField($servicePackage,'note',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
