<?php

return CMap::mergeArray(
	require(dirname(__FILE__).'/main.php'),
	array(
		'components'=>array(
			'db'=>array(
				'connectionString' => 'mysql:host=localhost;dbname=billing_dev',
				'emulatePrepare' => true,
				'username' => 'billing',
				'password' => 'billing',
				'charset' => 'utf8',
			),
			'log'=>array(
				'class'=>'CLogRouter',
				'routes'=>array(
					array(
						'class'=>'CFileLogRoute',
						'levels'=>'error, warning',
					),
					// uncomment the following to show log messages on web pages
					/*
					array(
						'class'=>'CWebLogRoute',
					),
					*/
					
				),
			),
			
		),
	)
);
