<?php
$this->breadcrumbs=array(
	Yii::t('app','Service Packages')=>array('index'),
	Yii::t('app','Create'),
);

$this->menu=array(
	array('label'=> Yii::t('app','Manage ServicePackage'), 'url'=>array('index')),
);
?>

<h2><?php echo Yii::t('app','Create ServicePackage'); ?></h2>

<?php echo $this->renderPartial('_form', array(
	'servicePackage'=>$servicePackage,
	'serviceList'=>$serviceList
	)); ?>
