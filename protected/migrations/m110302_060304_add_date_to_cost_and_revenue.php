<?php

class m110302_060304_add_date_to_cost_and_revenue extends CDbMigration
{
	public function up()
	{
		$this->addColumn('cost','paying_date','date');
		$this->addColumn('revenue','received_date','date');
	}

	public function down()
	{
		$this->dropColumn('cost','paying_date');
		$this->dropColumn('revenue','received_date');
	}
}
