<?php

class m110117_052904_init_user_data extends CDbMigration
{
    public function up()
    {
        $this->insert('user',array(
            'id' => 1,
            'username' => 'admin',
            'password' => md5('rahasia'),
            'email' => 'admin@gmail.com',
            'role_id' => 1,
        ));
        
        $this->insert('user',array(
            'id' => 2,
            'username' => 'customer1',
            'password' => md5('rahasia'),
            'email' => 'customer1@gmail.com',
            'role_id' => 2,
        ));
        
        $this->insert('user',array(
            'id' => 3,
            'username' => 'management1',
            'password' => md5('rahasia'),
            'email' => 'management1@gmail.com',
            'role_id' => 3,
        ));
        
        $this->insert('user',array(
            'id' => 4,
            'username' => 'technical_support1',
            'password' => md5('rahasia'),
            'email' => 'technical.support1@gmail.com',
            'role_id' => 4
        ));
        $this->insert('user',array(
            'id' => 5,
            'username' => 'customer_services1',
            'password' => md5('rahasia'),
            'email' => 'customer_services1@gmail.com',
            'role_id' => 5
        ));
        
        
    }

    
    public function down()
    {
        $this->truncateTable('user');
    }
}
