<?php

class m110222_081135_add_parent_id_in_service extends CDbMigration
{
	public function up()
	{
		$this->addColumn('service','parent_id','integer');
		$this->addColumn('service','description','string');
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
			'description' => 'Paket TV 50 channel dan paket Internet up to 256kbps',
		));
		
		$this->insert('service',array(
			'parent_id' => 2,
			'name' => 'Mighty Net Personal',
			'price' => 380000,
			'description' => 'Paket TV 50 channel dan paket Internet up to 512kbps',
		));
		
		$this->insert('service',array(
			'parent_id' => 2,
			'name' => 'Mighty Net Pro',
			'price' => 775000,
			'description' => 'Paket TV 50 channel dan paket Internet up to 1024kbps',
		));
		
		$this->insert('service',array(
			'parent_id' => 2,
			'name' => 'Mighty Net Prepaid',
			'price' => 120000,
			'description' => 'Paket TV 50 channel dan paket Internet up to 256kbps',
		));
	}
	
	public function down()
	{
		$this->truncateTable('service');
		$this->dropColumn('service','parent_id');
		$this->dropColumn('service','description');
		$this->insert('service',array('id' => 1,'name' => 'Internet','price' => 100000));
		$this->insert('service',array('id' => 2,'name' => 'TV','price' => 80000));
	}
}
