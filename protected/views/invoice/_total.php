<table>
	<thead>
		
		<tr class="pbills">
			<th class="title"><?php echo Yii::t('app','Total Bills have Paid')?></th>
			<th class="ar value"><?php echo $totalPaidBill ?></th>
		</tr>
		
		<tr class="ybills">
			<th class="title"><?php echo Yii::t('app','Total Paid Bills have\'t Paid')?></th>
			<th class="ar value"><?php echo $totalNotPaidBill ?></th>
		</tr>
		
		<tr class="tbills">
			<th class="title"><?php echo Yii::t('app','Total Bills')?></th>
			<th class="ar value"><?php echo $totalBill ?></th>
		</tr>
	</thead>
</table>
