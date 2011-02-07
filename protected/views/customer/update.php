<?php Yii::app()->clientScript->registerScript('filter-js','
(function($){
	$("#ownership").change(function(){
		if($("#Customer_ownership").val()=="' . Customer::OWNERSHIP_RENTER . '"){
			$("#hire-up").fadeIn("fast");
		} else {
			$("#hire-up").fadeOut("fast");
		}
	});
})(jQuery);
');?>
<div class="form span-16">
	<fieldset>
		<legend><?php echo Yii::t('app','Update Customer') ?></legend>
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'customer-form',
			'enableAjaxValidation'=>true,
		)); ?>
			<?php echo $form->errorSummary($customer); ?>
			
			<div class="row">
				<?php echo $form->labelEx($customer->user,'fullname'); ?>
				<?php echo $form->textField($customer->user,'fullname'); ?>
				<?php echo $form->error($customer->user,'fullname'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($customer->user,'username'); ?>
				<?php echo $form->textField($customer->user,'username'); ?>
				<?php echo $form->error($customer->user,'username'); ?>
			</div>
			
			<div class="row">
				<?php echo $form->labelEx($customer->user,'email'); ?>
				<?php echo $form->textField($customer->user,'email'); ?>
				<?php echo $form->error($customer->user,'email'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($customer,'contact_number'); ?>
				<?php echo $form->textField($customer,'contact_number'); ?>
				<?php echo $form->error($customer,'contact_number'); ?>
			</div>

			<div class="checkbox row">
				<?php echo $form->labelEx($customer,'serviceIds',array('class' => 'title')); ?>
				<?php echo $form->checkBoxList($customer, 'serviceIds', $serviceList, array('separator' => '')); ?>
				<?php echo $form->error($customer,'serviceIds'); ?>
			</div>
			
			<div class="row" id="ownership">
				<?php echo $form->labelEx($customer,'ownership'); ?>
				<?php echo $form->dropDownList($customer, 'ownership', array(
					Customer::OWNERSHIP_OWNER => Yii::t('app','Owner'),
					Customer::OWNERSHIP_RENTER => Yii::t('app','Renter'),
				)); ?>
				<?php echo $form->error($customer,'ownership'); ?>
			</div>
			
			<div class="row" id="hire-up" <?php $customer->ownership === Customer::OWNERSHIP_OWNER?'style="display:none"':''?> >
				<?php echo $form->labelEx($customer,'hire_up_to'); ?>
					<?php
					$this->widget('zii.widgets.jui.CJuiDatePicker', array(
						'name'=>'Customer[hire_up_to]',
						'value'=>$customer->hire_up_to,
						'options'=>array(
							'changeYear'=>true,
							'dateFormat' => 'yy-mm-dd'
						),
					));?>
					<?php echo $form->error($customer,'hire_up_to'); ?>
			</div>
			<div class="buttons row">
				<?php echo CHtml::submitButton('Submit'); ?>
			</div>
			
		<?php $this->endWidget(); ?>
	</fieldset>
</div>

<div class="form info span-8 last">
	<fieldset>
		<legend>Info</legend>
		<p>
			Info ada disini
		</p>
	</fieldset>
</div>
