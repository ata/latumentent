<?php

class m110120_165041_insert_dummy_data extends CDbMigration
{
	public function up()
	{
		
		$this->truncateTable('user');
		// billing_test.customer
		$customer = array(
			array('id'=>1,'number'=>'001','user_id'=>2,'status'=>1),
			array('id'=>2,'number'=>'002','user_id'=>3,'status'=>1),
			array('id'=>3,'number'=>'003','user_id'=>4,'status'=>1)
		);

		// billing_test.customer_has_service
		$customer_has_service = array(
			array('customer_id'=>1,'service_id'=>1),
			array('customer_id'=>1,'service_id'=>2),
			array('customer_id'=>2,'service_id'=>1),
			array('customer_id'=>3,'service_id'=>1),
			array('customer_id'=>3,'service_id'=>2)
		);

		// billing_test.invoice
		$invoice = array(
			array('id'=>1,'total_amount'=>180000,'total_compensation'=>0,'period_id'=>1,'customer_id'=>1),
			array('id'=>2,'total_amount'=>100000,'total_compensation'=>0,'period_id'=>1,'customer_id'=>2),
			array('id'=>3,'total_amount'=>180000,'total_compensation'=>0,'period_id'=>1,'customer_id'=>3)
		);

		// billing_test.invoice_item
		$invoice_item = array(
			array('id'=>1,'amount'=>100000,'subtotal_compensation'=>0,'invoice_id'=>1,'period_id'=>1,'customer_id'=>1,'service_id'=>1),
			array('id'=>2,'amount'=>80000,'subtotal_compensation'=>0,'invoice_id'=>1,'period_id'=>1,'customer_id'=>1,'service_id'=>2),
			array('id'=>3,'amount'=>100000,'subtotal_compensation'=>0,'invoice_id'=>2,'period_id'=>1,'customer_id'=>2,'service_id'=>1),
			array('id'=>4,'amount'=>100000,'subtotal_compensation'=>0,'invoice_id'=>3,'period_id'=>1,'customer_id'=>3,'service_id'=>1),
			array('id'=>5,'amount'=>80000,'subtotal_compensation'=>0,'invoice_id'=>3,'period_id'=>1,'customer_id'=>3,'service_id'=>2)
		);

		// billing_test.period
		$period = array(
			array('id'=>1,'name'=>'January 2011')
		);

		// billing_test.user
		$user = array(
			array('id'=>1,'username'=>'admin','password'=>'ac43724f16e9241d990427ab7c8f4228','email'=>'admin@gmail.com','role_id'=>1,'status'=>1,'fullname'=>'Administrator'),
			array('id'=>2,'username'=>'customer1','password'=>'ac43724f16e9241d990427ab7c8f4228','email'=>'customer1@gmail.com','role_id'=>2,'status'=>1,'fullname'=>'Customer 1'),
			array('id'=>3,'username'=>'customer2','password'=>'ac43724f16e9241d990427ab7c8f4228','email'=>'customer2@gmail.com','role_id'=>2,'status'=>1,'fullname'=>'Customer 2'),
			array('id'=>4,'username'=>'customer3','password'=>'ac43724f16e9241d990427ab7c8f4228','email'=>'customer3@gmail.com','role_id'=>2,'status'=>1,'fullname'=>'Customer 3'),
			array('id'=>5,'username'=>'management1','password'=>'ac43724f16e9241d990427ab7c8f4228','email'=>'management1@gmail.com','role_id'=>3,'status'=>1,'fullname'=>'Management 1'),
			array('id'=>6,'username'=>'techincal_support1','password'=>'ac43724f16e9241d990427ab7c8f4228','email'=>'techincal_support1@gmail.com','role_id'=>4,'status'=>1,'fullname'=>'Technical Support 1'),
			array('id'=>7,'username'=>'customer_services1','password'=>'ac43724f16e9241d990427ab7c8f4228','email'=>'customer_services1@gmail.com','role_id'=>5,'status'=>1,'fullname'=>'Customer Service 1')
		);
		
		$all = compact('customer','customer_has_service','invoice','invoice_item','period','user');
		foreach ($all as $table => $rows) {
			foreach ($rows as $row) {
				$this->insert($table, $row);
			}
			
		}
		
	}
	public function down()
	{
		$all = array('customer','customer_has_service','invoice','invoice_item','period');
		foreach($all as $table) {
			$this->truncateTable($table);
		}
		
	}
}
