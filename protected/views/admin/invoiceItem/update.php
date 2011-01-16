<?php
$this->breadcrumbs=array(
	Yii::t('app','Invoice Items')=>array('index'),
	$invoiceItem->id=>array('view','id'=>$invoiceItem->id),
	Yii::t('app','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Manage InvoiceItem'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Create InvoiceItem'), 'url'=>array('create')),
	array('label'=>Yii::t('app','View InvoiceItem'), 'url'=>array('view', 'id'=>$invoiceItem->id)),
);
?>

<h2><?php echo Yii::t('app','Update {name}',array('{name}' => $invoiceItem->id)); ?></h2>

<?php echo $this->renderPartial('_form', array('invoiceItem'=>$invoiceItem)); ?>