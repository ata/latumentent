<?php
$this->breadcrumbs=array(
	Yii::t('app','Roles')=>array('index'),
	$role->name=>array('view','id'=>$role->id),
	Yii::t('app','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Manage Role'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Create Role'), 'url'=>array('create')),
	array('label'=>Yii::t('app','View Role'), 'url'=>array('view', 'id'=>$role->id)),
);
?>

<h2><?php echo Yii::t('app','Update {name}',array('{name}' => $role->name)); ?></h2>

<?php echo $this->renderPartial('_form', array('role'=>$role)); ?>