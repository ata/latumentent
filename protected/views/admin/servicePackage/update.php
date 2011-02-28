<?php
$this->breadcrumbs=array(
	Yii::t('app','Service Packages')=>array('index'),
	$servicePackage->name=>array('view','id'=>$servicePackage->id),
	Yii::t('app','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Manage ServicePackage'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Create ServicePackage'), 'url'=>array('create')),
	array('label'=>Yii::t('app','View ServicePackage'), 'url'=>array('view', 'id'=>$servicePackage->id)),
);
?>

<h2><?php echo Yii::t('app','Update {name}',array('{name}' => $servicePackage->name)); ?></h2>

<?php echo $this->renderPartial('_form', array('servicePackage'=>$servicePackage)); ?>