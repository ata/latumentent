<?php
$this->breadcrumbs=array(
	Yii::t('app','Customers')=>array('index'),
	$customer->id,
);

$this->menu=array(
	array('label'=>Yii::t('app','Manage Customer'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Create Customer'), 'url'=>array('create')),
	array('label'=>Yii::t('app','Update Customer'), 'url'=>array('update', 'id'=>$customer->id)),
	array('label'=>Yii::t('app','Delete Customer'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$customer->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h2><?php echo Yii::t('app','View {name}',array('{name}' => $customer->id)); ?></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$customer,
	'attributes'=>array(
		'id',
		'number',
		'user_id',
		'status',
	),
)); ?>
