<?php

class m110228_051553_insert_service_packages extends CDbMigration
{
	public function up()
	{
		$this->truncateTable('service_package');
		$this->truncateTable('service_package_has_service');
		
		$this->insert('service_package',array(
			'id' => 1,
			'name' => 'My TV (TV Only)',
			'note' => '50 TV Channel'
		));
		
		$this->insert('service_package',array(
			'id' => 2,
			'name' => 'Mighty Net Starter',
			'note' => 'Paket TV 50 channel dan paket Internet up to 256kbps',
		));
		$this->insert('service_package',array(
			'id' => 3,
			'name' => 'Mighty Net Personal',
			'note' => 'Paket TV 50 channel dan paket Internet up to 512kbps',
		));
		$this->insert('service_package',array(
			'id' => 4,
			'name' => 'Mighty Net Pro',
			'note' => 'Paket TV 50 channel dan paket Internet up to 1024kbps',
		));
		
		$this->insert('service_package',array(
			'id' => 5,
			'name' => 'Mighty Net Prepaid',
			'note' => 'Paket Internet  Prepaid up to 256kbps',
		));
		
		$this->insert('service_package_has_service',array(
			'service_package_id' => 1,
			'service_id' => 3,
		));
		
		$this->insert('service_package_has_service',array(
			'service_package_id' => 2,
			'service_id' => 4,
		));
		$this->insert('service_package_has_service',array(
			'service_package_id' => 2,
			'service_id' => 5,
		));
		
		
		$this->insert('service_package_has_service',array(
			'service_package_id' => 3,
			'service_id' => 4,
		));
		$this->insert('service_package_has_service',array(
			'service_package_id' => 3,
			'service_id' => 6,
		));
		
		
		$this->insert('service_package_has_service',array(
			'service_package_id' => 4,
			'service_id' => 4,
		));
		$this->insert('service_package_has_service',array(
			'service_package_id' => 4,
			'service_id' => 7,
		));
		
		$this->insert('service_package_has_service',array(
			'service_package_id' => 5,
			'service_id' => 8,
		));
		
	}

	public function down()
	{
		$this->truncateTable('service_package');
		$this->truncateTable('service_package_has_service');
	}
}
