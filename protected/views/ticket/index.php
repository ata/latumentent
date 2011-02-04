<?php Yii::app()->clientScript->registerScript('filter-js','
function showValues(){
	var str = $(\'#ticket-filter\').serialize();
	$(\'#ticket-list\').yiiGridView.update(\'ticket-list\',{
		url:$(this).attr(\'action\'),
		data:str
	});
};
$(\'#status_check\').click(showValues);
$(\'#select-period\').change(showValues);
');?>
<div class="title">
	<h2><?php echo Yii::t('app','List Ticket'); ?></h2>
</div>


<div class="filter span-16 last form" id="customer-filter">
	<fieldset>
		<legend><?php echo Yii::t('app','filter'); ?></legend>
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'ticket-filter'
			)); ?>
			<div class="row" id="select-period">
				<?php echo $form->labelEx($ticketList,'period');?>
				<?php echo $form->dropDownList($ticketList, 'period', $periodList); ?>
			</div>
			<div class="row-checkbox" id="status_check">
				<?php echo $form->labelEx($ticketList,'status');?>
				<?php echo $form->checkBoxList($ticketList,'status',array(
					Ticket::STATUS_OPEN=>'Open',
					Ticket::STATUS_CLOSED=>'Close',
					),array('class'=>'check'))?>
			</div>
			<?php $this->endWidget(); ?>
	</fieldset>
</div>

<div class="span-24">
    <?php $this->widget('zii.widgets.grid.CGridView',array(
		'id'=>'ticket-list',
		'dataProvider'=>$dataProvider,
		'columns'=>array(
			array(
				'class' => 'NumberColumn'
			),
			array(
				'header'=>Yii::t('app','title'),
				'type'=>'raw',
				'value'=>'CHtml::link($data->title,array("view","id"=>$data->id))',
			),
			array(
				'header'=>Yii::t('app','service'),
				'name'=>'service.name',
			),
			array(
				'header'=>Yii::t('app','Status'),
				'value'=>'$data->statusLabel',
			),
		),
	));
	?>
</div>
