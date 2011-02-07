<?php
$this->breadcrumbs=array(
	Yii::t('app','Apartments')=>array('index'),
	$apartment->id=>array('view','id'=>$apartment->id),
	Yii::t('app','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Manage Apartment'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Create Apartment'), 'url'=>array('create')),
	array('label'=>Yii::t('app','View Apartment'), 'url'=>array('view', 'id'=>$apartment->id)),
);
?>

<h2><?php echo Yii::t('app','Update {name}',array('{name}' => $apartment->id)); ?></h2>

<?php echo $this->renderPartial('_form', array('apartment'=>$apartment)); ?>