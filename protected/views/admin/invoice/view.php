<?php
$this->breadcrumbs=array(
	Yii::t('app','Invoices')=>array('index'),
	$invoice->id,
);

$this->menu=array(
	array('label'=>Yii::t('app','Manage Invoice'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Create Invoice'), 'url'=>array('create')),
	array('label'=>Yii::t('app','Update Invoice'), 'url'=>array('update', 'id'=>$invoice->id)),
	array('label'=>Yii::t('app','Delete Invoice'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$invoice->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h2><?php echo Yii::t('app','View {name}',array('{name}' => $invoice->id)); ?></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$invoice,
	'attributes'=>array(
		'id',
		'total_amount',
		'total_compensation',
		'period_id',
		'customer_id',
	),
)); ?>
