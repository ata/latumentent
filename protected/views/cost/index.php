<?php
$this->breadcrumbs=array(
	Yii::t('app','Costs')=>array('index'),
	Yii::t('app','Manage'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Create Cost'), 'url'=>array('create')),
);

?>

<div class="title">
	<h2><?php echo Yii::t('app','List Cost'); ?></h2>
</div>

<div class="span-8 new-button">
	<?php echo CHtml::link(Yii::t('app','Add New Cost'), array('cost/create'));?>
</div>


<div class="span-24">
	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'cost-grid',
		'dataProvider'=>$cost->search(),
		'filter'=>$cost,
		'columns'=>array(
			'id',
			'amount',
			'period_id',
			'service_id',
			'user_id',
			array(
				'class'=>'CButtonColumn',
				),
		),
	)); ?>
</div>
