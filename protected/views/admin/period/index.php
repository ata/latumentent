<?php
$this->breadcrumbs=array(
	Yii::t('app','Periods')=>array('index'),
	Yii::t('app','Manage'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Create Period'), 'url'=>array('create')),
);
?>

<h2><?php echo Yii::t('app','Manage Periods'); ?></h2>

<div class="new-button last span-8">
	<?php echo CHtml::link(Yii::t('app','Open New Period'), array('open'));?>
</div>
<div class="clear"></div>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'period-grid',
	'dataProvider'=>$period->search(),
	'filter'=>$period,
	'columns'=>array(
		'id',
		'name',
		//'total_revenue',
		//'total_outlay',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
