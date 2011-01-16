<?php
$this->breadcrumbs=array(
	Yii::t('app','Users')=>array('index'),
	Yii::t('app','Manage'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Create User'), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('user-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h2><?php echo Yii::t('app','Manage Users'); ?></h2>

<p>
<?php echo Yii::t('app','You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.'); ?></p>

<?php echo CHtml::link(Yii::t('app','Advanced Search'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'user'=>$user,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$user->search(),
	'filter'=>$user,
	'columns'=>array(
		'id',
		'fullname',
		'username',
		'password',
		'email',
		'role_id',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
