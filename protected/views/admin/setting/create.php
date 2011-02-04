<?php
$this->breadcrumbs=array(
	Yii::t('app','Settings')=>array('index'),
	Yii::t('app','Create'),
);

$this->menu=array(
	array('label'=> Yii::t('app','Manage Setting'), 'url'=>array('index')),
);
?>

<h2><?php echo Yii::t('app','Create Setting'); ?></h2>

<?php echo $this->renderPartial('_form', array('setting'=>$setting)); ?>