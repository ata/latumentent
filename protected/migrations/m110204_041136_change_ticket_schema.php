<?php

class m110204_041136_change_ticket_schema extends CDbMigration
{
	public function up()
	{
		$this->addColumn('problem_type', 'down', 'boolean NOT NULL');
		$this->addColumn('ticket', 'down', 'boolean NOT NULL');
	}
	
	public function down()
	{
		$this->dropColumn('problem_type','down');
		$this->dropColumn('ticket','down');
	}
	
}
