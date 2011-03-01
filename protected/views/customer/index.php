<?php Yii::app()->clientScript->registerScript('customer-filter','
(function($){
	var update_customer_list = function(){
		$("#ticket-list").yiiGridView.update("customer-list",{
			url: $(this).attr("action"),
			data: $("#customer-filter").serialize(),
		});
	}
	$("#customer-filter input[type=checkbox]").click(update_customer_list);
	$("#customer-filter select").change(update_customer_list);
})(jQuery)');?>

<div class="title">
	<h2><?php echo Yii::t('app','List Customer'); ?></h2>
</div>

<div class="span-8 new-button">
	<?php echo CHtml::link(Yii::t('app','Add New Customer'), array('customer/create'));?>
</div>

<div class="filter span-16 last form">
	<fieldset>
		<legend><?php echo Yii::t('app','filter'); ?></legend>
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'customer-filter'
		)); ?>
		
		<div class="row select">
			<?php echo $form->label($customer, 'ownership') ?>
			<?php echo $form->dropDownList($customer, 'ownership',array(
				Customer::OWNERSHIP_OWNER => Yii::t('app','Owner'),
				Customer::OWNERSHIP_RENTER => Yii::t('app','Renter'),
			),array('empty' => Yii::t('app','All')));?>
		</div>
		
		<div class="row select">
			<?php echo $form->label($customer, 'service_package_id') ?>
			<?php echo $form->dropDownList($customer,'service_package_id',$servicePackageList, array('empty' => Yii::t('app','All')));?>
		</div>
		
		<?php /*
		<div class="row checkbox" id="service">
			<?php echo $form->label($customer,'serviceIds');?>
			<?php echo $form->checkBoxList($customer,'serviceIds',$serviceList,array('separator'=>''))?>
		</div>
		*/?>
		
		<?php $this->endWidget(); ?>
	</fieldset>
</div>

<div class="span-24">
	<?php $this->widget('zii.widgets.grid.CGridView',array(
		'id'=>'customer-list',
		'dataProvider'=>$customer->search(),
		'columns'=>array(
			array(
				'name'=>'id',
				'htmlOptions'=>array('style'=>'width:0px;display:none'),
				'headerHtmlOptions'=>array('style'=>'width:0px;display:none'),
			),
			array(
				'class' => 'NumberColumn'
			),
			array(
				'name' => 'apartment_id',
				'header' => 'Apartment Number',
				'value' => '$data->apartment->number',
			),
			array(
				'name' => 'user',
				'header'=>Yii::t('app','Full Name'),
				'value'=>'$data->user->fullname',
			),
			/*
			array(
				'header'=>Yii::t('app','Services'),
				'value'=>'$data->rawServices'
			),
			*/
			array(
				'header'=>Yii::t('app','Service Package'),
				'name' => 'servicePackage.name',
			),
			
			array(
				'name' => 'ownership',
				'header'=>Yii::t('app','Apartment Ownership'),
				'value'=>'$data->displayOwnership',
			),
			'rating',
			array(
				'class'=>'CButtonColumn',
				'template'=>'{softDelete} {update} {resetPassword}',
				'buttons'=>array(
					'softDelete'=>array(
						'label'=>Yii::t('app','Soft Delete'),
						'url'=>'"#"',
						'imageUrl'=>Yii::app()->request->baseUrl.'/images/delete.png',
						'click'=>'function(){ 
							$.fn.yiiGridView.update("customer-list",{
								url:"'.Yii::app()->createUrl("customer/softDelete").'",
								data:{id:$(this).parent().parent().children(":first-child").text()},
								success: function(){
									$.fn.yiiGridView.update("customer-list");
								}
							})
						}',
						'type'=>'raw',
					),
					'resetPassword'=>array(
						'label'=>Yii::t('app','Reset Password'),
						'url'=>'Yii::app()->createUrl("/customer/resetPassword",array("id"=>$data->id))',
						'imageUrl'=>Yii::app()->request->baseUrl.'/images/key.png',
					),
				),
			),
		),
	))?>
</div>
