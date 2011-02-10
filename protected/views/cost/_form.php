<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cost-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note"></p>

	<?php echo $form->errorSummary($cost); ?>

	<div class="row">
		<?php echo $form->labelEx($cost,'amount'); ?>
		<?php echo $form->textField($cost,'amount'); ?>
		<?php echo $form->error($cost,'amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($cost,'period_id'); ?>
		<?php echo $form->dropDownList($cost,'period_id',CHtml::listData(Period::model()->findAll(),'id','display')); ?>
		<?php echo $form->error($cost,'period_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($cost,'service_id'); ?>
		<?php echo $form->dropDownList($cost,'service_id',
			CHtml::listData(Service::model()->findAll(),'id','display'),
			array('empty' => Yii::t('app','Choose Service'))); ?>
		<?php echo $form->error($cost,'service_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($cost,'customer_id'); ?>
		<?php echo $form->dropDownList($cost,'customer_id',
			CHtml::listData(Customer::model()->findAll(),'id','display'),
			array('empty' => Yii::t('app','Choose Customer'))); ?>
		<?php echo $form->error($cost,'customer_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($cost->isNewRecord ? 'Create' : 'Save'); ?>
		<?php echo CHtml::link(Yii::t('app','cancel'),array('index'),array('class' => 'cancel'));?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
