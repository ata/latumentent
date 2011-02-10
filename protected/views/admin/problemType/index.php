<?php
$this->breadcrumbs=array(
	Yii::t('app','Problem Types')=>array('index'),
	Yii::t('app','Manage'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Create ProblemType'), 'url'=>array('create')),
);

?>
<h2><?php echo Yii::t('app','Manage Problem Types'); ?></h2>
<div class="new-button last span-8">
	<?php echo CHtml::link(Yii::t('app','Add Problem Type'), array('create'));?>
</div>
<div class="clear"></div>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'problem-type-grid',
	'dataProvider'=>$problemType->search(),
	'filter'=>$problemType,
	'columns'=>array(
		array(
			'class' => 'NumberColumn',
		),
		'name',
		array(
			'name'=>'service_id',
			'value'=>'$data->serviceName',
			'filter'=>CHtml::listData(Service::model()->findAll(),'id','name'),
		),
		'down',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
