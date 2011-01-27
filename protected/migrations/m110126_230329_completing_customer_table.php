<?php

class m110126_230329_completing_customer_table extends CDbMigration
{
	public function up()
	{
		$this->addColumn('customer','contact_number', 'string NOT NULL');
		$this->addColumn('customer','ownership', 'integer NOT NULL');
		$this->addColumn('customer','hire_up_to', 'date NOT NULL');
	}

	public function down()
	{
		$this->dropColumn('customer','contact_number');
		$this->dropColumn('customer','ownership');
		$this->dropColumn('customer','hire_up_to');
	}
}
