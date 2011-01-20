<?php

class m110119_153306_period_drop_year_month_column extends CDbMigration
{
	public function up()
	{
		$this->dropColumn('period','year');
		$this->dropColumn('period','month');
		$this->dropColumn('period','raw_date');
	}

	public function down()
	{
		$this->addColumn('period','year','string');
		$this->addColumn('period','month','string');
		$this->addColumn('period','raw_date','date');
	}
	
}
