<?php
$this->breadcrumbs=array(
	Yii::t('app','Service Packages')=>array('index'),
	Yii::t('app','Manage'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Create ServicePackage'), 'url'=>array('create')),
);
?>

<h2><?php echo Yii::t('app','Manage Service Packages'); ?></h2>
<div class="new-button last span-8">
	<?php echo CHtml::link(Yii::t('app','Add Service Package'), array('create'));?>
</div>
<div class="clear"></div>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'service-package-grid',
	'dataProvider'=>$servicePackage->search(),
	'filter'=>$servicePackage,
	'columns'=>array(
		'id',
		'name',
		'note',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
