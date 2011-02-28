<?php

class m110228_055159_change_payment_date extends CDbMigration
{
	public function up()
	{
		$this->alterColumn('periodic_cost','payment_date','integer NOT NULL');
	}

	public function down()
	{
		$this->alterColumn('periodic_cost','payment_date','date');
	}
}
