<?php

class m110301_025341_empty_customer extends CDbMigration
{
	public function up()
	{
		$this->truncateTable('customer');
		$this->truncateTable('customer_has_service');
		$this->delete('user','role_id = 2');
	}
	
	public function down()
	{
		
	}
}
