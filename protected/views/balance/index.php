<?php Yii::app()->clientScript->registerScript('period-filter',' 
	$("#Period_name").change(function(){
		$("#data").load("index.php?r=balance/filter&period="+$(this).val());
	});
')?>

<div class="filter span-16 last form">
	<fieldset>
		<legend><?php echo Yii::t('app','filter'); ?></legend>
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'period-filter'
		)); ?>
			<div class="row">
				<?php echo Yii::t('app','Period');?>
				<?php echo $form->dropDownList($period,'name',$periodList)?>
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


