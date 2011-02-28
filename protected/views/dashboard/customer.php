<?php Yii::app()->clientScript->registerScript('period-filter',' 
	$("#Period_name").change(function(){
		$("#invoice").load("index.php?r=dashboard/filter&period="+$(this).val());
	});
')?>

<?php
$this->breadcrumbs=array(
	'Invoice'=>array('invoice/index'),
	'View',
);?>

<h2><?php echo Yii::t('app','Detail Invoice') ?></h2>

<div class="customer-info span-24" id="ticket">
	<div class="row">
		<span class="title"><?php echo CHtml::activeLabel($invoice->customer->user, 'fullname') ?>:</span>
		<span class="value"><?php echo $invoice->customer->user->fullname?>:</span>
	</div>
	
	<div class="row">
		<span class="title"><?php echo CHtml::activeLabel($invoice->customer->apartment, 'number') ?>:</span>
		<span class="value"><?php echo $invoice->customer->apartment->number ?></span>
	</div>
	
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

<div id="invoice">
	<?php if ($invoice):?>
		<?php $this->renderPartial('_customerInvoice',array('invoice' => $invoice,));?>
	<?php endif?>
</div>
