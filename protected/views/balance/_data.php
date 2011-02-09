

<div class="span-24 cost">
	<table class="balance-data">
		<thead>
			<tr>
				<th><?php echo Yii::t('app','Cost')?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($cost as $items):?>
				<tr>
					<td><?php echo $items->service->name?></td>
					<td><?php echo Yii::app()->locale->numberFormatter->formatCurrency($items->amount,'IDR')?></td>
				</tr>
			<?php endforeach?>
		</tbody>
		<tfoot>
			<tr>
				<td><?php echo Yii::t('app','Total Cost')?></td>
				<td><?php //echo $items->totalCostLocale?></td>
			</tr>
		</tfoot>
	</table>

</div>

<div class="span-24 revenue">
	<table class="balance-data">
		<thead>
			<tr>
				<th><?php echo Yii::t('app','Revenue');?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($revenue as $data):?>
			<tr>
				<td><?php echo $data->service->name;?></td>
				<td><?php echo Yii::app()->locale->numberFormatter->formatCurrency($data->amount,'IDR');?></td>
			</tr>
			<?php endforeach?>
		</tbody>
		<tfoot>
			<tr>
				<td><?php echo Yii::t('app','Total Revenue')?></td>
				<td><?php //echo $data->totalRevenueLocale?></td>
			</tr>
		</tfoot>
	</table>
</div>

<div class="span-24 bills">
	<table>
		<thead>
			<tr>
				<?php /*if($items->totalCost >= $data->totalRevenue):?>
					<th><?php echo Yii::t('app','Loss')?></th>
				<?php else:?>
					<th><?php echo Yii::t('app','Net Profit')?></th>
				<?php endif;*/?>
				<th></th>
				<th><?php //echo Yii::app()->locale->numberFormatter->formatCurrency(($data->totalRevenue-$items->totalCost),'IDR')?></th>
			</tr>
		</thead>
	</table>
</div>
