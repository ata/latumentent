<?php

class m110118_033338_service_add_column_price extends CDbMigration
{
	public function up()
	{
		$this->addColumn('service','price','double NOT NULL');
		$this->update('service',array('price'=>100000),'name=:name',array('name' => 'Internet'));
		$this->update('service',array('price'=>80000),'name=:name',array('name' => 'TV'));
	}

	
	public function down()
	{
		$this->dropColumn('service','price');
	}
	
}
