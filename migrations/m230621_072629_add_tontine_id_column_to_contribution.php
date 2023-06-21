<?php

use yii\db\Migration;

/**
 * Class m230621_072629_add_tontine_id_column_to_contribution
 */
class m230621_072629_add_tontine_id_column_to_contribution extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('contribution','tontine_id',$this->integer()->after('help_id'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230621_072629_add_tontine_id_column_to_contribution cannot be reverted.\n";
        $this->dropColumn('contribution', 'tontine_id');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230621_072629_add_tontine_id_column_to_contribution cannot be reverted.\n";

        return false;
    }
    */
}
