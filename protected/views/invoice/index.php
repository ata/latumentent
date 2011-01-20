<?php
$this->breadcrumbs=array(
	Yii::t('app','Invoices')=>array('index'),
);?>

<h2><?php echo Yii::t('app','Invoices'); ?></h2>

<div class="span-8">
	<?php echo CHtml::link(Yii::t('app','Add New Customer'), array('customer/create'));?>
</div>

<div class="filter span-16 last form" id="customer-filter">
	<form>
		<fieldset>
			<legend><?php echo Yii::t('app','filter'); ?></legend>
			<div class="row">
				<label><?php echo Yii::t('app','Period'); ?></label>
				<?php echo CHtml::activeDropDownList($invoice, 'period_id', $periodList); ?>
			</div>
			<div class="row">
				<label><?php echo Yii::t('app','Service'); ?></label>
				<?php echo CHtml::activeCheckBoxList($invoice, 'serviceIds', $serviceList, array('separator' => '')); ?>
			</div>
		</fieldset>
	</form>
</div>

<div class="span-24">
	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'invoice-grid',
		'dataProvider'=>$invoice->search(),
		'columns'=>array(
			array(
				'class' => 'NumberColumn'
			),
			array(
				'name' => 'customer.user.fullname',
				'header' => Yii::t('app','Customer'),
			),
			array(
				'name' => 'totalAmountLocale',
				'header' => Yii::t('app','Total Bill'),
				'htmlOptions' => array('class' => 'ar'),
			),
			array(
				'name' => 'totalCompensationLocale',
				'header' => Yii::t('app','Total Compensation'),
				'htmlOptions' => array('class' => 'ar'),
			),
			array(
				'name' => 'rawServices',
				'header' => 'Services',
			),
			array(
				'header' => 'action',
				'type' => 'raw',
				'value' => 'CHtml::link(Yii::t("app","Detail"),array("view","id" => $data->id))',
			),
		),
	)); ?>
</div>
