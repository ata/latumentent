<?php

class m110210_192155_periodic_cost_insert extends CDbMigration
{
	public function up()
	{
		$this->addColumn('periodic_cost','service_id','integer');
		$this->insert('periodic_cost',array(
			'id' => 1,
			'name' => 'Biaya Internet',
			'amount' => 2000000,
			'service_id' => 1,
		));
		
		$this->insert('periodic_cost',array(
			'id' => 2,
			'name' => 'Biaya TV Digital',
			'amount' => 1500000,
			'service_id' => 2,
		));
	}

	public function down()
	{
		$this->truncateTable('periodic_cost');
		$this->dropColumn('periodic_cost','service_id');
	}
}
