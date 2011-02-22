<?php
$this->breadcrumbs=array(
	Yii::t('app','Settings')=>array('index'),
	Yii::t('app','Manage'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Create Setting'), 'url'=>array('create')),
);
?>

<h2><?php echo Yii::t('app','Manage Settings'); ?></h2>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'setting-grid',
	'dataProvider'=>$setting->search(),
	'filter'=>$setting,
	'columns'=>array(
		'id',
		'key',
		'value',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
