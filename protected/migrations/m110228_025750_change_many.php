<?php

class m110228_025750_change_many extends CDbMigration
{
	public function up()
	{
		$this->dropColumn('invoice_item','billing_date');
		$this->dropColumn('invoice_item','paying_date');
		
		$this->addColumn('invoice','fine','double NOT NULL');
		
		$this->addColumn('period','start','date NOT NULL');
		$this->addColumn('period','end','date NOT NULL');
		
		$this->dropColumn('period','total_revenue');
		$this->dropColumn('period','total_outlay');
		
		$this->addColumn('periodic_cost','payment_date','date NOT NULL');
	}

	public function down()
	{
		$this->addColumn('invoice_item','billing_date','date');
		$this->addColumn('invoice_item','paying_date','date');

		$this->dropColumn('invoice','fine');
		
		$this->dropColumn('period','start');
		$this->dropColumn('period','end');
		
		$this->addColumn('period','total_revenue','double');
		$this->addColumn('period','total_outlay','double');
		
		$this->dropColumn('periodic_cost','payment_date');
	}
}
