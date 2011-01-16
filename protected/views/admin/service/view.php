<?php
$this->breadcrumbs=array(
	Yii::t('app','Services')=>array('index'),
	$service->name,
);

$this->menu=array(
	array('label'=>Yii::t('app','Manage Service'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Create Service'), 'url'=>array('create')),
	array('label'=>Yii::t('app','Update Service'), 'url'=>array('update', 'id'=>$service->id)),
	array('label'=>Yii::t('app','Delete Service'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$service->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h2><?php echo Yii::t('app','View {name}',array('{name}' => $service->name)); ?></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$service,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
