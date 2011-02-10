<?php
$this->breadcrumbs=array(
	Yii::t('app','Periodic Costs')=>array('index'),
	Yii::t('app','Manage'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Create PeriodicCost'), 'url'=>array('create')),
);
?>

<h2><?php echo Yii::t('app','Manage Periodic Costs'); ?></h2>
<div class="new-button last span-8">
	<?php echo CHtml::link(Yii::t('app','Add Periodic Cost'), array('create'));?>
</div>
<div class="clear"></div>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'periodic-cost-grid',
	'dataProvider'=>$periodicCost->search(),
	'filter'=>$periodicCost,
	'columns'=>array(
		'id',
		'name',
		'amount',
		'note',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
