<?php
$this->breadcrumbs=array(
	Yii::t('app','Tickets')=>array('index'),
	Yii::t('app','Manage'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Create Ticket'), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('ticket-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h2><?php echo Yii::t('app','Manage Tickets'); ?></h2>

<p>
<?php echo Yii::t('app','You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.'); ?></p>

<?php echo CHtml::link(Yii::t('app','Advanced Search'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'ticket'=>$ticket,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ticket-grid',
	'dataProvider'=>$ticket->search(),
	'filter'=>$ticket,
	'columns'=>array(
		'id',
		'title',
		'body',
		array(
			'name'=>'status',
			'value'=>'$data->statusLabel'
		),
		'compensation',
		'invoice_id',
		/*
		'invoice_item_id',
		'period_id',
		'customer_id',
		'technician_id',
		'author_id',
		'service_id',
		'time_open',
		'time_closed',
		'problem_type_id',
		'solved',
		'down',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
