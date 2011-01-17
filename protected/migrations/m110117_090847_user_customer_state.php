<?php

class m110117_090847_user_customer_state extends CDbMigration
{
    public function up()
    {
        $this->addColumn('user','status','integer NOT NULL');
        $this->addColumn('customer','status','integer NOT NULL');
        $this->update('user',array('status' => User::STATUS_ACTIVE));
        $this->update('customer',array('status' => Customer::STATUS_ACTIVE));
        
    }

    
    public function down()
    {
        $this->dropColumn('user','status');
        $this->dropColumn('customer','status');
    }
    
}
