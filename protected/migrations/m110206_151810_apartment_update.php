<?php

class m110206_151810_apartment_update extends CDbMigration
{
	protected $apartmentsData = array(
		array('number' => '001','note' => 'Lorem Ipsum'),
		array('number' => '002','note' => 'Lorem Ipsum'),
		array('number' => '003','note' => 'Lorem Ipsum'),
		array('number' => '004','note' => 'Lorem Ipsum'),
		array('number' => '005','note' => 'Lorem Ipsum'),
	);
	
	public function up()
	{
		$this->alterColumn('apartment','number','string NOT NULL');
		$this->dropColumn('apartment','status');
		$this->addColumn('apartment','note','text');
		foreach($this->apartmentsData as $i => $apartmentData) {
			$this->insert('apartment',$apartmentData);
			$this->update('customer',array('apartment_id' => $i + 1),'id = :id',array('id' => $i + 1));
		}
		$this->dropColumn('customer','number');
	}

	public function down()
	{
		$this->addColumn('customer','number','string NOT NULL');
		foreach($this->apartmentsData as $i => $apartmentData) {
			$this->update('customer',array('number' => $apartmentData['number']),'id = :id',array('id' => $i + 1));
		}
		$this->addColumn('apartment','status','integer NOT NULL');
		$this->dropColumn('apartment','note');
		$this->truncateTable('apartment');
	}
}
