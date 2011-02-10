<?php
$this->breadcrumbs=array(
	Yii::t('app','Periodic Costs')=>array('index'),
	Yii::t('app','Create'),
);

$this->menu=array(
	array('label'=> Yii::t('app','Manage Periodic Cost'), 'url'=>array('index')),
);
?>

<h2><?php echo Yii::t('app','Create PeriodicCost'); ?></h2>

<?php echo $this->renderPartial('_form', array('periodicCost'=>$periodicCost)); ?>
