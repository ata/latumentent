<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body id="<?php echo $this->htmlId?>-page">

<div id="headersite">
	<div class="container">
		<div id="app-name" class="floatLeft"><h2><?php echo CHtml::link(Yii::app()->name,array('/'))?></h2></div>
		<div id="login-status" class="floatRight">
			<?php 
			$this->widget('zii.widgets.CMenu', array(
			'items'=>array(
				//array('label'=>Yii::t('app','Dashboard'), 'url'=>array('site/dashboard'), 'visible'=> !Yii::app()->user->isGuest && Yii::app()->user->role !== 'admin'),
				//array('label'=>Yii::t('app','Apartment'), 'url'=>array('apartment/index'), 'visible'=> !Yii::app()->user->isGuest && Yii::app()->user->role !== 'customer'),
				//array('label'=>Yii::t('app','Cost'), 'url'=>array('cost/index'), 'visible'=> !Yii::app()->user->isGuest && Yii::app()->user->role !== 'customer'),
				//array('label'=>Yii::t('app','Ticket'), 'url'=>array('ticket/index'), 'visible'=> !Yii::app()->user->isGuest),
				//array('label'=>Yii::t('app','Customer'), 'url'=>array('customer/index'), 'visible'=> !Yii::app()->user->isGuest && Yii::app()->user->role !== 'customer'),
				//array('label'=>Yii::t('app','Invoice'), 'url'=>array('invoice/index'), 'visible'=> !Yii::app()->user->isGuest && Yii::app()->user->role !== 'customer'),
				//array('label'=>Yii::t('app','Administration'), 'url'=>array('admin/service'), 'visible'=> Yii::app()->user->role === 'admin'),
				array('label'=>Yii::t('app','Login'), 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>Yii::t('app','Logout ({name})',array('{name}'=>Yii::app()->user->fullname)), 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			)));
			?>
		</div>
		<div class="clear"></div>
	</div>
</div>
<div id="top-menu">
	<div class="container">
		<div id="top-navigation">
			<?php 
			$this->widget('zii.widgets.CMenu', array(
			'items'=>array(
				array('label'=>Yii::t('app','Dashboard'), 'url'=>array('site/dashboard'), 'visible'=> !Yii::app()->user->isGuest && Yii::app()->user->role !== 'admin'),
				array('label'=>Yii::t('app','Apartment'), 'url'=>array('apartment/index'), 'visible'=> !Yii::app()->user->isGuest && Yii::app()->user->role !== 'customer'),
				array('label'=>Yii::t('app','Cost'), 'url'=>array('cost/index'), 'visible'=> !Yii::app()->user->isGuest && Yii::app()->user->role !== 'customer'),
				array('label'=>Yii::t('app','Ticket'), 'url'=>array('ticket/index'), 'visible'=> !Yii::app()->user->isGuest),
				array('label'=>Yii::t('app','Customer'), 'url'=>array('customer/index'), 'visible'=> !Yii::app()->user->isGuest && Yii::app()->user->role !== 'customer'),
				array('label'=>Yii::t('app','Invoice'), 'url'=>array('invoice/index'), 'visible'=> !Yii::app()->user->isGuest && Yii::app()->user->role !== 'customer'),
				array('label'=>Yii::t('app','Administration'), 'url'=>array('admin/service'), 'visible'=> Yii::app()->user->role === 'admin'),
				//array('label'=>Yii::t('app','Login'), 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				//array('label'=>Yii::t('app','Logout ({name})',array('{name}'=>Yii::app()->user->fullname)), 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			)));
			?>
			<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=> Yii::t('app','Home'), 'url'=>array('/site/index')),
				array('label'=> Yii::t('app','Tentang'), 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=> Yii::t('app','Product'), 'url'=>array('/site/page', 'view'=>'product')),
				array('label'=> Yii::t('app','Contact'), 'url'=>array('/site/contact',), 'linkOptions' => array('class' => 'last')),
			),
		)); ?>
		</div>
	</div>
</div>	
<div id="bodysite">
	<div class="container">
		<?php echo $content; ?>
	</div>
</div>
<div id="footbar">
	<div class="container">
		<div class="span-6">
			<h3>Interior</h3>
			<ul>
				<li>Interior Design</li>
				<li>Free Interior Design</li>
				<li>Interior Design</li>
				<li>Free Interior Design</li>
				<li>Interior Design</li>
				<li>Free Interior Design</li>
			</ul>
		</div>
		<div class="span-6">
			<h3>Furniture</h3>
			<ul>
				<li>Wooden Furniture</li>
				<li>Plastic Furniture</li>
				<li>Wooden Furniture</li>
				<li>Plastic Furniture</li>
				<li>Wooden Furniture</li>
				<li>Plastic Furniture</li>
			</ul>
		</div>
		<div class="span-6">
			<h3>Wallpaper</h3>
			<ul>
				<li>Kids Wallpaper</li>
				<li>Nature Wallpaper</li>
				<li>Kids Wallpaper</li>
				<li>Nature Wallpaper</li>
				<li>Kids Wallpaper</li>
				<li>Nature Wallpaper</li>
			</ul>
		</div>
		<div class="span-6 last">
			<h3>Property</h3>
			<ul>
				<li>New Property</li>
				<li>Used Property</li>
				<li>New Property</li>
				<li>Used Property</li>
				<li>New Property</li>
				<li>Used Property</li>
			</ul>
		</div>
	</div>
</div>

<div id="footersite">
	<div class="container">
		<div class="floatLeft">
			Copyright &copy; <?php echo date('Y'); ?> by <a href="http://nevisa.web.id">Nevisa IT Solution</a>.
			All Rights Reserved.
		</div>
		<div class="floatRight">
			<?php echo Yii::powered(); ?>
		</div>
		<div class="clear"></div>
	</div>
</div>
</body>
</html>
