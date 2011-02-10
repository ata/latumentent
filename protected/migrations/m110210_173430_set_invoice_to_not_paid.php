<?php

class m110210_173430_set_invoice_to_not_paid extends CDbMigration
{
	public function up()
	{
		$this->update('invoice',array('status' => Invoice::STATUS_NOT_PAID));
	}


	public function down()
	{
		$this->update('invoice',array('status' => Invoice::STATUS_PAID));
	}
}
