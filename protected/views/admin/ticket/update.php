<?php
$this->breadcrumbs=array(
	Yii::t('app','Tickets')=>array('index'),
	$ticket->title=>array('view','id'=>$ticket->id),
	Yii::t('app','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Manage Ticket'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Create Ticket'), 'url'=>array('create')),
	array('label'=>Yii::t('app','View Ticket'), 'url'=>array('view', 'id'=>$ticket->id)),
);
?>

<h2><?php echo Yii::t('app','Update {name}',array('{name}' => $ticket->title)); ?></h2>

<?php echo $this->renderPartial('_form', array('ticket'=>$ticket)); ?>