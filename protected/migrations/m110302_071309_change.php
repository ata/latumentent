<?php

class m110302_071309_change extends CDbMigration
{
	public function up()
	{
		$this->alterColumn('cost','paying_date','datetime');
		$this->alterColumn('revenue','received_date','datetime');
	}

	public function down()
	{
		$this->alterColumn('cost','paying_date','date');
		$this->alterColumn('revenue','received_date','date');
	}
}
