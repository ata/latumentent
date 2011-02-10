<?php
$this->breadcrumbs=array(
	Yii::t('app','Revenues')=>array('index'),
	$revenue->id=>array('view','id'=>$revenue->id),
	Yii::t('app','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Manage Revenue'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Create Revenue'), 'url'=>array('create')),
	array('label'=>Yii::t('app','View Revenue'), 'url'=>array('view', 'id'=>$revenue->id)),
);
?>

<h2><?php echo Yii::t('app','Update {name}',array('{name}' => $revenue->id)); ?></h2>

<?php echo $this->renderPartial('_form', array('revenue'=>$revenue)); ?>