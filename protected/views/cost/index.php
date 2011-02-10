<?php Yii::app()->clientScript->registerScript('cost-filter','
 (function($){
	var update_cost_list = function(){
		$("#cost-grid").yiiGridView.update("cost-grid",{
			url: $(this).attr("action"),
			data: $("#cost-filter").serialize(),
		});
	}
	$("#cost-filter select").change(update_cost_list);
})(jQuery)
')
?>
<?php
$this->breadcrumbs=array(
	Yii::t('app','Costs')=>array('index'),
	Yii::t('app','Manage'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Create Cost'), 'url'=>array('create')),
);

?>


<div class="title">
	<h2><?php echo Yii::t('app','List Cost'); ?></h2>
</div>


<div class="span-8 new-button">
	<?php echo CHtml::link(Yii::t('app','Add New Cost'), array('cost/create'));?>
</div>

<div class="filter span-16 last form" id="ticket">
	<fieldset>
		<legend><?php echo Yii::t('app','filter'); ?></legend>
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'cost-filter'
			)); ?>
			<div class="row select span-12" id="select-period">
				<div class="label floatLeft">
					<?php echo $form->label($cost,'period_id',$periodList);?>
				</div>
				<div class="floatLeft">
					<?php echo $form->dropDownList($cost, 'period_id', 
						$periodList,array('empty'=>Yii::t('app','All'))); ?>
				</div>
				<div class="clear"></div>
			</div>
			<?php $this->endWidget(); ?>
	</fieldset>
</div>

<div class="span-24">
	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'cost-grid',
		'dataProvider'=>$cost->search(),
		'columns'=>array(
			array(
				'class' => 'NumberColumn',
			),
			array(
				'name'=>'period_id',
				'value'=>'$data->period->name',
			),
			array(
				'name'=>'serviceName',
				'header'=> Yii::t('app','Service'),
			),
			array(
				'name'=>'costLocale',
				'header'=>Yii::t('app','Amount'),
			),
			array(
				'class'=>'CButtonColumn',
			),
	))); 
?>
</div>
