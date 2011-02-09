<?php

class m110209_021225_create_table_payment_menthod extends CDbMigration
{
	public function up()
	{
		$this->createTable('payment_menthod',array(
			'id' => 'pk',
			'name' => 'string',
		));
	}

	public function down()
	{
		$this->dropTable('payment_method');
	}
}
