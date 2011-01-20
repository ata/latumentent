<?php

class PeriodTest extends CDbTestCase
{
	public $fixtures=array(
		'periods'=>'Period',
		'users' => 'User',
		'customers' => 'Customer',
	);
	
	
	public function testCreate()
	{
		
	}
	
	public function testAddPeriod()
	{
		Period::model()->addPeriod();
		$period = Period::model()->find(array('order' => 'id DESC'));
		$this->assertNotNull($period);
		$this->assertEquals($period->name, date('F Y'));
	}
	
	
	public function testGenerateInvoices()
	{
		$period = Period::model()->addPeriod();
		$period->generateInvoices();
		$active_customers = Customer::model()->findAllActive();
		$invoices = Invoice::model()->findAllByAttributes(array('period_id' => $period->id));
		$this->assertEquals(count($active_customers), count($invoices));
		
	}
	
}
