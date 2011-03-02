<?php

class m110301_070032_add_column_registed_date extends CDbMigration
{
	public function up()
	{
		$this->addColumn('customer','registered_date','date');
	}

	public function down()
	{
		$this->dropColumn('customer','registered_date');
	}
}
