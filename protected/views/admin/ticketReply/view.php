<?php
$this->breadcrumbs=array(
	Yii::t('app','Ticket Replys')=>array('index'),
	$ticketReply->id,
);

$this->menu=array(
	array('label'=>Yii::t('app','Manage TicketReply'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Create TicketReply'), 'url'=>array('create')),
	array('label'=>Yii::t('app','Update TicketReply'), 'url'=>array('update', 'id'=>$ticketReply->id)),
	array('label'=>Yii::t('app','Delete TicketReply'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$ticketReply->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h2><?php echo Yii::t('app','View {name}',array('{name}' => $ticketReply->id)); ?></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$ticketReply,
	'attributes'=>array(
		'id',
		'ticket_id',
		'message',
		'author_id',
		'time',
	),
)); ?>
