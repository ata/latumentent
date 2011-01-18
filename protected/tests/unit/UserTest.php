<?php

class UserTest extends CDbTestCase
{
	public $fixtures=array(
		'users'=>'User',
	);

	public function testCreate()
	{
		
	}
	
	public function testDeleteSoft()
	{
		$countBeforeDelete = count(User::model()->findAllActive());
		User::model()->find()->softDelete();
		$countAfterDelete = count(User::model()->findAllActive());
		$this->assertEquals($countBeforeDelete -1, $countAfterDelete);
	}
}
