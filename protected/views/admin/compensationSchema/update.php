<?php
$this->breadcrumbs=array(
	Yii::t('app','Compensation Schemas')=>array('index'),
	$compensationSchema->id=>array('view','id'=>$compensationSchema->id),
	Yii::t('app','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Manage CompensationSchema'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Create CompensationSchema'), 'url'=>array('create')),
	array('label'=>Yii::t('app','View CompensationSchema'), 'url'=>array('view', 'id'=>$compensationSchema->id)),
);
?>

<h2><?php echo Yii::t('app','Update {name}',array('{name}' => $compensationSchema->id)); ?></h2>

<?php echo $this->renderPartial('_form', array('compensationSchema'=>$compensationSchema)); ?>