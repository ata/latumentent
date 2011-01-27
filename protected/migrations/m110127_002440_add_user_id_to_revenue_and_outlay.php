<?php

class m110127_002440_add_user_id_to_revenue_and_outlay extends CDbMigration
{
	public function up()
	{
		$this->addColumn('revenue','user_id','integer NOT NULL');
		$this->addColumn('outlay','user_id','integer NOT NULL');
	}

	
	public function down()
	{
		$this->dropColumn('revenue','user_id');
		$this->dropColumn('outlay','user_id');
	}
	
}
