<?php

class m110209_095516_add_customer_id_column extends CDbMigration
{
	public function up()
	{
		$this->addColumn('revenue','customer_id','integer');
		$this->addColumn('revenue','status','integer');
		$this->addColumn('invoice','user_id','integer NOT NULL');
		$this->update('revenue',array('status' => Revenue::STATUS_RECEIVED));
	}

	public function down()
	{
		$this->dropColumn('revenue','customer_id');
		$this->dropColumn('revenue','status');
		$this->dropColumn('invoice','user_id');
		
	}
	
}
