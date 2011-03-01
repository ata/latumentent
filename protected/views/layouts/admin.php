<?php $this->beginContent('//layouts/main'); ?>
<div id="bodysite">
	<div id="content">
		<div class="container">
			<div class="span-19">
				<div id="content">
					<?php echo $content; ?>
				</div><!-- content -->
			</div>
			<div class="span-5 last">
				<div id="sidebar">
					<?php
					$this->beginWidget('zii.widgets.CPortlet', array(
						'title'=>'Admin Menu',
						
					));
					$this->widget('zii.widgets.CMenu', array(
						'items'=>array(
							array('label'=>Yii::t('app','Period'), 'url'=>array('admin/period')),
							//array('label'=>Yii::t('app','Apartment'), 'url'=>array('admin/apartment')),
							//array('label'=>Yii::t('app','Compensation Schema'), 'url'=>array('admin/compensationSchema')),
							//array('label'=>Yii::t('app','Cost'), 'url'=>array('admin/cost')),
							//array('label'=>Yii::t('app','Customer'), 'url'=>array('admin/customer')),
							//array('label'=>Yii::t('app','Invoice'), 'url'=>array('admin/invoice')),
							//array('label'=>Yii::t('app','Invoice Item'), 'url'=>array('admin/invoiceItem')),
							array('label'=>Yii::t('app','Problem Type'), 'url'=>array('admin/problemType')),
							array('label'=>Yii::t('app','Payment Method'), 'url'=>array('admin/paymentMethod')),
							//array('label'=>Yii::t('app','Revenue'), 'url'=>array('admin/revenue')),
							array('label'=>Yii::t('app','Periodic Cost'), 'url'=>array('admin/periodicCost')),
							array('label'=>Yii::t('app','Service'), 'url'=>array('admin/service')),
							array('label'=>Yii::t('app','Service Package'), 'url'=>array('admin/servicePackage')),
							array('label'=>Yii::t('app','Setting'), 'url'=>array('admin/setting')),
							//array('label'=>Yii::t('app','Ticket'), 'url'=>array('admin/ticket')),
							//array('label'=>Yii::t('app','Ticket Reply'), 'url'=>array('admin/ticketReply')),
							array('label'=>Yii::t('app','User'), 'url'=>array('admin/user')),
							array('label'=>Yii::t('app','Role'), 'url'=>array('admin/role')),
						),
						'htmlOptions'=>array('class'=>'operations'),
					));
					$this->endWidget();
					?>
					
					<?php
					/*
					$this->beginWidget('zii.widgets.CPortlet', array(
						'title'=>'Operations',
					));
					$this->widget('zii.widgets.CMenu', array(
						'items'=>$this->menu,
						'htmlOptions'=>array('class'=>'operations'),
					));
					$this->endWidget();
					*/
					?>
				</div><!-- sidebar -->
			</div>
		</div>
	</div>
</div>
<?php $this->endContent(); ?>
