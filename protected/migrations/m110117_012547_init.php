<?php

class m110117_012547_init extends CDbMigration
{
	public function up()
	{
		$this->createTable('role',array(
			'id' => 'pk',
			'name' =>  'string NOT NULL',
			'display' => 'string NOT NULL',
		));
		
		$this->createTable('user',array(
			'id' => 'pk',
			'username' =>  'string NOT NULL',
			'password' => 'string NOT NULL',
			'email' => 'string NOT NULL',
			'role_id' => 'integer NOT NULL',
		));
		
		$this->createTable('customer',array(
			'id' => 'pk',
			'number' => 'string NOT NULL',
			'user_id' => 'integer NOt NULL',
		));
		
		$this->createTable('service',array(
			'id' => 'pk',
			'name' => 'string NOT NULL'
		));
		
		$this->createTable('period',array(
			'id' => 'pk',
			'month' => 'string NOT NULL',
			'year' => 'string NOT NULL',
			'raw_date' => 'date',
		));
		
		$this->createTable('invoice',array(
			'id' => 'pk',
			'total_amount' => 'double NOT NULL',
			'total_compensation' => 'double NOT NULL',
			'period_id' => 'integer NOT NULL',
			'customer_id' => 'integer NOT NULL',
		));
		
		$this->createTable('invoice_item',array(
			'id' => 'pk',
			'amount' => 'double NOT NULL',
			'subtotal_compensation' => 'double NOT NULL',
			'invoice_id' => 'integer NOT NULL',
			'period_id' => 'integer NOT NULL',
			'customer_id' => 'integer NOT NULL',
		));
		
		$this->createTable('ticket',array(
			'id' => 'pk',
			'title' => 'string NOT NULL',
			'body' => 'string NOT NULL',
			'status' => 'integer NOT NULL',
			'compensation' => 'double NOT NULL',
			'invoice_id' => 'integer NOT NULL',
			'invoice_item_id' => 'integer NOT NULL',
			'period_id' => 'integer NOT NULL',
			'customer_id' => 'integer NOT NULL',
			'technician_id' => 'integer NOT NULL',
			'author_id' => 'integer NOT NULL',
		));
		
		$this->createTable('customer_has_service',array(
			'customer_id' => 'integer NOT NULL',
			'service_id' => 'integer NOT NULL',
		));
		
		/*
		$this->createIndex('user_username','user','username',true);
		$this->createIndex('user_email','user','email',true);
		$this->addForeignKey('user_role_id','user','role_id','role','id');
		$this->addForeignKey('customer_user_id','customer','user_id','user','id');
		$this->addForeignKey('invoice_period_id','invoice','period_id','period','id');
		$this->addForeignKey('invoice_customer_id','invoice','customer_id','customer','id');
		$this->addForeignKey('invoice_item_invoice_id','invoice_item','invoice_id','invoice','id');
		$this->addForeignKey('invoice_item_period_id','invoice_item','period_id','period','id');
		$this->addForeignKey('invoice_item_customer_id','invoice_item','customer_id','customer','id');
		$this->addForeignKey('ticket_invoice_id','ticket','invoice_id','invoice','id');
		$this->addForeignKey('ticket_invoice_item_id','ticket','invoice_item_id','invoice_item','id');
		$this->addForeignKey('ticket_period_id','ticket','period_id','period','id');
		$this->addForeignKey('ticket_customer_id','ticket','customer_id','customer','id');
		$this->addForeignKey('ticket_technician_id','ticket','technician_id','user','id');
		$this->addForeignKey('ticket_author_id','ticket','author_id','user','id');
		$this->addForeignkey('customer_has_service_customer_id',
				'customer_has_service','customer_id','customer','id');
		$this->addForeignkey('customer_has_service_service_id',
				'customer_has_service','service_id','service','id');
		*/
		
	}

	
	public function down()
	{
		$this->dropTable('customer_has_service');
		$this->dropTable('ticket');
		$this->dropTable('invoice_item');
		$this->dropTable('invoice');
		$this->dropTable('period');
		$this->dropTable('service');
		$this->dropTable('customer');
		$this->dropTable('user');
		$this->dropTable('role');
	}
	
}
