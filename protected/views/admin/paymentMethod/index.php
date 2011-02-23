<?php
$this->breadcrumbs=array(
	Yii::t('app','Payment Methods')=>array('index'),
	Yii::t('app','Manage'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Create PaymentMethod'), 'url'=>array('create')),
);

?>

<h2><?php echo Yii::t('app','Manage Payment Methods'); ?></h2>
<div class="new-button last span-8">
	<?php echo CHtml::link(Yii::t('app','Add Payment Method'), array('create'));?>
</div>
<div class="clear"></div>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'payment-method-grid',
	'dataProvider'=>$paymentMethod->search(),
	'filter'=>$paymentMethod,
	'columns'=>array(
		'id',
		'name',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
