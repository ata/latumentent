<?php Yii::app()->clientScript->registerScript('customer-filter-js','
	function showValues(){
		var str = $(\'#customer-filter-form\').serialize();
		$(\'#customer-list\').yiiGridView.update(\'customer-list\',{
			url:$(this).attr(\'action\'),
			data:str,
		});
	};
	$(\'#customer-filter-form\').click(showValues);
');?>
<div class="span-8 new-button">
	<?php echo CHtml::link(Yii::t('app','Add New Customer'), array('customer/create'));?>
</div>

<div class="filter span-16 last form" id="customer-filter">
	<fieldset>
		<legend><?php echo Yii::t('app','filter'); ?></legend>
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'customer-filter-form'
		)); ?>
		<div class="row checkbox" id="service">
			<?php echo $form->labelEx($customerFilter,'serviceIds');?>
			<?php echo $form->checkBoxList($customerFilter,'serviceIds',$serviceList,array('separator'=>''))?>
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
				'header'=>Yii::t('app','Apartment Ownership'),
				'value'=>'($data->ownership==="1")? CHtml::encode(Yii::t("app","Owner")) : 
					CHtml::encode(Yii::t("app","Hire Up To"))." ".$data->hire_up_to',
			),
			array(
				'class'=>'CButtonColumn',
				'template'=>'{softDelete}{update}{resetPassword}',
				'buttons'=>array(
					'softDelete'=>array(
						'label'=>Yii::t('app','Soft Delete'),
						'url'=>'"#"',
						'imageUrl'=>Yii::app()->request->baseUrl.'/images/delete.png',
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
					'resetPassword'=>array(
						'label'=>Yii::t('app','Reset Password'),
						'url'=>'Yii::app()->createUrl("/customer/resetPassword",array("id"=>$data->id))',
						'imageUrl'=>Yii::app()->request->baseUrl.'/images/key.png',
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