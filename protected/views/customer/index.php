<div class="list-customer">
    <!--> list buat customer<-->
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
		'type'=>'raw',
		'value'=>'CHtml::link($data->user->fullname,array("detail"))'
	    ),
	    array(
		'header'=>Yii::t('app','Services'),
		'value'=>'$data->selectedService'
	    ),
	    array(
		'class'=>'CButtonColumn',
	    ),
	),
    ))
    ?>
    <!-->end list customer<-->
</div>

<div class="customer-new">
    <!-->link buat customer<-->
    <?php echo CHtml::link(Yii::t('app','Tambah Customer'),array('create'));?>
    <!-->end link<-->
</div>