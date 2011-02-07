<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($customer,'id'); ?>
		<?php echo $form->textField($customer,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($customer,'number'); ?>
		<?php echo $form->textField($customer,'number',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($customer,'user_id'); ?>
		<?php echo $form->dropDownList($customer,'user_id',CHtml::listData(User::model()->findListCustomer(),'id','fullname'),
			array('empty'=>Yii::t('app','Select Customer'))
		); ?>
	</div>

	<div class="row">
		<?php echo $form->label($customer,'status'); ?>
		<?php echo $form->dropDownList($customer,'status',array(
			Customer::STATUS_ACTIVE => Yii::t('app','Active'),
			Customer::STATUS_DELETED => Yii::t('app','Non-Active')
			),array('empty'=> Yii::t('app','Select Status')));?>
	</div>

	<div class="row">
		<?php echo $form->label($customer,'contact_number'); ?>
		<?php echo $form->textField($customer,'contact_number',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($customer,'ownership'); ?>
		<?php echo $form->dropDownList($customer,'ownership',array(
			Customer::OWNERSHIP_OWNER => Yii::t('app','Owner'),
			Customer::OWNERSHIP_RENTER => Yii::t('app','Renter')),array(
				'empty'=> Yii::t('app','Select Status'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($customer,'hire_up_to'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'name'=>'Customer[hire_up_to]',
			// additional javascript options for the date picker plugin
			'options'=>array(
				'showAnim'=>'fold',
			),
			'htmlOptions'=>array(
				'style'=>'height:20px;'
			),
		)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($customer,'apartment_id'); ?>
		<?php echo $form->textField($customer,'apartment_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
