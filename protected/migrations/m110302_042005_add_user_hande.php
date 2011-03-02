<?php

class m110302_042005_add_user_hande extends CDbMigration
{
	public function up()
	{
		$this->dropColumn('cost','user_log_id');
		$this->dropColumn('revenue','user_log_id');
		$this->dropColumn('invoice','user_log_id');
		$this->addColumn('cost','user_handle_id','integer');
		$this->addColumn('revenue','user_handle_id','integer');
		$this->addColumn('invoice','user_handle_id','integer');
	}

	public function down()
	{
		$this->addColumn('cost','user_log_id','integer');
		$this->addColumn('revenue','user_log_id','integer');
		$this->addColumn('invoice','user_log_id','integer');
		$this->dropColumn('cost','user_handle_id');
		$this->dropColumn('revenue','user_handle_id');
		$this->dropColumn('invoice','user_handle_id');
	}
}
