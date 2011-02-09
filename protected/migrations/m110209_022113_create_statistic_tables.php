<?php

class m110209_022113_create_statistic_tables extends CDbMigration
{
	public function up()
	{
		$this->createTable('statistic_arpu',array(
			'id' => 'pk',
			'periode_id' => 'integer NOT NULL',
			'value' => 'double NOT NULL',
		));
		$this->createTable('statistic_client',array(
			'id' => 'pk',
			'periode_id' => 'integer NOT NULL',
			'value' => 'double NOT NULL',
		));
		$this->createTable('statistic_cost_client',array(
			'id' => 'pk',
			'periode_id' => 'integer NOT NULL',
			'value' => 'double NOT NULL',
		));
	}

	public function down()
	{
		$this->dropTable('statistic_cost_client');
		$this->dropTable('statistic_client');
		$this->dropTable('statistic_arpu');
	}
}
