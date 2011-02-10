<?php

class m110210_031457_alter_revenue_user_id_null extends CDbMigration
{
	public function up()
	{
		$this->alterColumn('revenue','user_id','integer');
	}

	public function down()
	{
		$this->alterColumn('revenue','user_id','integer NOT NULL');
	}
}
