<?php Yii::app()->clientScript->registerScript('cost-filter','
 (function($){
	var update_revenue_list = function(){
		$("#revenue-grid").yiiGridView.update("revenue-grid",{
			url: $(this).attr("action"),
			data: $("#revenue-filter").serialize(),
		});;
	}
	$("#revenue-filter select").change(update_revenue_list);
	$("#Revenue_period_id").change(function(){
		$("#total").load("index.php?r=revenue/filter&period_id="+$(this).val());
	});
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
						$periodList); ?>
				</div>
				<div class="clear"></div>
			</div>
			<div class="row select span-12" id="select status">
				<div class="label floatLeft">
					<?php echo $form->label($revenue,'status');?>
				</div>
				<div class="floatLeft">
					<?php echo $form->dropDownList($revenue,'status',array(
						Revenue::STATUS_RECEIVED => Yii::t('app','Received'),
						Revenue::STATUS_NOT_RECEIVED => Yii::t('app','Not Received'),
					),array('empty'=>'All'))?>
				</div>
			</div>
			<?php $this->endWidget(); ?>
	</fieldset>
</div>
<div class="clear"></div>
<div class="span-24">
	<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'revenue-grid',
	'dataProvider'=>$revenue->search(),
	'columns'=>array(
		array(
				'class' => 'NumberColumn',
		),
		'name',
		array(
			'name'=>'service_id',
			'value'=>'$data->service->name',
		),
		array(
			'name'=>'statusRevenue',
			'header'=>Yii::t('app','Status'),
		),
		array(
			'name'=>'amountRevenue',
			'header'=>Yii::t('app','Amount'),
		),
	),
)); ?>
</div>
<div class="span-24 bills" id="total">
	<?php $this->renderPartial('_total',array(
		'totalRevenue'=>$totalRevenue
	))?>
</div>
