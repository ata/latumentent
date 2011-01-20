<?php $this->beginContent('//layouts/main'); ?>
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
					array('label'=>Yii::t('app','Service'), 'url'=>array('admin/service')),
					array('label'=>Yii::t('app','Role'), 'url'=>array('admin/role')),
					array('label'=>Yii::t('app','User'), 'url'=>array('admin/user')),
					array('label'=>Yii::t('app','Customer'), 'url'=>array('admin/customer')),
					array('label'=>Yii::t('app','Period'), 'url'=>array('admin/period')),
					array('label'=>Yii::t('app','Ticket'), 'url'=>array('admin/ticket')),
					array('label'=>Yii::t('app','Invoice'), 'url'=>array('admin/invoice')),
					array('label'=>Yii::t('app','Invoice Item'), 'url'=>array('admin/invoiceItem')),
					
				),
				'htmlOptions'=>array('class'=>'operations'),
			));
			$this->endWidget();
			?>
			
			<?php
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'Operations',
			));
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				'htmlOptions'=>array('class'=>'operations'),
			));
			$this->endWidget();
			?>
		</div><!-- sidebar -->
	</div>
</div>
<?php $this->endContent(); ?>
