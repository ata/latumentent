<?php
$this->breadcrumbs=array(
	Yii::t('app','Revenues')=>array('index'),
	Yii::t('app','Manage'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Create Revenue'), 'url'=>array('create')),
);
?>

<h2><?php echo Yii::t('app','Manage Revenues'); ?></h2>

<div class="new-button last span-8">
	<?php echo CHtml::link(Yii::t('app','Add Revenue'), array('create'));?>
</div>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'revenue-grid',
	'dataProvider'=>$revenue->search(),
	'filter'=>$revenue,
	'columns'=>array(
		'id',
		'amount',
		array(
			'name'=>'period_id',
			'value'=>'$data->period->name',
			'filter'=>CHtml::listData(Period::model()->findAll(),'id','name'),
		),
		array(
			'name'=>'service_id',
			'value'=>'$data->service->name',
			'filter'=>CHtml::listData(Service::model()->findAll(),'id','name'),
		),
		array(
			'name'=>'user_id',
			'value'=>'$data->user->fullname',
			'filter'=>CHtml::listData(User::model()->findAll(),'id','fullname'),
		),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
