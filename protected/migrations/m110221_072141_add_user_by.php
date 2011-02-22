<?php

class m110221_072141_add_user_by extends CDbMigration
{
	public function up()
	{
		$this->addColumn('cost','user_log_id','integer');
		$this->addColumn('revenue','user_log_id','integer');
		$this->addColumn('invoice','user_log_id','integer');
	}

	public function down()
	{
		$this->dropColumn('cost','user_log_id');
		$this->dropColumn('revenue','user_log_id');
		$this->dropColumn('invoice','user_log_id');
	}
}
