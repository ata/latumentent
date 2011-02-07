<?php
$this->breadcrumbs=array(
	Yii::t('app','Costs')=>array('index'),
	$cost->id=>array('view','id'=>$cost->id),
	Yii::t('app','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Manage Cost'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Create Cost'), 'url'=>array('create')),
	array('label'=>Yii::t('app','View Cost'), 'url'=>array('view', 'id'=>$cost->id)),
);
?>

<h2><?php echo Yii::t('app','Update {name}',array('{name}' => $cost->id)); ?></h2>

<?php echo $this->renderPartial('_form', array('cost'=>$cost)); ?>