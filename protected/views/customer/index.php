<div class="new-customer">
    <?php echo CHtml::link(Yii::t('app','Tambah Customer'),array('create'))?>
</div>

<div class="filter">
    <h3>Filter</h3>
    <div class="filter-periode">
	<label>Tagihan Bulan</label>
	<select>
	    <option>Desember 2010<option
	</select>
    </div>
    <div class="filter-service">
	<label>Service</label>
	<input type="checkbox">TV Digital
	<input type="checkbox">Internet
    </div>
</div>

<div class="list-customer">
    <!-->list customer<-->
    <?php $this->widget('zii.widgets.grid.CGridView',array(
	'id'=>'customer-list',
	'dataProvider'=>$customer,
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
		'value'=>'$data->user->fullname'
	    ),
	    array(
		'header'=>Yii::t('app','Services'),
		'value'=>'$data->selectedService'
	    ),
	    array(
		'class'=>'CButtonColumn',
	    ),
	),
    ))?><!--><-->
</div>
