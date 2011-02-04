<?php
$this->breadcrumbs=array(
	Yii::t('app','Ticket Replys')=>array('index'),
	Yii::t('app','Create'),
);

$this->menu=array(
	array('label'=> Yii::t('app','Manage TicketReply'), 'url'=>array('index')),
);
?>

<h2><?php echo Yii::t('app','Create TicketReply'); ?></h2>

<?php echo $this->renderPartial('_form', array('ticketReply'=>$ticketReply)); ?>