<?php
$this->breadcrumbs=array(
	Yii::t('app','Tickets')=>array('index'),
	Yii::t('app','Create'),
);

$this->menu=array(
	array('label'=> Yii::t('app','Manage Ticket'), 'url'=>array('index')),
);
?>

<h2><?php echo Yii::t('app','Create Ticket'); ?></h2>

<?php echo $this->renderPartial('_form', array('ticket'=>$ticket)); ?>