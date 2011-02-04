<?php

class m110202_043806_create_table_apartment_and_compensation_schmema extends CDbMigration
{
	public function up()
	{
		$this->createTable('apartment',array(
			'id' => 'pk',
			'number' => 'string',
			'status' => 'integer NOT NULL',
		));
		$this->createTable('compensation_schema',array(
			'id' => 'pk',
			'uptime' => 'integer NOT NULL',
			'downtime' => 'integer NOT NULL',
			'percentdown' => 'integer NOT NULL',
			'percentup' => 'integer NOT NULL',
			'compensation' => 'double NOT NULL',
			'service_id' => 'integer NOT NULL',
		));
		$this->addColumn('customer','apartment_id','integer NOT NULL');
		
	}

	public function down()
	{
		$this->dropTable('compensation_schema');
		$this->dropTable('apartment');
		$this->droColumn('customer','apartment_id');
	}
}
