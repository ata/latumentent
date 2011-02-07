<?php
$this->breadcrumbs=array(
	Yii::t('app','Costs')=>array('index'),
	Yii::t('app','Create'),
);

$this->menu=array(
	array('label'=> Yii::t('app','Manage Cost'), 'url'=>array('index')),
);
?>

<h2><?php echo Yii::t('app','Create Cost'); ?></h2>

<?php echo $this->renderPartial('_form', array('cost'=>$cost)); ?>