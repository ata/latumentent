<?php

class m110228_080528_alter_user_id extends CDbMigration
{
	public function up()
	{
		$this->dropColumn('notification','user');
		$this->addColumn('notification','user_id','integer');
	}

	public function down()
	{
		$this->dropColumn('notification','user_id');
		$this->addColumn('notification','user','integer');
	}
}
