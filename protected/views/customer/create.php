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
				<table class="form">
					<tr>
						<td class="form-title"><?php echo $form->labelEx($customerForm,'apartmentNumber'); ?></td>
						<td><?php echo $form->textField($customerForm,'apartmentNumber'); ?></td>
						<td><?php echo $form->error($customerForm,'apartmentNumber'); ?></td>
					</tr>
					
					<tr>
						<td class="form-title"><?php echo $form->labelEx($customerForm,'fullname'); ?></td>
						<td><?php echo $form->textField($customerForm,'fullname'); ?></td>
						<td><?php echo $form->error($customerForm,'fullname'); ?></td>
					</tr>
					
					<tr>
						<td class="form-title"><?php echo $form->labelEx($customerForm,'username'); ?></td>
						<td><?php echo $form->textField($customerForm,'username'); ?></td>
						<td><?php echo $form->error($customerForm,'username'); ?></td>
					</tr>
					
					<tr>
						<td class="form-title"><?php echo $form->labelEx($customerForm,'password'); ?></td>
						<td><?php echo $form->passwordField($customerForm,'password'); ?></td>
						<td><?php echo $form->error($customerForm,'password'); ?></td>
					</tr>
					
					<tr>
						<td class="form-title"><?php echo $form->labelEx($customerForm,'confirmPassword'); ?></td>
						<td><?php echo $form->passwordField($customerForm,'confirmPassword'); ?></td>
						<td><?php echo $form->error($customerForm,'confirmPassword'); ?></td>
					</tr>
					
					<tr>
						<td class="form-title"><?php echo $form->labelEx($customerForm,'email'); ?></td>
						<td><?php echo $form->textField($customerForm,'email'); ?></td>
						<td><?php echo $form->error($customerForm,'email'); ?></td>
					</tr>
				</table>
			</div>

			<div class="row checkbox">
				<?php echo $form->labelEx($customerForm,'serviceIds'); ?>
				<?php echo CHtml::activeCheckBoxList($customerForm, 'serviceIds', $serviceList, array('separator' => '')); ?>
				<?php echo $form->error($customerForm,'serviceIds'); ?>
			</div>

			<div class="row buttons">
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

