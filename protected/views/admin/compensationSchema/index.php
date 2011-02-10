<?php
$this->breadcrumbs=array(
	Yii::t('app','Compensation Schemas')=>array('index'),
	Yii::t('app','Manage'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Create Compensation Schema'), 'url'=>array('create')),
);
?>

<h2><?php echo Yii::t('app','Manage Compensation Schemas'); ?></h2>
<div class="new-button last span-8">
	<?php echo CHtml::link(Yii::t('app','Add Compensation Schema'), array('create'));?>
</div>

<div class="clear"></div>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'compensation-schema-grid',
	'dataProvider'=>$compensationSchema->search(),
	'filter'=>$compensationSchema,
	'columns'=>array(
		array(
			'class' => 'NumberColumn',
		),
		'uptime',
		'downtime',
		'percentdown',
		'percentup',
		'compensation',
		'service_id',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
