<?php

class m110117_025939_init_data extends CDbMigration
{
    public function up()
    {
        $this->insert('role',array(
            'name' => 'admin',
            'display' => 'Administrator',
        ));
        
        $this->insert('role',array(
            'name' => 'customer',
            'display' => 'Customer',
        ));
        
        $this->insert('role',array(
            'name' => 'management',
            'display' => 'Management',
        ));
        
        $this->insert('role',array(
            'name' => 'technical_support',
            'display' => 'Technical Support',
        ));
        
        $this->insert('role',array(
            'name' => 'customer_services',
            'display' => 'Customer Services',
        ));
    }

    public function down()
    {
        $this->truncateTable('role');
    }
}
