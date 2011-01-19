
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
))?>