<?php

class m110207_043137_add_cost_columns extends CDbMigration
{
	public function up()
	{
		$this->addColumn('cost','customer_id','integer');
		$this->addColumn('cost','note','text');
	}

	public function down()
	{
		$this->dropColumn('cost','customer_id');
		$this->dropColumn('cost','note');
	}
}
