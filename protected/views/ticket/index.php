<?php Yii::app()->clientScript->registerScript('ticket-filter','
(function($){
	$("#status_check, #select-period").change(function(){
		$("#ticket-list").yiiGridView.update("ticket-list",{
			url: $(this).attr("action"),
			data: $("#ticket-filter").serialize(),
		});
	});
})(jQuery)');?>
<div class="title">
	<h2><?php echo Yii::t('app','List Ticket'); ?></h2>
</div>

<div class="filter span-24 last form" id="ticket">
	<fieldset>
		<legend><?php echo Yii::t('app','filter'); ?></legend>
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'ticket-filter'
			)); ?>
			<div class="row select span-12" id="select-period">
				<div class="label floatLeft">
					<?php echo $form->label($ticket,'period');?>
				</div>
				<div class="floatLeft">
					<?php echo $form->dropDownList($ticket, 'period', $periodList,array('empty'=>Yii::t('app','All'))); ?>
				</div>
				<div class="clear"></div>
			</div>
			<div class="row select" id="status_check">
				<?php echo $form->label($ticket,'status');?>
				
				<div class="floatLeft">
					<?php echo $form->dropDownList($ticket, 'status', array(
						Ticket::STATUS_OPEN=>'Open',
						Ticket::STATUS_CLOSED=>'Close',
					),array('empty' => 'All'));?>
				</div>
			</div>
			<?php $this->endWidget(); ?>
	</fieldset>
</div>

<div class="span-24">
	<?php $this->widget('zii.widgets.grid.CGridView',array(
		'id'=>'ticket-list',
		'dataProvider'=>$ticket->search(),
		'columns'=>array(
			array(
				'class' => 'NumberColumn'
			),
			array(
				'name' => 'title',
				'header'=>Yii::t('app','Title'),
				'type'=>'raw',
				'value'=>'CHtml::link($data->title,array("view","id"=>$data->id))',
			),
			array(
				'name' => 'customer_id',
				'header'=>Yii::t('app','Customer'),
				'type'=>'raw',
				'value'=>'$data->customer->user->fullname',
				'visible'=>(Yii::app()->user->getRole() !== 'customer') ? true : false,
			),
			array(
				'name' => 'service_id',
				'header'=>Yii::t('app','Services'),
				'name'=>'service.name',
			),
			array(
				'name' => 'status',
				'header'=>Yii::t('app','Status'),
				'value'=>'$data->statusLabel',
			),
		),
	));
	?>
</div>
