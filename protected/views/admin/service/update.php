<?php
$this->breadcrumbs=array(
	Yii::t('app','Services')=>array('index'),
	$service->name=>array('view','id'=>$service->id),
	Yii::t('app','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Manage Service'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Create Service'), 'url'=>array('create')),
	array('label'=>Yii::t('app','View Service'), 'url'=>array('view', 'id'=>$service->id)),
);
?>

<h2><?php echo Yii::t('app','Update {name}',array('{name}' => $service->name)); ?></h2>

<?php echo $this->renderPartial('_form', array('service'=>$service)); ?>