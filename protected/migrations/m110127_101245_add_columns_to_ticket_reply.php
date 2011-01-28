<?php

class m110127_101245_add_columns_to_ticket_reply extends CDbMigration
{
	public function up()
	{
		$this->addColumn('ticket_reply','author_id','integer NOT NULL');
		$this->addColumn('ticket_reply','time','datetime');
	}

	public function down()
	{
		$this->dropColumn('ticket_reply','author_id');
		$this->dropColumn('ticket_reply','time');
	}
}
