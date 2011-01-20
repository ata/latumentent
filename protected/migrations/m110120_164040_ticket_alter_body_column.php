<?php

class m110120_164040_ticket_alter_body_column extends CDbMigration
{
	public function up()
	{
		$this->alterColumn('ticket','body','text');
	}

	public function down()
	{
		$this->alterColumn('ticket','body','string');
	}
	
}
