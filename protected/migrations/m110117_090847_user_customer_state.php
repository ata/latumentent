<?php



class m110117_090847_user_customer_state extends CDbMigration
{
    public function up()
    {
        $this->addColumn('user','status','integer NOT NULL');
        $this->addColumn('customer','status','integer NOT NULL');
        $this->update('user',array('status' => 1));
        $this->update('customer',array('status' => 1));
        
    }

    
    public function down()
    {
        $this->dropColumn('user','status');
        $this->dropColumn('customer','status');
    }
    
}
