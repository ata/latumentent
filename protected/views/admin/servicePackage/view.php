<?php
$this->breadcrumbs=array(
	Yii::t('app','Service Packages')=>array('index'),
	$servicePackage->name,
);

$this->menu=array(
	array('label'=>Yii::t('app','Manage ServicePackage'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Create ServicePackage'), 'url'=>array('create')),
	array('label'=>Yii::t('app','Update ServicePackage'), 'url'=>array('update', 'id'=>$servicePackage->id)),
	array('label'=>Yii::t('app','Delete ServicePackage'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$servicePackage->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h2><?php echo Yii::t('app','View {name}',array('{name}' => $servicePackage->name)); ?></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$servicePackage,
	'attributes'=>array(
		'id',
		'name',
		'note',
	),
)); ?>
