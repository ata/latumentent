<?php
$this->breadcrumbs=array(
	Yii::t('app','Revenues')=>array('index'),
	$revenue->id,
);

$this->menu=array(
	array('label'=>Yii::t('app','Manage Revenue'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Create Revenue'), 'url'=>array('create')),
	array('label'=>Yii::t('app','Update Revenue'), 'url'=>array('update', 'id'=>$revenue->id)),
	array('label'=>Yii::t('app','Delete Revenue'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$revenue->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h2><?php echo Yii::t('app','View {name}',array('{name}' => $revenue->id)); ?></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$revenue,
	'attributes'=>array(
		'id',
		'amount',
		'period_id',
		'service_id',
		'user_id',
	),
)); ?>
