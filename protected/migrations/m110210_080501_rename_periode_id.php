<?php

class m110210_080501_rename_periode_id extends CDbMigration
{
	public function up()
	{
		$this->renameColumn('statistic_arpu','periode_id','period_id');
		$this->renameColumn('statistic_client','periode_id','period_id');
		$this->renameColumn('statistic_cost_client','periode_id','period_id');
	}

	public function down()
	{
		$this->renameColumn('statistic_arpu','period_id','periode_id');
		$this->renameColumn('statistic_client','period_id','periode_id');
		$this->renameColumn('statistic_cost_client','period_id','periode_id');
	}
}
