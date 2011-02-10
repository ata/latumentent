<?php
$this->breadcrumbs=array(
	Yii::t('app','Users')=>array('index'),
	Yii::t('app','Manage'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Create User'), 'url'=>array('create')),
);

?>

<h2><?php echo Yii::t('app','Manage Users'); ?></h2>
<div class="new-button last span-8">
	<?php echo CHtml::link(Yii::t('app','Add User'), array('create'));?>
</div>
<div class="clear"></div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$user->search(),
	'filter'=>$user,
	'columns'=>array(
		'id',
		'username',
		//'password',
		'email',
		array(
			'name'=>'role_id',
			'value'=>'$data->displayRole',
		),
		array(
			'name'=>'status',
			'value'=>'$data->displayStatus',
		),
		/*
		'fullname',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
