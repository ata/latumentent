<?php
$this->breadcrumbs=array(
	Yii::t('app','Invoices')=>array('index'),
	$invoice->id=>array('view','id'=>$invoice->id),
	Yii::t('app','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Manage Invoice'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Create Invoice'), 'url'=>array('create')),
	array('label'=>Yii::t('app','View Invoice'), 'url'=>array('view', 'id'=>$invoice->id)),
);
?>

<h2><?php echo Yii::t('app','Update {name}',array('{name}' => $invoice->id)); ?></h2>

<?php echo $this->renderPartial('_form', array('invoice'=>$invoice)); ?>