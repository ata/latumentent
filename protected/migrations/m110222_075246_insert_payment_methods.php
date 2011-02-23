<?php

class m110222_075246_insert_payment_methods extends CDbMigration
{
	public function up()
	{
		$this->truncateTable('payment_method');
		$this->insert('payment_method',array('name' => 'Cash'));
		$this->insert('payment_method',array('name' => 'Debit Card BCA'));
		$this->insert('payment_method',array('name' => 'Debit Card Mandiri'));
		$this->insert('payment_method',array('name' => 'Debit Card Visa'));
		$this->insert('payment_method',array('name' => 'Debit Card Mastercard'));
	}

	public function down()
	{
		
	}
}
