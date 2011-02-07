<div class="title">
	<h2><?php echo Yii::t('app','List Apartment'); ?></h2>
</div>

<div class="span-8 new-button">
	<?php echo CHtml::link(Yii::t('app','Add New Apartment'), array('apartment/create'));?>
</div>

<div class="span-24">
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
</div>
