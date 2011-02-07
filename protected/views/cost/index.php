<h2><?php echo Yii::t('app','Manage Costs'); ?></h2>

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
