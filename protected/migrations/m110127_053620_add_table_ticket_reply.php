<?php

class m110127_053620_add_table_ticket_reply extends CDbMigration
{
	public function up()
	{
		$this->createTable('ticket_reply',array(
			'id' => 'pk',
			'ticket_id' => 'integer NOT NULL',
			'message' => 'text',
		));
	}

	public function down()
	{
		$this->dropTable('ticket_reply');
	}
}
