<?php

class m110209_040617_add_payment_method_id_on_invoice extends CDbMigration
{
	public function up()
	{
		$this->addColumn('invoice','payment_method_id','integer');
	}
	public function down()
	{
		$this->dropColumn('invoice','payment_method_id');
	}
}
