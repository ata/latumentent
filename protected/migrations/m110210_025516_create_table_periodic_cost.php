<?php

class m110210_025516_create_table_periodic_cost extends CDbMigration
{
	public function up()
	{
		$this->createTable('periodic_cost',array(
			'id' => 'pk',
			'name' => 'string NOT NULL',
			'amount' => 'double NOT NULL',
			'note' => 'text',
		));
	}

	public function down()
	{
		$this->dropTable('periodic_cost');
	}
}
