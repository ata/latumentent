<?php

class m990228_071232_change_engine_to_inno_db extends CDbMigration
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
		
		// INDEX
		$this->createIndex('user_username','user','username',true);
		$this->createIndex('user_email','user','email',true);
		
		
		$this->addForeignkey('compensation_schema_service_id',
				'compensation_schema','service_id','service','id');
			
		$this->addForeignkey('cost_period_id',
				'cost','period_id','period','id');
		$this->addForeignkey('cost_service_id',
				'cost','service_id','service','id');
		$this->addForeignkey('cost_user_id',
				'cost','user_id','user','id');
		$this->addForeignkey('cost_customer_id',
				'cost','customer_id','customer','id');
		$this->addForeignkey('cost_user_log_id',
				'cost','user_log_id','user','id');
		
		$this->addForeignKey('customer_user_id',
				'customer','user_id','user','id');
		$this->addForeignKey('customer_apartment_id',
				'customer','apartment_id','apartment','id');
				
		$db->createCommand('ALTER TABLE `customer_has_service` ADD PRIMARY KEY ( `customer_id` , `service_id` )')->execute();
		
		$this->addForeignKey('invoice_period_id',
				'invoice','period_id','period','id');
		$this->addForeignKey('invoice_customer_id',
				'invoice','customer_id','customer','id');
		$this->addForeignKey('invoice_payment_method_id',
				'invoice','payment_method_id','payment_method','id');
		$this->addForeignKey('invoice_user_id',
				'invoice','user_id','user','id');
		$this->addForeignKey('invoice_user_log_id',
				'invoice','user_log_id','user','id');
			
		$this->addForeignKey('invoice_item_invoice_id',
				'invoice_item','invoice_id','invoice','id');
		$this->addForeignKey('invoice_item_period_id',
				'invoice_item','period_id','period','id');
		$this->addForeignKey('invoice_item_customer_id',
				'invoice_item','customer_id','customer','id');
		$this->addForeignKey('invoice_item_service_id',
				'invoice_item','service_id','service','id');
		
		$this->addForeignKey('notification_user_id',
				'notification','user_id','user','id');
		
		$this->addForeignKey('periodic_cost_service_id',
				'periodic_cost','service_id','service','id');
		
		$this->addForeignKey('problem_type_service_id',
				'problem_type','service_id','service','id');
		
		$this->addForeignkey('revenue_period_id',
				'revenue','period_id','period','id');
		$this->addForeignkey('revenue_service_id',
				'revenue','service_id','service','id');
		$this->addForeignkey('revenue_user_id',
				'revenue','user_id','user','id');
		$this->addForeignkey('revenue_customer_id',
				'revenue','customer_id','customer','id');
		$this->addForeignkey('revenue_user_log_id',
				'revenue','user_log_id','user','id');
		
		
		
		$this->addForeignKey('service_parent_id',
				'service','parent_id','service','id');
		
		$db->createCommand('ALTER TABLE `service_package_has_service` ADD PRIMARY KEY ( `service_package_id` , `service_id` )')->execute();
		
		$this->addForeignKey('statistic_arpu_period_id',
				'statistic_arpu','period_id','period','id');
		
		$this->addForeignKey('statistic_client_period_id',
				'statistic_client','period_id','period','id');
		
		$this->addForeignKey('statistic_cost_client_period_id',
				'statistic_cost_client','period_id','period','id');
		
		
		$this->addForeignKey('ticket_invoice_id',
				'ticket','invoice_id','invoice','id');
		$this->addForeignKey('ticket_invoice_item_id',
				'ticket','invoice_item_id','invoice_item','id');
		$this->addForeignKey('ticket_period_id',
				'ticket','period_id','period','id');
		$this->addForeignKey('ticket_customer_id',
				'ticket','customer_id','customer','id');
		$this->addForeignKey('ticket_technician_id',
				'ticket','technician_id','user','id');
		$this->addForeignKey('ticket_author_id',
				'ticket','author_id','user','id');
		$this->addForeignKey('ticket_service_id',
				'ticket','service_id','service','id');
		$this->addForeignKey('ticket_problem_type_id',
				'ticket','problem_type_id','problem_type','id');
		$this->addForeignKey('ticket_reply_ticket_id',
				'ticket_reply','ticket_id','ticket','id');
		$this->addForeignKey('ticket_reply_author_id',
				'ticket_reply','author_id','user','id');
		
		$this->addForeignKey('user_role_id','user','role_id','role','id');
		
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
