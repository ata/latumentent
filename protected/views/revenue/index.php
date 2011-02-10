<?php Yii::app()->clientScript->registerScript('cost-filter','
 (function($){
	var update_revenue_list = function(){
		$("#revenue-grid").yiiGridView.update("revenue-grid",{
			url: $(this).attr("action"),
			data: $("#revenue-filter").serialize(),
		});
	}
	$("#revenue-filter select").change(update_revenue_list);
})(jQuery)
')
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','Revenues')=>array('index'),
	Yii::t('app','Manage'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Create Revenue'), 'url'=>array('create')),
);
?>

<h2><?php echo Yii::t('app','Manage Revenues'); ?></h2>
<?php /*
<div class="new-button last span-8">
	<?php echo CHtml::link(Yii::t('app','Add Revenue'), array('create'));?>
</div>
*/?>

<div class="filter span-24 last form" id="ticket">
	<fieldset>
		<legend><?php echo Yii::t('app','filter'); ?></legend>
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'revenue-filter'
			)); ?>
			<div class="row select span-12" id="select-period">
				<div class="label floatLeft">
					<?php echo $form->label($revenue,'period_id');?>
				</div>
				<div class="floatLeft">
					<?php echo $form->dropDownList($revenue, 'period_id', 
						$periodList,array('empty'=>Yii::t('app','All'))); ?>
				</div>
				<div class="clear"></div>
			</div>
			<?php $this->endWidget(); ?>
	</fieldset>
</div>
<div class="clear"></div>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'revenue-grid',
	'dataProvider'=>$revenue->search(),
	'columns'=>array(
		array(
				'class' => 'NumberColumn',
		),
		array(
			'name'=>'period_id',
			'value'=>'$data->period->name',
			'filter'=>CHtml::listData(Period::model()->findAll(),'id','name'),
		),
		array(
			'name'=>'service_id',
			'value'=>'$data->service->name',
			'filter'=>CHtml::listData(Service::model()->findAll(),'id','name'),
		),
		array(
			'name'=>'amountRevenue',
			'header'=>Yii::t('app','Amount'),
		),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
