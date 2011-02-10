<?php

class m110210_170302_add_name extends CDbMigration
{
	public function up()
	{
		$this->addColumn('cost','name','string');
		$this->addColumn('revenue','name','string');
	}

	public function down()
	{
		$this->dropColumn('cost','name');
		$this->dropColumn('revenue','name');
	}
}
