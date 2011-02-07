<?php Yii::app()->clientScript->registerScript('filter-js','
(function($){
	$("#ownership").change(function(){
		if($("#CustomerForm_ownership").val()=="' . Customer::OWNERSHIP_RENTER . '"){
			$("#hire-up").fadeIn("fast");
		} else {
			$("#hire-up").fadeOut("fast");
			$("#CustomerForm_hire_up_to").val("");
		}
	});
})(jQuery);
');
?>
<div class="form span-16">
	<fieldset>
		<legend><?php echo Yii::t('app','New Customer') ?></legend>
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'customer-form',
			'enableAjaxValidation'=>true,
		)); ?>
		
			<?php echo $form->errorSummary($customerForm); ?>
			
			<div class="row">
				<?php echo $form->labelEx($customerForm,'apartmentNumber'); ?>
				<?php echo $form->textField($customerForm,'apartmentNumber'); ?>
				<?php echo $form->error($customerForm,'apartmentNumber'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($customerForm,'fullname'); ?>
				<?php echo $form->textField($customerForm,'fullname'); ?>
				<?php echo $form->error($customerForm,'fullname'); ?>
			</div>
			
			<div class="row">
				<?php echo $form->labelEx($customerForm,'username'); ?>
				<?php echo $form->textField($customerForm,'username'); ?>
				<?php echo $form->error($customerForm,'username'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($customerForm,'password'); ?>
				<?php echo $form->passwordField($customerForm,'password'); ?>
				<?php echo $form->error($customerForm,'password'); ?>
			</div>
			
			<div class="row">
				<?php echo $form->labelEx($customerForm,'confirmPassword'); ?>
				<?php echo $form->passwordField($customerForm,'confirmPassword'); ?>
				<?php echo $form->error($customerForm,'confirmPassword'); ?>
			</div>
			
			<div class="row">
				<?php echo $form->labelEx($customerForm,'email'); ?>
				<?php echo $form->textField($customerForm,'email'); ?>
				<?php echo $form->error($customerForm,'email'); ?>
			</div>
			
			<div class="row">
				<?php echo $form->labelEx($customerForm,'contact_number'); ?>
				<?php echo $form->textField($customerForm,'contact_number'); ?>
				<?php echo $form->error($customerForm,'contact_number'); ?>
			</div>
			
			<div class="checkbox row">
				<?php echo $form->labelEx($customerForm,'serviceIds',array('class' => 'title')); ?>
				<?php echo $form->checkBoxList($customerForm, 'serviceIds', $serviceList, array('separator' => '')); ?>
				<?php echo $form->error($customerForm,'serviceIds'); ?>
			</div>
			<div class="row" id="ownership">
				<?php echo $form->labelEx($customerForm,'ownership'); ?>
				<?php echo $form->dropDownList($customerForm, 'ownership', array(
					Customer::OWNERSHIP_OWNER => Yii::t('app','Owner'),
					Customer::OWNERSHIP_RENTER => Yii::t('app','Renter'),
				)); ?>
				<?php echo $form->error($customerForm,'ownership'); ?>
			</div>
			<div class="row" id="hire-up" style="display:none">
				<?php echo $form->labelEx($customerForm,'hire_up_to'); ?>
				<?php
				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
					'name'=>'CustomerForm[hire_up_to]',
					'options'=>array(
						'changeYear'=>true,
						'dateFormat' => 'yy-mm-dd'
					),
				));?>
				<?php echo $form->error($customerForm,'hire_up_to'); ?>
			</div>
			<div class="buttons row">
				<?php echo CHtml::submitButton('Submit'); ?>
			</div>

		<?php $this->endWidget(); ?>
	</fieldset>
</div><!-- form -->


<div class="form info span-8 last">
	<fieldset>
		<legend>Info</legend>
		<p>
			Info ada disini
		</p>
	</fieldset>
	
</div>

