<?php
$this->breadcrumbs=array(
	Yii::t('app','Payment Methods')=>array('index'),
	$paymentMethod->name,
);

$this->menu=array(
	array('label'=>Yii::t('app','Manage PaymentMethod'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Create PaymentMethod'), 'url'=>array('create')),
	array('label'=>Yii::t('app','Update PaymentMethod'), 'url'=>array('update', 'id'=>$paymentMethod->id)),
	array('label'=>Yii::t('app','Delete PaymentMethod'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$paymentMethod->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h2><?php echo Yii::t('app','View {name}',array('{name}' => $paymentMethod->name)); ?></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$paymentMethod,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
