<?php
$this->breadcrumbs=array(
	Yii::t('app','Revenues')=>array('index'),
	Yii::t('app','Create'),
);

$this->menu=array(
	array('label'=> Yii::t('app','Manage Revenue'), 'url'=>array('index')),
);
?>

<h2><?php echo Yii::t('app','Create Revenue'); ?></h2>

<?php echo $this->renderPartial('_form', array('revenue'=>$revenue)); ?>