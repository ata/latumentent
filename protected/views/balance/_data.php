<?php $total = 0;?>
<?php $sum = 0;?>
<div class="span-24 cost">
	<table class="balance-data">
		<thead>
			<tr>
				<th class="title"><?php echo Yii::t('app','Cost')?></th>
				<th class="value ar"><?php echo Yii::t('app','Apartment')?></th>
			</tr>
		</thead>
		<tbody>
			<?php if(count($cost) > 0):?>
				<?php foreach($cost as $items):?>
					<tr>
						<td class="title"><?php echo $items->service->name?></td>
						<td class="value ar"><?php echo Yii::app()->locale->numberFormatter->formatCurrency($items->amount,'IDR')?></td>
					</tr>
					<?php $total += $items->amount?>
				<?php endforeach?>
			<?php else:?>
				<tr>
					<td colspan="2">
						<?php echo Yii::t('app','No one cost on period')?>
					</td>
				</tr>
			<?php endif?>
		</tbody>
		<tfoot>
			<tr>
				<th class = "title"><?php echo Yii::t('app','Total Cost')?></th>
				<th class = "value ar"><?php echo Yii::app()->locale->numberFormatter->formatCurrency($total,'IDR')?></td>
			</tr>
		</tfoot>
	</table>

</div>

<div class="span-24 revenue">
	<table class="balance-data">
		<thead>
			<tr>
				<th class="title"><?php echo Yii::t('app','Revenue');?></th>
				<th class="value ar"><?php echo Yii::t('app','Apartment')?></th>
			</tr>
		</thead>
		<tbody>
			<?php if(count($revenue) > 0):?>
				<?php foreach($revenue as $data):?>
				<tr>
					<td class="title"><?php echo $data->service->name;?></td>
					<td class="value ar"><?php echo Yii::app()->locale->numberFormatter->formatCurrency($data->amount,'IDR');?></td>
				</tr>
				<?php $sum += $data->amount;?>
				<?php endforeach?>
			<?php else:?>
				<tr>
					<td colspan="2">
						<?php echo Yii::t('app','No one revenue on period')?>
					</td>
				</tr>
			<?php endif?>
		</tbody>
		<tfoot>
			<tr>
				<th class="title"><?php echo Yii::t('app','Total Revenue')?></th>
				<th class="value ar"><?php echo Yii::app()->locale->numberFormatter->formatCurrency($sum,'IDR')?></th>
			</tr>
		</tfoot>
	</table>
</div>

<div class="span-24 bills">
	<table>
		<thead>
			<tr>
				<?php if($sum < $total):?>
					<th class="title"><?php echo Yii::t('app','Loss')?></th>
				<?php else:?>
					<th class="titile"><?php echo Yii::t('app','Net Profit')?></th>
				<?php endif?>
				<th class="value ar"><?php echo (Yii::app()->locale->numberFormatter->formatCurrency(abs($sum-$total),'IDR'))?></th>
			</tr>
		</thead>
	</table>
</div>
