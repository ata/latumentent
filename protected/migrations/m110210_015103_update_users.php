<?php

class m110210_015103_update_users extends CDbMigration
{
	public function up()
	{
		$this->update('user',array('username' => 'c1'),'id=:id',array('id' => 2));
		$this->update('user',array('username' => 'c2'),'id=:id',array('id' => 3));
		$this->update('user',array('username' => 'c3'),'id=:id',array('id' => 4));
		$this->update('user',array('username' => 'm1'),'id=:id',array('id' => 5));
		$this->update('user',array('username' => 'ts1'),'id=:id',array('id' => 6));
		$this->update('user',array('username' => 'cs1'),'id=:id',array('id' => 7));
	}

	public function down()
	{
		$this->update('user',array('username' => 'customer1'),'id=:id',array('id' => 2));
		$this->update('user',array('username' => 'customer2'),'id=:id',array('id' => 3));
		$this->update('user',array('username' => 'customer3'),'id=:id',array('id' => 4));
		$this->update('user',array('username' => 'management1'),'id=:id',array('id' => 5));
		$this->update('user',array('username' => 'techincal_support1'),'id=:id',array('id' => 6));
		$this->update('user',array('username' => 'customer_services'),'id=:id',array('id' => 7));
	}
}
