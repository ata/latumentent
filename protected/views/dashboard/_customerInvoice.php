<?php var_dump($invoice->invoiceItems)?>
<div class="span-24 bills">
	<?php foreach($invoice->invoiceItems as $item):?>
	<h3><?php echo $item->service->name ?></h3>
	<table>
		<thead>
			<tr>
				<th class="title"><?php echo Yii::t('app','Ticket') ?></th>
				<th class="value ar"><?php echo Yii::t('app','Compensation') ?></th>
			</tr>
		</thead>
		<tbody>
			<?php if(count($item->tickets) > 0):?>
				<?php foreach($item->tickets as $ticket):?>
				<tr>
					<td class="title"><?php echo CHtml::link($ticket->title,array('ticket/view','id' => $ticket->id));?></td>
					<td class="value ar"><?php echo $ticket->compensationLocale ?></td>
				</tr>
				<?php endforeach?>
			<?php else:?>
				<tr>
					<td colspan="2">
						<?php echo Yii::t('app','No one tickets for compensation bills')?>
					</td>
				</tr>
			<?php endif?>
		</tbody>
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

