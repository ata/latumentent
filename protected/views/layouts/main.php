<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body id="<?php echo $this->htmlId?>-page">

<div id="headersite">
	<div class="container">
		<div id="app-name" class="floatLeft"><h2><?php echo CHtml::link(Yii::app()->name,array('/'))?></h2></div>
		<div id="top-menu" class="floatRight">
			<?php 
			$this->widget('zii.widgets.CMenu', array(
			'items'=>array(
				array('label'=>Yii::t('app','Home'), 'url'=>array('/')),
				array('label'=>Yii::t('app','Administration'), 'url'=>array('admin/service')),
				array('label'=>Yii::t('app','Login'), 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>Yii::t('app','Logout ({name})',array('{name}'=>Yii::app()->user->fullname)), 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			)));
			?>
		</div>
		<div class="clear"></div>
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
			<h3>Menu Lorem</h3>
			<ul>
				<li>Lorem Ipsum dolor sit amet</li>
				<li>Lorem Ipsum dolor sit amet,</li>
				<li>Lorem Ipsum dolor sit amet</li>
				<li>Lorem Ipsum dolor sit amet</li>
				<li>Lorem Ipsum dolor sit amet</li>
				<li>Lorem Ipsum dolor sit amet</li>
			</ul>
		</div>
		<div class="span-6">
			<h3>Menu Lorem</h3>
			<ul>
				<li>Lorem Ipsum dolor sit amet</li>
				<li>Lorem Ipsum dolor sit amet,</li>
				<li>Lorem Ipsum dolor sit amet</li>
				<li>Lorem Ipsum dolor sit amet</li>
				<li>Lorem Ipsum dolor sit amet</li>
				<li>Lorem Ipsum dolor sit amet</li>
			</ul>
		</div>
		<div class="span-6">
			<h3>Menu Lorem</h3>
			<ul>
				<li>Lorem Ipsum dolor sit amet</li>
				<li>Lorem Ipsum dolor sit amet,</li>
				<li>Lorem Ipsum dolor sit amet</li>
				<li>Lorem Ipsum dolor sit amet</li>
				<li>Lorem Ipsum dolor sit amet</li>
				<li>Lorem Ipsum dolor sit amet</li>
			</ul>
		</div>
		<div class="span-6 last">
			<h3>Menu Lorem</h3>
			<ul>
				<li>Lorem Ipsum dolor sit amet</li>
				<li>Lorem Ipsum dolor sit amet,</li>
				<li>Lorem Ipsum dolor sit amet</li>
				<li>Lorem Ipsum dolor sit amet</li>
				<li>Lorem Ipsum dolor sit amet</li>
				<li>Lorem Ipsum dolor sit amet</li>
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
