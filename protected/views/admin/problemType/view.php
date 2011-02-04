<?php
$this->breadcrumbs=array(
	Yii::t('app','Problem Types')=>array('index'),
	$problemType->name,
);

$this->menu=array(
	array('label'=>Yii::t('app','Manage ProblemType'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Create ProblemType'), 'url'=>array('create')),
	array('label'=>Yii::t('app','Update ProblemType'), 'url'=>array('update', 'id'=>$problemType->id)),
	array('label'=>Yii::t('app','Delete ProblemType'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$problemType->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h2><?php echo Yii::t('app','View {name}',array('{name}' => $problemType->name)); ?></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$problemType,
	'attributes'=>array(
		'id',
		'name',
		'service_id',
		'down',
	),
)); ?>
