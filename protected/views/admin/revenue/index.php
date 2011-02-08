<?php
$this->breadcrumbs=array(
	Yii::t('app','Revenues')=>array('index'),
	Yii::t('app','Manage'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Create Revenue'), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('revenue-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h2><?php echo Yii::t('app','Manage Revenues'); ?></h2>

<p>
<?php echo Yii::t('app','You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.'); ?></p>

<?php echo CHtml::link(Yii::t('app','Advanced Search'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'revenue'=>$revenue,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'revenue-grid',
	'dataProvider'=>$revenue->search(),
	'filter'=>$revenue,
	'columns'=>array(
		'id',
		'amount',
		array(
			'name'=>'period_id',
			'value'=>'$data->period->name',
			'filter'=>CHtml::listData(Period::model()->findAll(),'id','name'),
		),
		array(
			'name'=>'service_id',
			'value'=>'$data->service->name',
			'filter'=>CHtml::listData(Service::model()->findAll(),'id','name'),
		),
		array(
			'name'=>'user_id',
			'value'=>'$data->user->fullname',
			'filter'=>CHtml::listData(Customer::model()->findAll(),'id','user.fullname'),
		),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
