<div class="new-customer">
	<?php echo CHtml::link(Yii::t('app','Tambah Customer'), array('create'))?>
</div>

<form class="filter">
	<fieldset>
		<legend>Filter</legend>
		<div class="filter-periode">
			<label>Tagihan Bulan</label>
			<select>
				<option>Desember 2010</option>
			</select>
		</div>
		<div class="filter-service">
			<label>Service</label>
			<input type="checkbox" name="tv">TV Digital
			<input type="checkbox">Internet
		</div>
	</fieldset>
</form>

<?php $this->widget('zii.widgets.grid.CGridView',array(
	'id'=>'customer-list',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		array(
			'header' => 'No',
			'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
			'htmlOptions' => array('width' => '30px'),
		),
		'number',
		array(
			//'name'=>'user_id',
			'header'=>Yii::t('app','Full Name'),
			'type'=>'raw',
			'value'=>'CHtml::link($data->user->fullname, array("detail"))',
		),
		array(
			'header'=>Yii::t('app','Services'),
			'value'=>'$data->selectedService'
		),
		array(
			'class'=>'CButtonColumn',
		),
	),
))?>
