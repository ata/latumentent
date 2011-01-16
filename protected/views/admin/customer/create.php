<?php
$this->breadcrumbs=array(
	Yii::t('app','Customers')=>array('index'),
	Yii::t('app','Create'),
);

$this->menu=array(
	array('label'=> Yii::t('app','Manage Customer'), 'url'=>array('index')),
);
?>

<h2><?php echo Yii::t('app','Create Customer'); ?></h2>

<?php echo $this->renderPartial('_form', array('customer'=>$customer)); ?>