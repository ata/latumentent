<?php
$this->breadcrumbs=array(
	Yii::t('app','Apartments')=>array('index'),
	Yii::t('app','Create'),
);

$this->menu=array(
	array('label'=> Yii::t('app','Manage Apartment'), 'url'=>array('index')),
);
?>

<h2><?php echo Yii::t('app','Create Apartment'); ?></h2>

<?php echo $this->renderPartial('_form', array('apartment'=>$apartment)); ?>