<?php

class m110117_025939_init_data extends CDbMigration
{
	public function up()
	{
		$this->insert('role',array(
			'id' => 1,
			'name' => 'admin',
			'display' => 'Administrator',
		));
		
		$this->insert('role',array(
			'id' => 2,
			'name' => 'customer',
			'display' => 'Customer',
		));
		
		$this->insert('role',array(
			'id' => 3,
			'name' => 'management',
			'display' => 'Management',
		));
		
		$this->insert('role',array(
			'id' => 4,
			'name' => 'technical_support',
			'display' => 'Technical Support',
		));
		
		$this->insert('role',array(
			'id' => 5,
			'name' => 'customer_services',
			'display' => 'Customer Services',
		));
		
		$this->insert('user',array(
			'id' => 1,
			'username' => 'admin',
			'password' => md5('rahasia'),
			'email' => 'admin@gmail.com',
			'role_id' => 1,
		));
		
		
		// Initial datafor Service
		$this->insert('service',array(
			'name' => 'Internet',
		));
		$this->insert('service',array(
			'name' => 'TV',
		));
		
	}

	public function down()
	{
		$this->truncateTable('service');
		$this->truncateTable('user');
		$this->truncateTable('role');
	}
}
