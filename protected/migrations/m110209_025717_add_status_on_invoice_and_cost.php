<?php

class m110209_025717_add_status_on_invoice_and_cost extends CDbMigration
{
	public function up()
	{
		$this->addColumn('invoice','status','integer NOT NULL');
		$this->addColumn('cost','status','integer NOT NULL');
		$this->update('invoice',array('status' => Invoice::STATUS_PAID));
		$this->update('cost',array('status' => Cost::STATUS_PAID));
	}

	public function down()
	{
		$this->dropColumn('invoice','status');
		$this->dropColumn('cost','status');
	}
}
