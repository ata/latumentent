<?php $this->beginContent('//layouts/main'); ?>
<?php /*
-<div id="header" class="span-24">
	<div id="logo" class="floatLeft">[LOGO]</div>
	<div id="mainmenu" class="floatRight">-->
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				//array('label'=> Yii::t('app','Home'), 'url'=>array('/site/index')),
				//array('label'=> Yii::t('app','Tentang'), 'url'=>array('/site/page', 'view'=>'about')),
				//array('label'=> Yii::t('app','Product'), 'url'=>array('/site/page', 'view'=>'product')),
				//array('label'=> Yii::t('app','Contact'), 'url'=>array('/site/contact',), 'linkOptions' => array('class' => 'last')),
			),
		)); ?>
	</div><!-- mainmenu -->
	<div class="clear"></div>
</div><!-- header -->
<?php /*
<div class="span-24">
	<?php $this->widget('zii.widgets.CBreadcrumbs', array(
		'links'=>$this->breadcrumbs,
	)); ?><!-- breadcrumbs -->
</div>
*/?>

<div id="content" class="span-24 last">
	<?php echo $content; ?>
</div><!-- content -->
<?php $this->endContent(); ?>
