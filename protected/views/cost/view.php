<?php
$this->breadcrumbs=array(
	Yii::t('app','Costs')=>array('index'),
	$cost->id,
);

$this->menu=array(
	array('label'=>Yii::t('app','Manage Cost'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Create Cost'), 'url'=>array('create')),
	array('label'=>Yii::t('app','Update Cost'), 'url'=>array('update', 'id'=>$cost->id)),
	array('label'=>Yii::t('app','Delete Cost'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$cost->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h2><?php echo Yii::t('app','View {name}',array('{name}' => $cost->id)); ?></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$cost,
	'attributes'=>array(
		'id',
		'amount',
		array(
			'label'=>Yii::t('app','Period'),
			'name'=>'period_id',
			'value'=>CHtml::encode($cost->period->name),
		),
		array(
			'label'=>Yii::t('app','Service'),
			'name' => 'service_id',
			'value'=>CHtml::encode($cost->service->name)
		),
		'user_id',
	),
)); ?>
