<?php

class CustomerTest extends CDbTestCase
{
	public $fixtures=array(
		'customers'=>'Customer',
	);

	public function testCreate()
	{

	}
	
	public function testDeleteSoft()
	{
		$countBeforeDelete = count(Customer::model()->findAllActive());
		Customer::model()->find()->softDelete();
		$countAfterDelete = count(Customer::model()->findAllActive());
		$this->assertEquals($countBeforeDelete -1, $countAfterDelete);
	}
	
}
