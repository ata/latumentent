<?php
$this->breadcrumbs=array(
	Yii::t('app','Periodic Costs')=>array('index'),
	$periodicCost->name=>array('view','id'=>$periodicCost->id),
	Yii::t('app','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Manage PeriodicCost'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Create PeriodicCost'), 'url'=>array('create')),
	array('label'=>Yii::t('app','View PeriodicCost'), 'url'=>array('view', 'id'=>$periodicCost->id)),
);
?>

<h2><?php echo Yii::t('app','Update {name}',array('{name}' => $periodicCost->name)); ?></h2>

<?php echo $this->renderPartial('_form', array('periodicCost'=>$periodicCost)); ?>