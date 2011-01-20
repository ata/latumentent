<?php
$this->breadcrumbs=array(
	Yii::t('app','Periods')=>array('index'),
	$period->name=>array('view','id'=>$period->id),
	Yii::t('app','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Manage Period'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Create Period'), 'url'=>array('create')),
	array('label'=>Yii::t('app','View Period'), 'url'=>array('view', 'id'=>$period->id)),
);
?>

<h2><?php echo Yii::t('app','Update {name}',array('{name}' => $period->name)); ?></h2>

<?php echo $this->renderPartial('_form', array('period'=>$period)); ?>