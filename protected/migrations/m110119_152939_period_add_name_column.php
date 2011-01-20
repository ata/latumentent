<?php

class m110119_152939_period_add_name_column extends CDbMigration
{
	public function up()
	{
		$this->addColumn('period', 'name', 'string');
	}

	public function down()
	{
		$this->dropColumn('period','name');
	}
	
}
