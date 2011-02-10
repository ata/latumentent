<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'revenue-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"></p>

	<?php echo $form->errorSummary($revenue); ?>

	<div class="row">
		<?php echo $form->labelEx($revenue,'amount'); ?>
		<?php echo $form->textField($revenue,'amount'); ?>
		<?php echo $form->error($revenue,'amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($revenue,'period_id'); ?>
		<?php echo $form->dropDownList($revenue,'period_id',$periodList); ?>
		<?php echo $form->error($revenue,'period_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($revenue,'service_id'); ?>
		<?php echo $form->dropDownList($revenue,'service_id',$serviceList); ?>
		<?php echo $form->error($revenue,'service_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($revenue->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
