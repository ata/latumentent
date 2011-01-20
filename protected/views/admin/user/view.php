<?php
$this->breadcrumbs=array(
	Yii::t('app','Users')=>array('index'),
	$user->id,
);

$this->menu=array(
	array('label'=>Yii::t('app','Manage User'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Create User'), 'url'=>array('create')),
	array('label'=>Yii::t('app','Update User'), 'url'=>array('update', 'id'=>$user->id)),
	array('label'=>Yii::t('app','Delete User'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$user->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h2><?php echo Yii::t('app','View {name}',array('{name}' => $user->id)); ?></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$user,
	'attributes'=>array(
		'id',
		'username',
		'password',
		'email',
		'role_id',
		'status',
		'fullname',
	),
)); ?>
