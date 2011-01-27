<?php Yii::app()->clientScript->registerScript('filter-js','$(\'#period\').change(function(){
	$(\'#ticket-list\').yiiGridView.update(\'ticket-list\',{
		url:\'?period=\'+$(this).val()
	});
});');?>
<div class="filter">
    <?php echo CHtml::link(Yii::t('app','Complaint'),array('create'))?>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="form">
	<label>Periode</label>
	<?php echo CHtml::dropDownList('period','all',$periodList);?>
    </div>
</div>
<div class="list-ticket">
    <?php $this->widget('zii.widgets.grid.CGridView',array(
		'id'=>'ticket-list',
		'dataProvider'=>$dataProvider,
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