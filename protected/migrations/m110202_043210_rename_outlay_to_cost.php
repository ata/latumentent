<?php

class m110202_043210_rename_outlay_to_cost extends CDbMigration
{
	public function up()
	{
		$this->renameTable('outlay','cost');
	}

	public function down()
	{
		$this->renameTable('cost','outlay');
	}
}
