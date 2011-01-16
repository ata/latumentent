<?php
$this->breadcrumbs=array(
	Yii::t('app','Services')=>array('index'),
	Yii::t('app','Create'),
);

$this->menu=array(
	array('label'=> Yii::t('app','Manage Service'), 'url'=>array('index')),
);
?>

<h2><?php echo Yii::t('app','Create Service'); ?></h2>

<?php echo $this->renderPartial('_form', array('service'=>$service)); ?>