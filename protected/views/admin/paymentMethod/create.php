<?php
$this->breadcrumbs=array(
	Yii::t('app','Payment Methods')=>array('index'),
	Yii::t('app','Create'),
);

$this->menu=array(
	array('label'=> Yii::t('app','Manage PaymentMethod'), 'url'=>array('index')),
);
?>

<h2><?php echo Yii::t('app','Create PaymentMethod'); ?></h2>

<?php echo $this->renderPartial('_form', array('paymentMethod'=>$paymentMethod)); ?>