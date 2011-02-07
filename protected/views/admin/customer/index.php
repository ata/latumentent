<?php
$this->breadcrumbs=array(
	Yii::t('app','Customers')=>array('index'),
	Yii::t('app','Manage'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Create Customer'), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('customer-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h2><?php echo Yii::t('app','Manage Customers'); ?></h2>

<p>
<?php echo Yii::t('app','You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.'); ?></p>

<?php echo CHtml::link(Yii::t('app','Advanced Search'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'customer'=>$customer,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'customer-grid',
	'dataProvider'=>$customer->search(),
	'filter'=>$customer,
	'columns'=>array(
		'id',
		'apartment.number',
		array(
			'name'=>'user_id',
			'header'=>Yii::t('app','fullname'),
			'value'=>'$data->user->fullname',
			'filter'=>CHtml::listData(User::model()->findListCustomer(),'id','fullname')
		),
		array(
			'name'=>'status',
			'value'=>'$data->StatusCustomer',
			'filter'=>array(
				Customer::STATUS_ACTIVE => Yii::t('app','Active'),
				Customer::STATUS_DELETED => Yii::t('app','Non-Active'),
			),
		),
		'contact_number',
		array(
			'name'=>'ownership',
			'value'=>'$data->displayOwnership',
			'filter'=>array(
				Customer::OWNERSHIP_OWNER => Yii::t('app','Owner'),
				Customer::OWNERSHIP_RENTER => Yii::t('app','Renter'),
			),
		),
		/*
		'hire_up_to',
		/*
		'apartment_id',
		'rating',
		'delay_count',
		'advance_count',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
