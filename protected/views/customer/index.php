<?php Yii::app()->clientScript->registerScript('filter-js','
	function showValues(){
		var str = $(\'#customer-filter\').serialize();
		$(\'#customer-filter\').yiiGridView.update(\'customer-list\',{
			url:$(this).attr(\'action\'),
			data:str,
		});
	}
	$(\'#service\').click(showValues);
')?>
<div class="new-customer">
	<?php echo CHtml::link(Yii::t('app','Tambah Customer'), array('create'))?>
</div>

<div class="filter span-16 last form" id="customer-filter">
	<fieldset>
		<legend><?php echo Yii::t('app','filter'); ?></legend>
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'customer-filter'
		)); ?>
		<div class="row">
			<label>Tagihan Bulan</label>
			<select>
				<option>Desember 2010</option>
			</select>
		</div>
		<div class="row" id="service">
			<?php echo $form->labelEx($customerForm,'serviceIds');?>
			<?php echo $form->checkBoxList($customerForm,'serviceIds',$serviceList)?>
		</div>
		<?php $this->endWidget(); ?>
	</fieldset>
</div>

<div class="span-24">
	<?php $this->widget('zii.widgets.grid.CGridView',array(
		'id'=>'customer-list',
		'dataProvider'=>$dataProvider,
		'columns'=>array(
			array(
				'value'=>'$data->id',
				'type'=>'raw',
				'htmlOptions'=>array('style'=>'display:none;width:0%'),
				'headerHtmlOptions'=>array('style'=>'display:none;width:0%'),
			),
			array(
				'class' => 'NumberColumn'
				),
			'number',
			array(
				'header'=>Yii::t('app','Full Name'),
				'type'=>'raw',
				'value'=>'CHtml::link($data->user->fullname, array("detail"))',
			),
			array(
				'header'=>Yii::t('app','Services'),
				'value'=>'$data->selectedService'
			),
			array(
				'class'=>'CButtonColumn',
				'template'=>'{softDelete}{delete}',
				'buttons'=>array(
					'softDelete'=>array(
						'label'=>Yii::t("app","Soft Delete"),
						'url'=>'"#"',
						'click'=>'function(){ 
							$.fn.yiiGridView.update(\'customer-list\',{
								url:"'.Yii::app()->createUrl("customer/softDelete").'",
								data:{id:$(this).parent().parent().children(":first-child").text()},
								success: function(){
									$.fn.yiiGridView.update(\'customer-list\');
								}
							})
						}',
						'type'=>'raw',
					/*'options'=>array(
						'onclick'=>'softDel("'.$data->id.'")',
					),*/
					),
				),
			),
		/*array(
			'class'=>'CLinkColumn',
			'header'=>Yii::t("app","Soft Delete"),
			'labelExpression'=>'Yii::t("app","Soft Delete")',
			'urlExpression'=>'Yii::app()->createUrl("#")',
			'linkHtmlOptions'=>array('onclick'=>'softDelete(<?php echo $data->id ?>)'),
		),*/
		),
	))?>
</div>