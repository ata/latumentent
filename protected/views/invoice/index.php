<?php Yii::app()->clientScript->registerScript('invoice-filter','
	(function($){
		var update_invoice_list = function(){
			$("#invoice-grid").yiiGridView.update("invoice-grid",{
				url:$(this).attr("action"),
				data:$("#invoice-filter").serialize(),
			});
		}
		$("#invoice-filter select").change(update_invoice_list);
		$("#invoice-filter input[type=checkbox]").click(update_invoice_list);
	})(jQuery)
')
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','Invoices')=>array('index'),
);?>


<div>
	<h2><?php echo Yii::t('app','Invoices'); ?></h2>
</div>

<div class="span-8 new-button">
	<?php echo CHtml::link(Yii::t('app','Add New Customer'), array('customer/create'));?>
</div>

<div class="filter span-16 last form" id="customer-filter">
	<fieldset>
		<legend><?php echo Yii::t('app','filter'); ?></legend>
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'invoice-filter'
		)); ?>
		<div class="row">
			<?php echo $form->labelEx($invoice,'period_id');?>
			<?php echo $form->dropDownList($invoice,'period_id',$periodList,array(
				'empty'=>Yii::t('app','All'),
			));?>
		</div>
		<div class="row checkbox">
			<?php echo $form->label($invoice,'serviceIds');?>
			<?php echo $form->checkBoxList($invoice,'serviceIds',$serviceList,array('separator'=>''))?>
		</div>
		<?php $this->endWidget(); ?>
	</fieldset>
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
				'header' => Yii::t('app','Services'),
			),
			array(
				'name' => 'statusDisplay',
				'header' => Yii::t('app','Status'),
				'type' => 'raw',
			),
			array(
				'header' => Yii::t('app','Detail'),
				'type' => 'raw',
				'value' => 'CHtml::link(Yii::t("app","Detail"),array("view","id" => $data->id))',
			),
		),
	)); ?>
</div>

<div class="span-24 bills">
	<table>
		<thead>
			
			<tr>
				<th class="title"><?php echo Yii::t('app','Total Bills have Paid')?></th>
				<th class="ar value"><?php echo $invoice->totalPaidBillsLocale ?></th>
			</tr>
			
			<tr>
				<th class="title"><?php echo Yii::t('app','Total Paid Bills have\'t Paid')?></th>
				<th class="ar value"><?php echo $invoice->totalNotPaidBillsLocale ?></th>
			</tr>
			
			<tr>
				<th class="title"><?php echo Yii::t('app','Total Bills')?></th>
				<th class="ar value"><?php echo $invoice->totalBillsLocale ?></th>
			</tr>
		</thead>
	</table>
</div>

<div class="span-24 form" id="info">
	<form>
		<fieldset>
			<legend>Info</legend>
			<div>
				<p>Untuk melihat detail pembayaran tiap customer, dapat meng-klik tabel row di atas.</p>
			</div>
		</fieldset>
	</form>
</div>
