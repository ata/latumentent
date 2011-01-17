<?php

class m110117_035819_add_table_custumer_has_service extends CDbMigration
{
    public function up()
    {
        $this->createTable('customer_has_service',array(
            'customer_id' => 'integer NOT NULL',
            'service_id' => 'integer NOT NULL',
        ),'engine=InnoDB');
        
        $this->addForeignkey('customer_has_service_customer_id',
                'customer_has_service','customer_id','customer','id');
        
        $this->addForeignkey('customer_has_service_service_id',
                'customer_has_service','service_id','service','id');
        
        // Initial datafor Service
        $this->insert('service',array(
            'name' => 'Internet',
        ));
        
        $this->insert('service',array(
            'name' => 'TV',
        ));
    }

    
    public function down()
    {
        $this->truncateTable('service');
        $this->dropTable('customer_has_service');
    }
    
}
