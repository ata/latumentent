<?php

class m110119_041753_invoice_item_add_column_service_id extends CDbMigration
{
	public function up()
	{
		$this->addColumn('invoice_item','service_id','integer NOT NULL');
	}

	
	public function down()
	{
		$this->dropColumn('invoice_item','service_id');
	}
	
}
