<?php
$this->breadcrumbs=array(
	Yii::t('app','Periods')=>array('index'),
	Yii::t('app','Create'),
);

$this->menu=array(
	array('label'=> Yii::t('app','Manage Period'), 'url'=>array('index')),
);
?>

<h2><?php echo Yii::t('app','Create Period'); ?></h2>

<?php echo $this->renderPartial('_form', array('period'=>$period)); ?>