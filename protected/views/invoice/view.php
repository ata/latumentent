<?php
$this->breadcrumbs=array(
	'Invoice'=>array('invoice/index'),
	'View',
);?>

<h2><?php echo Yii::t('app','Detail Invoice') ?></h2>

<div class="customer-info span-24">
	<div class="row">
		<span class="title"><?php echo CHtml::activeLabel($invoice->customer->user, 'fullname') ?>:</span>
		<span class="value"><?php echo $invoice->customer->user->fullname?></span>
	</div>
	
	<div class="row">
		<span class="title"><?php echo CHtml::activeLabel($invoice->customer->apartment, 'number') ?>:</span>
		<span class="value"><?php echo $invoice->customer->apartment->number ?></span>
	</div>
</div>


<?php if(Yii::app()->user->role === 'customer'):?>
	<div class="span-24 new-button last" style="margin-bottom:20px; padding-top:20px; ">
		<?php echo CHtml::link(Yii::t('app','New Ticket'), array('ticket/create'));?>
	</div>
<?php endif ?>

<div class="span-24 bills">
	<?php foreach($invoice->invoiceItems as $item):?>
	<h3><?php echo $item->service->name ?></h3>
	<table>
		<thead>
			<tr>
				<th class="title"><?php echo Yii::t('app','Bills to pay') ?></th>
				<th class="value ar"><?php echo $item->amountPayLocale ?></th>
			</tr>
		</thead>
	</table>
	<?php endforeach;?>
</div>

<?php if($invoice->fine != Invoice::NOT_FINE):?>
	<div class="span-24 bills">
		<h3><?php echo Yii::t('app','Fine')?></h3>
		<table>
			<thead>
				<tr>
					<th class="title"><?php echo Yii::t('app','Fine must pay')?></th>
					<th class="value ar"><?php echo $invoice->fineLocale?></th>
				</tr>
			</thead>
		</table>
	</div>
<?php endif?>

<div class="span-24 summary-bills">
	<table>
		<thead>
			<tr>
				<th class="title"><?php echo Yii::t('app','Total Bills to pay') ?></th>
				<th class="value ar"><?php echo $invoice->allTotalAmountLocale ?></th>
			</tr>	
		</thead>
	</table>
</div>
