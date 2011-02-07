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
		'period_id',
		'service_id',
		'user_id',
	),
)); ?>
