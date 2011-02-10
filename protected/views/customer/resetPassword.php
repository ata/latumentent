<div class="form span-16">
	<fieldset>
		<legend><?php echo Yii::t('app','Reset Customer Password') ?></legend>
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'user-form',
			//'enableAjaxValidation'=>true,
		)); ?>
			<?php echo $form->errorSummary($user); ?>
			
			<div class="row">
				<?php echo $form->labelEx($user,'password'); ?>
				<?php echo $form->passwordField($user,'password',array('value'=>'')); ?>
			</div>
			
			<div class="row">
				<?php echo $form->labelEx($user,'passwordConfirm'); ?>
				<?php echo $form->passwordField($user,'passwordConfirm'); ?>
				<?php echo $form->error($user,'passwordConfirm'); ?>
			</div>
			
			<div class="buttons row">
				<?php echo CHtml::submitButton('Submit'); ?>
				<?php echo CHtml::link(Yii::t('app','cancel'),array('index'),array('class' => 'cancel'));?>
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
