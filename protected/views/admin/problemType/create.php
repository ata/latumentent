<?php
$this->breadcrumbs=array(
	Yii::t('app','Problem Types')=>array('index'),
	Yii::t('app','Create'),
);

$this->menu=array(
	array('label'=> Yii::t('app','Manage Problem Type'), 'url'=>array('index')),
);
?>

<h2><?php echo Yii::t('app','Create ProblemType'); ?></h2>

<?php echo $this->renderPartial('_form', array('problemType'=>$problemType)); ?>
