<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'service-package-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"></p>

	<?php echo $form->errorSummary($servicePackage); ?>

	<div class="row">
		<?php echo $form->labelEx($servicePackage,'name'); ?>
		<?php echo $form->textField($servicePackage,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($servicePackage,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($servicePackage,'note'); ?>
		<?php echo $form->textField($servicePackage,'note',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($servicePackage,'note'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($servicePackage,'serviceIds');?>
		<?php echo $form->checkBoxList($servicePackage,'serviceIds',$serviceList);?>
		<?php echo $form->error($servicePackage,'serviceIds')?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($servicePackage->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
