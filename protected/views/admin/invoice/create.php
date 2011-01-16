<?php
$this->breadcrumbs=array(
	Yii::t('app','Invoices')=>array('index'),
	Yii::t('app','Create'),
);

$this->menu=array(
	array('label'=> Yii::t('app','Manage Invoice'), 'url'=>array('index')),
);
?>

<h2><?php echo Yii::t('app','Create Invoice'); ?></h2>

<?php echo $this->renderPartial('_form', array('invoice'=>$invoice)); ?>