<?php

class m110222_012842_create_table_notification extends CDbMigration
{
	public function up()
	{
		$this->createTable('notification',array(
			'id' => 'pk',
			'user' => 'integer NOT NULL',
			'message' => 'string NOT NULL',
		));
	}

	public function down()
	{
		$this->dropTable('notification');
	}
}
