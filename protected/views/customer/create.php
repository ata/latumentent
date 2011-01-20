<div class="form span-16">
	<fieldset>
		<legend><?php echo Yii::t('app','New Customer') ?></legend>
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'customer-form',
			'enableAjaxValidation'=>false,
		)); ?>
			<p class="note">Fields with <span class="required">*</span> are required.</p>
			
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
			
			<div class="checkbox row">
				<?php echo $form->labelEx($customerForm,'serviceIds',array('class' => 'title')); ?>
				<?php echo CHtml::activeCheckBoxList($customerForm, 'serviceIds', $serviceList, array('separator' => '')); ?>
				<?php echo $form->error($customerForm,'serviceIds'); ?>
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

