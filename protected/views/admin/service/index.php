<?php
$this->breadcrumbs=array(
	Yii::t('app','Services')=>array('index'),
	Yii::t('app','Manage'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Create Service'), 'url'=>array('create')),
);
?>

<h2><?php echo Yii::t('app','Manage Services'); ?></h2>
<div class="new-button last span-8">
	<?php echo CHtml::link(Yii::t('app','Add Service'), array('create'));?>
</div>
<div class="clear"></div>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'service-grid',
	'dataProvider'=>$service->search(),
	'filter'=>$service,
	'columns'=>array(
		'id',
		'name',
		'price',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
