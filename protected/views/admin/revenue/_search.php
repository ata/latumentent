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
		<?php echo $form->textField($revenue,'period_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($revenue,'service_id'); ?>
		<?php echo $form->textField($revenue,'service_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($revenue,'user_id'); ?>
		<?php echo $form->textField($revenue,'user_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
