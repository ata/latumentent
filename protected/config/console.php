<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Billing Apartement',
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),
	// application components
	'components'=>array(
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=billing_dev',
			'emulatePrepare' => true,
			'username' => 'billing',
			'password' => 'billing',
			'charset' => 'utf8',
		),
		
	),
);
