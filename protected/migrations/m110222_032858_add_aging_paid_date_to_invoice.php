<?php

class m110222_032858_add_aging_paid_date_to_invoice extends CDbMigration
{
	public function up()
	{
		$this->addColumn('invoice','payment_date','date');
		$this->addColumn('invoice','paying_date','date');
		
	}

	public function down()
	{
		$this->dropColumn('invoice','payment_date');
		$this->dropColumn('invoice','paying_date');
	}
}
