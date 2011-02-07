<?php

class m110206_075248_add_custumer_rating_column extends CDbMigration
{
	public function up()
	{
		$this->addColumn('customer','rating','integer NOT NULL');
		$this->addColumn('customer','delay_count','integer NOT NULL');
		$this->addColumn('customer','advance_count','integer NOT NULL');
	}

	public function down()
	{
		$this->dropColumn('customer','rating');
		$this->dropColumn('customer','delay_count');
		$this->dropColumn('customer','advance_count');
	}
}
