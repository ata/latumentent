
<h2><?php echo Yii::t('app','{service} Ticket Detail',array('{service}' => $ticket->service->name)) ?></h2>
<div class="ticket">
	<div class="head span-24 last">
		<span class="title span-22"><h3><?php echo $ticket->title; ?></h3></span>
		<span class="status span-2 last"><?php echo $ticket->statusLabel; ?></span>
	</div>
	<div class="body span-24 last">
		<span class="author span-20"><h4><?php echo $ticket->author->fullname; ?></h4></span>
		<span class="date span-4 last"><?php echo $ticket->time_open;?></span>
		<span class="content span-24 last">
			<p><?php echo $ticket->body; ?></p>
		</span>
	</div>
	<?php if($ticket->isOpen):?>
	<div class="reply span-24 last">
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'ticket-form',
			'enableAjaxValidation'=>true,
		)); ?>
			<div class="row">
				<?php echo $form->textArea($reply,'message'); ?>
				<?php echo $form->error($reply,'message'); ?>
			</div>
			
			<div class="row">
				<?php echo $form->checkBox($ticket, 'solved');?>
				<?php echo $form->label($ticket, 'solved'); ?>
			</div>
			
			<div class="buttons row">
				<?php echo CHtml::submitButton(Yii::t('app','REPLY'),array('name' => 'submit[reply]')); ?>
				<?php echo CHtml::submitButton(Yii::t('app','CLOSE'),array('name' => 'submit[close]')); ?>
				<?php echo CHtml::submitButton(Yii::t('app','REPLY AND CLOSE'),array('name' => 'submit[reply_close]')); ?>
			</div>
		<?php $this->endWidget(); ?>
	</div>
	<?php endif?>
</div>
