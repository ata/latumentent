<?php

class m110209_050826_chage_table_payment extends CDbMigration
{
	public function up()
	{
		$this->renameTable('payment_menthod','payment_method');
		$this->insert('payment_method',array('name' => 'Manual'));
		$this->insert('payment_method',array('name' => 'Debit'));
	}
	public function down()
	{
		$this->renameTable('payment_method','payment_menthod');
	}
}
