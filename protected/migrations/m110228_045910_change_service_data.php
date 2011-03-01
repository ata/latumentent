<?php

class m110228_045910_change_service_data extends CDbMigration
{
	public function up()
	{
		$this->truncateTable('service');
		$this->insert('service',array(
			'id' => 1,
			'name' => 'My TV',
			'price' => 0,
			'description' => 'Paket TV 50'
		));
		
		$this->insert('service',array(
			'id' => 3,
			'parent_id' => 1,
			'name' => 'TV Only',
			'price' => 170000 ,
			'description' => 'Paket TV 50 Channel'
		));
		
		$this->insert('service',array(
			'id' => 4,
			'parent_id' => 1,
			'name' => 'TV',
			'price' => 150000,
			'description' => 'Paket TV 50 Channel'
		));
		
		
		$this->insert('service',array(
			'id' => 2,
			'name' => 'Internet',
			'price' => 0,
			'description' => 'Paket TV dan Internet',
		));
		
		$this->insert('service',array(
			'parent_id' => 2,
			'name' => 'Mighty Net Starter',
			'price' => 120000,
			'description' => 'Internet up to 256kbps',
		));
		
		$this->insert('service',array(
			'parent_id' => 2,
			'name' => 'Mighty Net Personal',
			'price' => 230000,
			'description' => 'Internet up to 512kbps',
		));
		
		$this->insert('service',array(
			'parent_id' => 2,
			'name' => 'Mighty Net Pro',
			'price' => 625000,
			'description' => 'Internet up to 1024kbps',
		));
		
		$this->insert('service',array(
			'parent_id' => 2,
			'name' => 'Mighty Net Prepaid',
			'price' => 120000,
			'description' => 'Internet up to 256kbps',
		));
	}

	public function down()
	{
		$this->truncateTable('service');
		$this->insert('service',array(
			'id' => 1,
			'name' => 'TV (MyTV)',
			'price' => 170000,
			'description' => 'Paket TV 50 Channel'
		));
		$this->insert('service',array(
			'id' => 2,
			'name' => 'Mighty Net',
			'price' => 0,
			'description' => 'Paket TV dan Internet',
		));
		$this->insert('service',array(
			'parent_id' => 2,
			'name' => 'Mighty Net Starter',
			'price' => 270000,
			'description' => 'Internet up to 256kbps',
		));
		
		$this->insert('service',array(
			'parent_id' => 2,
			'name' => 'Mighty Net Personal',
			'price' => 380000,
			'description' => 'Internet up to 512kbps',
		));
		
		$this->insert('service',array(
			'parent_id' => 2,
			'name' => 'Mighty Net Pro',
			'price' => 775000,
			'description' => 'Internet up to 1024kbps',
		));
		
		$this->insert('service',array(
			'parent_id' => 2,
			'name' => 'Mighty Net Prepaid',
			'price' => 120000,
			'description' => 'Internet up to 256kbps',
		));
	}
}
