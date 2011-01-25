<?php

class m110121_234243_add_detail_tables extends CDbMigration
{
	public function up()
	{
		
		$this->createTable('setting',array(
			'id' => 'pk',
			'key' => 'string NOT NULL',
			'value' => 'string NOT NULL',
		));
		
		$this->createTable('outlay',array(
			'id' => 'pk',
			'amount' => 'double NOT NULL',
			'period_id' => 'integer NOT NULL',
			'service_id' => 'integer NULL',
		));
		
		$this->createTable('revenue',array(
			'id' => 'pk',
			'amount' => 'double NOT NULL',
			'period_id' => 'integer NOT NULL',
			'service_id' => 'integer NOT NULL',
		));
		
		$this->createTable('problem_type',array(
			'id' => 'pk',
			'name' => 'string NOT NULL',
			'service_id' => 'integer NOT NULL'
		));
		
		
		$this->addColumn('invoice_item','billing_date','date NOT NULL');
		$this->addColumn('invoice_item','paying_date','date NOT NULL');
		
		$this->addColumn('period','total_revenue','double NOT NULL');
		$this->addColumn('period','total_outlay','double NOT NULL');
		
		$this->addColumn('ticket','time_open','datetime NOT NULL');
		$this->addColumn('ticket','time_closed','datetime NOT NULL');
		$this->addColumn('ticket','problem_type_id','integer NOT NULL');
		$this->addColumn('ticket','solved','boolean');
		
		
	}

	
	public function down()
	{
		
		$this->dropColumn('invoice_item','billing_date');
		$this->dropColumn('invoice_item','paying_date');
		
		$this->dropColumn('period','total_revenue');
		$this->dropColumn('period','total_outlay');
		
		$this->dropColumn('ticket','time_open');
		$this->dropColumn('ticket','time_closed');
		$this->dropColumn('ticket','problem_type_id');
		$this->dropColumn('ticket','solved');
		
		$this->dropTable('problem_type');
		$this->dropTable('revenue');
		$this->dropTable('outlay');
		$this->dropTable('setting');
	}
}
