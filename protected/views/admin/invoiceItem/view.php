<?php
$this->breadcrumbs=array(
	Yii::t('app','Invoice Items')=>array('index'),
	$invoiceItem->id,
);

$this->menu=array(
	array('label'=>Yii::t('app','Manage InvoiceItem'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Create InvoiceItem'), 'url'=>array('create')),
	array('label'=>Yii::t('app','Update InvoiceItem'), 'url'=>array('update', 'id'=>$invoiceItem->id)),
	array('label'=>Yii::t('app','Delete InvoiceItem'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$invoiceItem->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h2><?php echo Yii::t('app','View {name}',array('{name}' => $invoiceItem->id)); ?></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$invoiceItem,
	'attributes'=>array(
		'id',
		'amount',
		'subtotal_compensation',
		'invoice_id',
		'period_id',
		'customer_id',
		'service_id',
		'billing_date',
		'paying_date',
	),
)); ?>
