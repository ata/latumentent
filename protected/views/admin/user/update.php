<?php
$this->breadcrumbs=array(
	Yii::t('app','Users')=>array('index'),
	$user->id=>array('view','id'=>$user->id),
	Yii::t('app','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Manage User'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Create User'), 'url'=>array('create')),
	array('label'=>Yii::t('app','View User'), 'url'=>array('view', 'id'=>$user->id)),
);
?>

<h2><?php echo Yii::t('app','Update {name}',array('{name}' => $user->id)); ?></h2>

<?php echo $this->renderPartial('_form', array('user'=>$user)); ?>