<?php
$this->breadcrumbs=array(
	Yii::t('app','Users')=>array('index'),
	Yii::t('app','Create'),
);

$this->menu=array(
	array('label'=> Yii::t('app','Manage User'), 'url'=>array('index')),
);
?>

<h2><?php echo Yii::t('app','Create User'); ?></h2>

<?php echo $this->renderPartial('_form', array('user'=>$user)); ?>