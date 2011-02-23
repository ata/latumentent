<?php
$this->breadcrumbs=array(
	Yii::t('app','Payment Methods')=>array('index'),
	$paymentMethod->name=>array('view','id'=>$paymentMethod->id),
	Yii::t('app','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Manage PaymentMethod'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Create PaymentMethod'), 'url'=>array('create')),
	array('label'=>Yii::t('app','View PaymentMethod'), 'url'=>array('view', 'id'=>$paymentMethod->id)),
);
?>

<h2><?php echo Yii::t('app','Update {name}',array('{name}' => $paymentMethod->name)); ?></h2>

<?php echo $this->renderPartial('_form', array('paymentMethod'=>$paymentMethod)); ?>