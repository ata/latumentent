<?php

class m110228_084448_fix_null extends CDbMigration
{
	public function up()
	{
		$this->alterColumn('problem_type','service_id','integer');
		$this->update('problem_type',array('service_id' => null));
	}
	
	public function down()
	{
		$this->alterColumn('problem_type','service_id','integer NOT NULL');
		$this->update('problem_type',array('service_id' => 0));
	}
}
