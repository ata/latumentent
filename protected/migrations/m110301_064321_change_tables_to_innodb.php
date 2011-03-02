<?php

class m110301_064321_change_tables_to_innodb extends CDbMigration
{
	public function up()
	{
		$db = $this->getDbConnection();
		$db->createCommand('ALTER TABLE `apartment` ENGINE = InnoDB')->execute();
		$db->createCommand('ALTER TABLE `compensation_schema` ENGINE = InnoDB')->execute();
		$db->createCommand('ALTER TABLE `cost` ENGINE = InnoDB')->execute();
		$db->createCommand('ALTER TABLE `customer` ENGINE = InnoDB')->execute();
		$db->createCommand('ALTER TABLE `customer_has_service` ENGINE = InnoDB')->execute();
		$db->createCommand('ALTER TABLE `invoice` ENGINE = InnoDB')->execute();
		$db->createCommand('ALTER TABLE `invoice_item` ENGINE = InnoDB')->execute();
		$db->createCommand('ALTER TABLE `notification` ENGINE = InnoDB')->execute();
		$db->createCommand('ALTER TABLE `payment_method` ENGINE = InnoDB')->execute();
		$db->createCommand('ALTER TABLE `period` ENGINE = InnoDB')->execute();
		$db->createCommand('ALTER TABLE `periodic_cost` ENGINE = InnoDB')->execute();
		$db->createCommand('ALTER TABLE `problem_type` ENGINE = InnoDB')->execute();
		$db->createCommand('ALTER TABLE `revenue` ENGINE = InnoDB')->execute();
		$db->createCommand('ALTER TABLE `role` ENGINE = InnoDB')->execute();
		$db->createCommand('ALTER TABLE `service` ENGINE = InnoDB')->execute();
		$db->createCommand('ALTER TABLE `service_package` ENGINE = InnoDB')->execute();
		$db->createCommand('ALTER TABLE `service_package_has_service` ENGINE = InnoDB')->execute();
		$db->createCommand('ALTER TABLE `setting` ENGINE = InnoDB')->execute();
		$db->createCommand('ALTER TABLE `statistic_arpu` ENGINE = InnoDB')->execute();
		$db->createCommand('ALTER TABLE `statistic_client` ENGINE = InnoDB')->execute();
		$db->createCommand('ALTER TABLE `statistic_cost_client` ENGINE = InnoDB')->execute();
		$db->createCommand('ALTER TABLE `tbl_migration` ENGINE = InnoDB')->execute();
		$db->createCommand('ALTER TABLE `ticket` ENGINE = InnoDB')->execute();
		$db->createCommand('ALTER TABLE `ticket_reply` ENGINE = InnoDB')->execute();
		$db->createCommand('ALTER TABLE `user` ENGINE = InnoDB')->execute();
	}

	public function down()
	{
		$db = $this->getDbConnection();
		$db->createCommand('ALTER TABLE `apartment` ENGINE = MyISAM')->execute();
		$db->createCommand('ALTER TABLE `compensation_schema` ENGINE = MyISAM')->execute();
		$db->createCommand('ALTER TABLE `cost` ENGINE = MyISAM')->execute();
		$db->createCommand('ALTER TABLE `customer` ENGINE = MyISAM')->execute();
		$db->createCommand('ALTER TABLE `customer_has_service` ENGINE = MyISAM')->execute();
		$db->createCommand('ALTER TABLE `invoice` ENGINE = MyISAM')->execute();
		$db->createCommand('ALTER TABLE `invoice_item` ENGINE = MyISAM')->execute();
		$db->createCommand('ALTER TABLE `notification` ENGINE = MyISAM')->execute();
		$db->createCommand('ALTER TABLE `payment_method` ENGINE = MyISAM')->execute();
		$db->createCommand('ALTER TABLE `period` ENGINE = MyISAM')->execute();
		$db->createCommand('ALTER TABLE `periodic_cost` ENGINE = MyISAM')->execute();
		$db->createCommand('ALTER TABLE `problem_type` ENGINE = MyISAM')->execute();
		$db->createCommand('ALTER TABLE `revenue` ENGINE = MyISAM')->execute();
		$db->createCommand('ALTER TABLE `role` ENGINE = MyISAM')->execute();
		$db->createCommand('ALTER TABLE `service` ENGINE = MyISAM')->execute();
		$db->createCommand('ALTER TABLE `service_package` ENGINE = MyISAM')->execute();
		$db->createCommand('ALTER TABLE `service_package_has_service` ENGINE = MyISAM')->execute();
		$db->createCommand('ALTER TABLE `setting` ENGINE = MyISAM')->execute();
		$db->createCommand('ALTER TABLE `statistic_arpu` ENGINE = MyISAM')->execute();
		$db->createCommand('ALTER TABLE `statistic_client` ENGINE = MyISAM')->execute();
		$db->createCommand('ALTER TABLE `statistic_cost_client` ENGINE = MyISAM')->execute();
		$db->createCommand('ALTER TABLE `tbl_migration` ENGINE = MyISAM')->execute();
		$db->createCommand('ALTER TABLE `ticket` ENGINE = MyISAM')->execute();
		$db->createCommand('ALTER TABLE `ticket_reply` ENGINE = MyISAM')->execute();
		$db->createCommand('ALTER TABLE `user` ENGINE = MyISAM')->execute();
	}
}
