<div class="title">
	<h2><?php echo Yii::t('app','Ticket'); ?></h2>
</div>

<div class="span-8 new-button">
	<?php echo CHtml::link(Yii::t('app','Ajukan Permasalahan'), array('ticket/create'));?>
</div>

<div class="filter span-16 last form" id="customer-filter">
	<fieldset>
		<legend><?php echo Yii::t('app','filter'); ?></legend>
			<div class="row">
				<div class="label floatLeft"><label><?php echo Yii::t('app','Period'); ?></label></div>
				<div class="floatLeft"><?php echo CHtml::dropDownList('period', 'all', $periodList); ?></div>
				<div class="clear"></div>
			</div>
	</fieldset>
</div>

<div class="span-24">
    <?php $this->widget('zii.widgets.grid.CGridView',array(
		'id'=>'ticket-list',
		'dataProvider'=>$ticketList->search(),
		'columns'=>array(
			array(
				'class' => 'NumberColumn'
			),
			array(
				'header'=>Yii::t('app','body'),
				'value'=>'$data->body',
			),
			array(
				'header'=>Yii::t('app','service'),
				'value'=>'$data->service->name',
			),
			array(
				'header'=>Yii::t('app','status'),
				'value'=>'$data->status === "1"?CHtml::encode(Yii::t("app","Open")):CHtml::encode(Yii::t("app","Closed"))'
			),
		),
	));
    ?>
</div>