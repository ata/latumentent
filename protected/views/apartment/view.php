<?php
$this->breadcrumbs=array(
	Yii::t('app','Apartments')=>array('index'),
	$apartment->id,
);

$this->menu=array(
	array('label'=>Yii::t('app','Manage Apartment'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Create Apartment'), 'url'=>array('create')),
	array('label'=>Yii::t('app','Update Apartment'), 'url'=>array('update', 'id'=>$apartment->id)),
	array('label'=>Yii::t('app','Delete Apartment'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$apartment->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h2><?php echo Yii::t('app','View {name}',array('{name}' => $apartment->id)); ?></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$apartment,
	'attributes'=>array(
		'id',
		'number',
		'note',
	),
)); ?>
