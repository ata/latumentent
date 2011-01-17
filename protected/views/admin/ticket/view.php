<?php
$this->breadcrumbs=array(
	Yii::t('app','Tickets')=>array('index'),
	$ticket->title,
);

$this->menu=array(
	array('label'=>Yii::t('app','Manage Ticket'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Create Ticket'), 'url'=>array('create')),
	array('label'=>Yii::t('app','Update Ticket'), 'url'=>array('update', 'id'=>$ticket->id)),
	array('label'=>Yii::t('app','Delete Ticket'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$ticket->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h2><?php echo Yii::t('app','View {name}',array('{name}' => $ticket->title)); ?></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$ticket,
	'attributes'=>array(
		'id',
		'title',
		'body',
		'status',
		'compensation',
		'invoice_id',
		'invoice_item_id',
		'period_id',
		'customer_id',
		'technician_id',
		'author_id',
	),
)); ?>
