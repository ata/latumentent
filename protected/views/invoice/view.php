<?php
$this->breadcrumbs=array(
	'Invoice'=>array('invoice/index'),
	'View',
);?>

<h2><?php echo Yii::t('app','Detail Invoice') ?></h2>
<div class="customer-info span-24">
	<div class="row">
		<span class="title"><?php echo CHtml::activeLabel($invoice->customer->user, 'fullname') ?>:</span>
		<span class="value"><?php echo $invoice->customer->user->fullname?>:</span>
	</div>
	
	<div class="row">
		<span class="title"><?php echo CHtml::activeLabel($invoice->customer, 'number') ?></span>
		<span class="value"><?php echo $invoice->customer->number ?></span>
	</div>
</div>

<div class="span-24 bills">
	<?php foreach($invoice->invoiceItems as $item):?>
	<h3><?php echo $item->service->name ?></h3>
	<table>
		<thead>
			<tr>
				<th class="title"><?php echo Yii::t('app','Problem') ?></th>
				<th class="value ar"><?php echo Yii::t('app','Compensation') ?></th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th class="title"><?php echo Yii::t('app','Total Compensation') ?></th>
				<th class="value ar"><?php echo $item->subTotalCompensationLocale ?></th>
			</tr>
		</tfoot>
	</table>

	<table>
		<thead>
			<tr>
				<th class="title"><?php echo Yii::t('app','Initial Bill') ?></th>
				<th class="value ar"><?php echo $item->amountLocale ?></th>
			</tr>
			<tr>
				<th class="title"><?php echo Yii::t('app','Bills to pay') ?></th>
				<th class="value ar"><?php echo $item->amountPayLocale ?></th>
			</tr>
		</thead>
	</table>
	<?php endforeach;?>
</div>

<div class="span-24 summary-bills">
	<table>
		<thead>
			<tr>
				<th class="title"><?php echo Yii::t('app','Total Bills to pay') ?></th>
				<th class="value ar"><?php echo $invoice->totalAmountLocale ?></th>
			</tr>
		</thead>
	</table>
</div>
