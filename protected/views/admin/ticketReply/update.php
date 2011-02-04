<?php
$this->breadcrumbs=array(
	Yii::t('app','Ticket Replys')=>array('index'),
	$ticketReply->id=>array('view','id'=>$ticketReply->id),
	Yii::t('app','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Manage TicketReply'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Create TicketReply'), 'url'=>array('create')),
	array('label'=>Yii::t('app','View TicketReply'), 'url'=>array('view', 'id'=>$ticketReply->id)),
);
?>

<h2><?php echo Yii::t('app','Update {name}',array('{name}' => $ticketReply->id)); ?></h2>

<?php echo $this->renderPartial('_form', array('ticketReply'=>$ticketReply)); ?>