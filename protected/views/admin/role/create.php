<?php
$this->breadcrumbs=array(
	Yii::t('app','Roles')=>array('index'),
	Yii::t('app','Create'),
);

$this->menu=array(
	array('label'=> Yii::t('app','Manage Role'), 'url'=>array('index')),
);
?>

<h2><?php echo Yii::t('app','Create Role'); ?></h2>

<?php echo $this->renderPartial('_form', array('role'=>$role)); ?>