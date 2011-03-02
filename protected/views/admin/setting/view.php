<?php
$this->breadcrumbs=array(
	Yii::t('app','Settings')=>array('index'),
	$setting->id,
);

$this->menu=array(
	array('label'=>Yii::t('app','Manage Setting'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Create Setting'), 'url'=>array('create')),
	array('label'=>Yii::t('app','Update Setting'), 'url'=>array('update', 'id'=>$setting->id)),
	array('label'=>Yii::t('app','Delete Setting'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$setting->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h2><?php echo Yii::t('app','View {name}',array('{name}' => $setting->id)); ?></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$setting,
	'attributes'=>array(
		'id',
		'key',
		'value',
	),
)); ?>
<div class="span-8 back-button">
	<?php echo CHtml::link(Yii::t('app','Back'), array('index'));?>
</div>
