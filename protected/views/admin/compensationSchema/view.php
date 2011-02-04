<?php
$this->breadcrumbs=array(
	Yii::t('app','Compensation Schemas')=>array('index'),
	$compensationSchema->id,
);

$this->menu=array(
	array('label'=>Yii::t('app','Manage CompensationSchema'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Create CompensationSchema'), 'url'=>array('create')),
	array('label'=>Yii::t('app','Update CompensationSchema'), 'url'=>array('update', 'id'=>$compensationSchema->id)),
	array('label'=>Yii::t('app','Delete CompensationSchema'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$compensationSchema->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h2><?php echo Yii::t('app','View {name}',array('{name}' => $compensationSchema->id)); ?></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$compensationSchema,
	'attributes'=>array(
		'id',
		'uptime',
		'downtime',
		'percentdown',
		'percentup',
		'compensation',
		'service_id',
	),
)); ?>
