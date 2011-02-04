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


<div class="filter span-16 last form" id="ticket">
	<fieldset>
		<legend><?php echo Yii::t('app','filter'); ?></legend>
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'ticket-filter'
			)); ?>
			<div class="row select" id="select-period">
				<div class="label floatLeft">
					<?php echo $form->labelEx($ticketList,'period');?>
				</div>
				<div class="floatLeft">
					<?php echo $form->dropDownList($ticketList, 'period', $periodList); ?>
				</div>
				<div class="clear"></div>
			</div>
			<div class="row checkbox" id="status_check">
				<?php echo $form->labelEx($ticketList,'status');?>
				<?php echo $form->checkBoxList($ticketList,'status',array(
					Ticket::STATUS_OPEN=>'Open',
					Ticket::STATUS_CLOSED=>'Close',
					),array('class'=>'check','separator'=>''))?>
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
				'header'=>Yii::t('app','Consumer'),
				'type'=>'raw',
				'value'=>'$data->customer->user->fullname',
				'visible'=>(Yii::app()->user->getRole() !== 'customer') ? true : false,
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
