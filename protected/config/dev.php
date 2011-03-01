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
			
		),
	)
);
