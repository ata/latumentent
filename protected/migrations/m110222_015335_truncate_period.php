<?php

class m110222_015335_truncate_period extends CDbMigration
{
	public function up()
	{
		$this->truncateTable('period');
		$this->truncateTable('invoice');
		$this->truncateTable('invoice_item');
		
	}

	public function down()
	{
		
		$this->insert('period',array('id' => 1, 'name' => 'Januari 2011'));
		
		$invoices = array(
			array('id'=>1,'total_amount'=>180000,'total_compensation'=>0,'period_id'=>1,'customer_id'=>1),
			array('id'=>2,'total_amount'=>100000,'total_compensation'=>0,'period_id'=>1,'customer_id'=>2),
			array('id'=>3,'total_amount'=>180000,'total_compensation'=>0,'period_id'=>1,'customer_id'=>3)
		);
		
		foreach ($invoices as $invoice) {
			$this->insert('invoice',$invoice);
		}

		$invoice_items = array(
			array('id'=>1,'amount'=>100000,'subtotal_compensation'=>0,'invoice_id'=>1,'period_id'=>1,'customer_id'=>1,'service_id'=>1),
			array('id'=>2,'amount'=>80000,'subtotal_compensation'=>0,'invoice_id'=>1,'period_id'=>1,'customer_id'=>1,'service_id'=>2),
			array('id'=>3,'amount'=>100000,'subtotal_compensation'=>0,'invoice_id'=>2,'period_id'=>1,'customer_id'=>2,'service_id'=>1),
			array('id'=>4,'amount'=>100000,'subtotal_compensation'=>0,'invoice_id'=>3,'period_id'=>1,'customer_id'=>3,'service_id'=>1),
			array('id'=>5,'amount'=>80000,'subtotal_compensation'=>0,'invoice_id'=>3,'period_id'=>1,'customer_id'=>3,'service_id'=>2)
		);
		
		foreach ($invoice_items as $invoice_item) {
			$this->insert('invoice_item',$invoice_item);
		}
	}
}
