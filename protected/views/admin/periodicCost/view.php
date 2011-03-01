<?php
$this->breadcrumbs=array(
	Yii::t('app','Periodic Costs')=>array('index'),
	$periodicCost->name,
);

$this->menu=array(
	array('label'=>Yii::t('app','Manage PeriodicCost'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Create PeriodicCost'), 'url'=>array('create')),
	array('label'=>Yii::t('app','Update PeriodicCost'), 'url'=>array('update', 'id'=>$periodicCost->id)),
	array('label'=>Yii::t('app','Delete PeriodicCost'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$periodicCost->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h2><?php echo Yii::t('app','View {name}',array('{name}' => $periodicCost->name)); ?></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$periodicCost,
	'attributes'=>array(
		'id',
		'name',
		'amount',
		'payment_date',
		'note',
	),
)); ?>
<div class="span-8 back-button">
	<?php echo CHtml::link(Yii::t('app','Back'), array('index'));?>
</div>
