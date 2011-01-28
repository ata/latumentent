<div class="title">
	<h2><?php echo Yii::t('app','List Ticket'); ?></h2>
</div>


<div class="filter span-16 last form" id="customer-filter">
	<fieldset>
		<legend><?php echo Yii::t('app','filter'); ?></legend>
			<div class="row">
				<div class="label floatLeft"><label><?php echo Yii::t('app','Period'); ?></label></div>
				<div class="floatLeft"><?php echo CHtml::dropDownList('period', 'all', $periodList); ?></div>
				<div class="clear"></div>
			</div>
			<div class="row">
				<div class="label floatleft"><label><?php echo Yii::t('app','Status');?></label></div>
				<div class="floatleft"><?php echo CHtml::dropDownList('status','all',array(
					Ticket::STATUS_OPEN=>'Open',
					Ticket::STATUS_CLOSED=>'Close',
					))?></div>
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
				'type'=>'raw',
				'value'=>'CHtml::link($data->title,array("view","id"=>$data->id))',
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