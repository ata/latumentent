<?php
$this->breadcrumbs=array(
	Yii::t('app','Roles')=>array('index'),
	Yii::t('app','Manage'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Create Role'), 'url'=>array('create')),
);

?>

<h2><?php echo Yii::t('app','Manage Roles'); ?></h2>
<div class="new-button last span-8">
	<?php echo CHtml::link(Yii::t('app','Add New Role'), array('create'));?>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'role-grid',
	'dataProvider'=>$role->search(),
	'filter'=>$role,
	'columns'=>array(
		'id',
		'name',
		'display',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
