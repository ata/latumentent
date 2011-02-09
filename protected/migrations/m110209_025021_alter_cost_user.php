<?php

class m110209_025021_alter_cost_user extends CDbMigration
{
	public function up()
	{
		$this->alterColumn('cost','user_id','integer');
	}

	public function down()
	{
		$this->alterColumn('cost','user_id','integer NOT NULL');
	}
}
