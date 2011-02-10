<?php

class m110210_082420_generate_statistic extends CDbMigration
{
	public function up()
	{
		$this->addColumn('cost','name','string');
		$this->addColumn('revenue','name','string');
		
		Period::model()->open('Februari 2011');
		Period::model()->open('Maret 2011');
		Period::model()->open('April 2011');
		Period::model()->open('Mei 2011');
		Period::model()->open('Juni 2011');
		Period::model()->open('Juli 2011');
	}

	public function down()
	{
		$this->dropColumn('cost','name');
		$this->dropColumn('revenue','name');
		
		$this->truncateTable('statistic_arpu');
		$this->truncateTable('statistic_client');
		$this->truncateTable('statistic_cost_client');
		$this->truncateTable('revenue');
		$this->truncateTable('cost');
		Period::model()->deleteAll('id!=1');
	}
}
