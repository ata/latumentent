
<h2><?php echo Yii::t('app','{service} Ticket Detail',array('{service}' => $ticket->service->name)) ?></h2>
<div class="ticket">
	<div class="head span-24 last">
<<<<<<< HEAD
		<span class="title span-22"><h3><?php echo $ticket->title; ?></h3></span>
		<span class="status span-2 last"><?php echo $ticket->statusLabel; ?></span>
	</div></br>
	<div class="body">
=======
		<span class="title span-20"><h3><?php echo $ticket->title; ?></h3></span>
		<span class="status span-4 last"><?php echo $ticket->statusLabel; ?></span>
	</div>
	<div class="body span-24 last">
>>>>>>> origin/master
		<span class="author span-20"><h4><?php echo $ticket->author->fullname; ?></h4></span>
		<span class="date span-4 last"><?php echo $ticket->time_open;?></span>
		<span class="content span-24 last"><p><?php echo $ticket->body; ?></p></span>
	</div>
	
	<?php foreach($ticket->replies as $rep):?>
		<div class="body span-24 last">
			<span class="author span-20"><h4><?php echo $rep->author->fullname; ?></h4></span>
			<span class="date span-4 last"><?php echo $rep->time; ?></span>
			<span class="content span-24 last"><p><?php echo $rep->message; ?></p></span>
		</div>
	<?php endforeach?>
	
	
	<div class="reply span-24 last">
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'ticket-form',
			'enableAjaxValidation'=>true,
		)); ?>
			<?php if($ticket->isOpen):?>
			<div class="row">
				<?php echo $form->textArea($reply,'message'); ?>
				<?php echo $form->error($reply,'message'); ?>
			</div>
			
			<?php if(Yii::app()->user->role != 'customer'):?>
			<div class="row">
				<?php echo $form->checkBox($ticket, 'solved',array('value' => '1'));?>
				<?php echo $form->label($ticket, 'solved'); ?>
			</div>
			<?php endif?>
			
			<div class="buttons row">
				<?php echo CHtml::submitButton(Yii::t('app','REPLY'),array('name' => 'submit[reply]')); ?>
				<?php if(Yii::app()->user->role != 'customer'):?>
					<?php echo CHtml::submitButton(Yii::t('app','CLOSE'),array('name' => 'submit[close]')); ?>
					<?php echo CHtml::submitButton(Yii::t('app','REPLY AND CLOSE'),array('name' => 'submit[reply_close]')); ?>
				<?php endif ?>
			</div>
			<?php else:?>
			<?php if(Yii::app()->user->role != 'customer'):?>
			<div class="buttons row">
				<?php echo CHtml::submitButton(Yii::t('app','OPEN'),array('name' => 'submit[open]')); ?>
			</div>
			<?php endif?>
			<?php endif?>
		<?php $this->endWidget(); ?>
	</div>
	
</div>
