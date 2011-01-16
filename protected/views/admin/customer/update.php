<?php
$this->breadcrumbs=array(
	Yii::t('app','Customers')=>array('index'),
	$customer->id=>array('view','id'=>$customer->id),
	Yii::t('app','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Manage Customer'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Create Customer'), 'url'=>array('create')),
	array('label'=>Yii::t('app','View Customer'), 'url'=>array('view', 'id'=>$customer->id)),
);
?>

<h2><?php echo Yii::t('app','Update {name}',array('{name}' => $customer->id)); ?></h2>

<?php echo $this->renderPartial('_form', array('customer'=>$customer)); ?>