<?php

class m110117_025939_init_data extends CDbMigration
{
    public function up()
    {
        $this->insert('role',array(
            'id' => 1,
            'name' => 'admin',
            'display' => 'Administrator',
        ));
        
        $this->insert('role',array(
            'id' => 2,
            'name' => 'customer',
            'display' => 'Customer',
        ));
        
        $this->insert('role',array(
            'id' => 3,
            'name' => 'management',
            'display' => 'Management',
        ));
        
        $this->insert('role',array(
            'id' => 4,
            'name' => 'technical_support',
            'display' => 'Technical Support',
        ));
        
        $this->insert('role',array(
            'id' => 5,
            'name' => 'customer_services',
            'display' => 'Customer Services',
        ));
    }

    public function down()
    {
        $this->truncateTable('role');
    }
}
