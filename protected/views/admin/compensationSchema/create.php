<?php
$this->breadcrumbs=array(
	Yii::t('app','Compensation Schemas')=>array('index'),
	Yii::t('app','Create'),
);

$this->menu=array(
	array('label'=> Yii::t('app','Manage Compensation Schema'), 'url'=>array('index')),
);
?>

<h2><?php echo Yii::t('app','Create CompensationSchema'); ?></h2>

<?php echo $this->renderPartial('_form', array('compensationSchema'=>$compensationSchema)); ?>
