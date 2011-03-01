<?php

class m110301_023202_add_column_service_package extends CDbMigration
{
	public function up()
	{
		$this->addColumn('customer','service_package_id','integer');
	}

	public function down()
	{
		$this->dropColumn('customer','service_package_id');
	}
}
