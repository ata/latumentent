<?php
$this->breadcrumbs=array(
	Yii::t('app','Problem Types')=>array('index'),
	$problemType->name=>array('view','id'=>$problemType->id),
	Yii::t('app','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Manage ProblemType'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Create ProblemType'), 'url'=>array('create')),
	array('label'=>Yii::t('app','View ProblemType'), 'url'=>array('view', 'id'=>$problemType->id)),
);
?>

<h2><?php echo Yii::t('app','Update {name}',array('{name}' => $problemType->name)); ?></h2>

<?php echo $this->renderPartial('_form', array('problemType'=>$problemType)); ?>