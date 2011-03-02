<?php Yii::app()->clientScript->registerScript('period-filter',' 
	$("#Period_name").change(function(){
		$("#invoice").load("index.php?r=dashboard/filter&period="+$(this).val());
	});
	$(".hide_notification").live("click",function(){
		var ID = $(this).attr("id");
		$.post(
			"'.Yii::app()->createUrl("dashboard/notifyDelete").'",
			{id:ID},
			function(response){
				if(response == "success"){
					$("#"+ID).slideUp();
				} else {
					alert("gagal menghapus");
				}
			}
		);
	});
')?>

<?php
$this->breadcrumbs=array(
	'Invoice'=>array('invoice/index'),
	'View',
);?>

<?php if(count($notificationList) > 0):?>
	<?php foreach($notificationList as $items):?>
	<div class="notification" id="<?php echo $items->id?>"">
		<?php echo $items->message?> <br>
		<span class="delete_button"><a href="#" id="<?php echo $items->id?>" class="hide_notification">x</a></span>
	</div>
	<?php endforeach?>
<?php endif;?>
<h2><?php echo Yii::t('app','Detail Invoice') ?></h2>

<div class="customer-info span-24" id="ticket">
	<?php if($invoice == null):?>
		<div class="row">
			<span class="title"><?php echo CHtml::activeLabel($user, 'fullname') ?>:</span>
			<span class="value"><?php echo $user->fullname?>:</span>
		</div>
		
		<div class="row">
			<span class="title"><?php echo CHtml::activeLabel($user, 'number') ?>:</span>
			<span class="value"><?php echo $user->customer->apartment->number ?></span>
		</div>
	<?php else:?>
		<div class="row">
			<span class="title"><?php echo CHtml::activeLabel($invoice->customer->user, 'fullname') ?>:</span>
			<span class="value"><?php echo $invoice->customer->fullname?>:</span>
		</div>
		
		<div class="row">
			<span class="title"><?php echo CHtml::activeLabel($invoice->customer->apartment, 'number') ?>:</span>
			<span class="value"><?php echo $invoice->customer->apartment->number ?></span>
	<?php endif?>
	
	<div class="row">
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'period-filter'
		)); ?>
			<div class="row select span-12" id="select-period">
				<div class="label floatLeft">
					<?php echo $form->label($period,'period');?>
				</div>
				<div class="floatLeft">
					<?php echo $form->dropDownList($period, 'name', $periodList); ?>
				</div>
				<div class="clear"></div>
			</div>
		<?php $this->endWidget()?>
	</div>
</div>

<?php if(Yii::app()->user->role === 'customer'):?>
<div class="span-24 new-button last" style="margin-bottom:20px; padding-top:20px; ">
	<?php echo CHtml::link(Yii::t('app','New Ticket'), array('ticket/create'));?>
</div>
<?php endif ?>


<?php if($invoice !== null):?>
	<div id="invoice">
		<?php if ($invoice):?>
			<?php $this->renderPartial('_customerInvoice',array('invoice' => $invoice,));?>
		<?php endif?>
	</div>
<?php else:?>
	<?php echo Yii::t('app','Not Yet Invoice Item')?>
<?php endif;?>
