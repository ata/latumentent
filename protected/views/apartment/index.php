<h2><?php echo Yii::t('app','Apartment'); ?></h2>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'apartment-grid',
	'dataProvider'=>$apartment->search(),
	'filter'=>$apartment,
	'columns'=>array(
		'id',
		'number',
		//'note',
		array(
			'name' =>'note',
			'filter' => false,
		),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
