<?php
$this->breadcrumbs=array(
	Yii::t('app','Roles')=>array('index'),
	$role->name,
);

$this->menu=array(
	array('label'=>Yii::t('app','Manage Role'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Create Role'), 'url'=>array('create')),
	array('label'=>Yii::t('app','Update Role'), 'url'=>array('update', 'id'=>$role->id)),
	array('label'=>Yii::t('app','Delete Role'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$role->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h2><?php echo Yii::t('app','View {name}',array('{name}' => $role->name)); ?></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$role,
	'attributes'=>array(
		'id',
		'name',
		'display',
	),
)); ?>
<div class="span-8 back-button">
	<?php echo CHtml::link(Yii::t('app','Back'), array('index'));?>
</div>
