<?php
$this->breadcrumbs=array(
	Yii::t('app','Invoice Items')=>array('index'),
	Yii::t('app','Create'),
);

$this->menu=array(
	array('label'=> Yii::t('app','Manage InvoiceItem'), 'url'=>array('index')),
);
?>

<h2><?php echo Yii::t('app','Create InvoiceItem'); ?></h2>

<?php echo $this->renderPartial('_form', array('invoiceItem'=>$invoiceItem)); ?>