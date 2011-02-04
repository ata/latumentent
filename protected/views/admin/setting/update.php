<?php
$this->breadcrumbs=array(
	Yii::t('app','Settings')=>array('index'),
	$setting->id=>array('view','id'=>$setting->id),
	Yii::t('app','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Manage Setting'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Create Setting'), 'url'=>array('create')),
	array('label'=>Yii::t('app','View Setting'), 'url'=>array('view', 'id'=>$setting->id)),
);
?>

<h2><?php echo Yii::t('app','Update {name}',array('{name}' => $setting->id)); ?></h2>

<?php echo $this->renderPartial('_form', array('setting'=>$setting)); ?>