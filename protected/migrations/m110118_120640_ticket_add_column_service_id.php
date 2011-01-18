<?php

class m110118_120640_ticket_add_column_service_id extends CDbMigration
{
	public function up()
	{
		$this->addColumn('ticket','service_id', 'integer NOT NULL');
	}

	
	public function down()
	{
		$this->dropColumn('ticket','service');
	}
	
}
