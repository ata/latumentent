<?php

class m110207_060645_insert_problem_types extends CDbMigration
{
	public function up()
	{
		$this->insert('problem_type',array(
			'name' => 'Intenet Mati',
			'down' => true,
		));
		$this->insert('problem_type',array(
			'name' => 'TV tidak memiliki channel',
			'down' => true,
		));
	}

	public function down()
	{
		$this->truncateTable('problem_type');
	}
}
