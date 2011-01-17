<?php

class m110117_102801_user_add_fullname_column extends CDbMigration
{
    public function up()
    {
        $this->addColumn('user','fullname','string NOT NULL');
    }

    
    public function down()
    {
        $this->addColumn('user','fullname');
    }
    
}
