<?php

class m110228_032515_add_table_service_package extends CDbMigration
{
	public function up()
	{
		$this->createTable('service_package',array(
			'id' => 'pk',
			'name' => 'string',
			'note' => 'string',
		));
		$this->createTable('service_package_has_service',array(
			'service_id' => 'integer NOT NULL',
			'service_package_id' => 'integer NOT NULL',
		));
	}

	public function down()
	{
		$this->dropTable('service_package');
		$this->dropTable('service_package_has_service');
	}
}
