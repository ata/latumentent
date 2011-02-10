<?php Yii::app()->clientScript->registerScript('period-filter',' 
	$("#Period_name").change(function(){
		$("#data").load("index.php?r=balance/filter&period="+$(this).val());
	});
')?>

<div class="filter span-24 last form" id="ticket">
	<fieldset>
		<legend><?php echo Yii::t('app','filter'); ?></legend>
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'period-filter'
		)); ?>
			<div class="row select span-12" id="select-period">
				<div class="label floatLeft">
					<?php echo $form->label($period,'period');?>
				</div>
				<div class="floatLeft">
					<?php echo $form->dropDownList($period, 'name', $periodList); ?>
				</div>
				<div class="clear"></div>
			</div>
		<?php $this->endWidget()?>
	</fieldset>
</div>

<div id="data">
	<?php $this->renderPartial('_data',array(
			'revenue'=>$revenue,
			'cost'=>$cost,
		))?>
</div>


