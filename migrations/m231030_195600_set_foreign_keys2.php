<?php

use yii\db\Migration;

/**
 * Class m231030_195600_set_foreign_keys2
 */
class m231030_195600_set_foreign_keys2 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->addForeignKey('agape_session_id','agape','session_id','session','id');
        


        $this->addForeignKey('tontine_administrator_id','tontine','administrator_id','administrator','id');
        $this->addForeignKey('tontine_tontine_type_id','tontine','tontine_type_id','tontine_type','id');
        $this->addForeignKey('tontine_member_id','tontine','member_id','member','id');
         
        $this->addForeignKey('contribution_tontine_id','contribution_tontine','tontine_id','tontine','id');
        $this->addForeignKey('contribution_tontine_member_id','contribution_tontine','member_id','member','id');
        $this->addForeignKey('contribution_tontine_administrator_id','contribution_tontine','administrator_id','administrator','id');
       

  
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m231030_195600_set_foreign_keys2 cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m231030_195600_set_foreign_keys2 cannot be reverted.\n";

        return false;
    }
    */
}
