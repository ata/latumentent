<?php
$this->breadcrumbs=array(
	Yii::t('app','Periods')=>array('index'),
	$period->name,
);

$this->menu=array(
	array('label'=>Yii::t('app','Manage Period'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Create Period'), 'url'=>array('create')),
	array('label'=>Yii::t('app','Update Period'), 'url'=>array('update', 'id'=>$period->id)),
	array('label'=>Yii::t('app','Delete Period'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$period->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h2><?php echo Yii::t('app','View {name}',array('{name}' => $period->name)); ?></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$period,
	'attributes'=>array(
		'id',
		'name',
		'start',
		'end',
	),
)); ?>
<div class="span-8 back-button">
	<?php echo CHtml::link(Yii::t('app','Back'), array('index'));?>
</div>
