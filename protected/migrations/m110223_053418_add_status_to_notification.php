<?php

class m110223_053418_add_status_to_notification extends CDbMigration
{
	public function up()
	{
		$this->addColumn('notification','status','integer NOT NULL');
	}

	public function down()
	{
		$this->dropColumn('notification','status');
	}
}
