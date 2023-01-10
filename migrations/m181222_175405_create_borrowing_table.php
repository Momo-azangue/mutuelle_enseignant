<?php

use yii\db\Migration;

/**
 * Handles the creation of table `borrowing`.
 */
class m181222_175405_create_borrowing_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('borrowing', [
            'id' => $this->primaryKey()->unsigned(),
            'interest' => $this->integer(10)->unsigned(),
            'amount' => $this->integer(10)->unsigned(),
            'member_id' => $this->integer()->unsigned(),
            'administrator_id'=> $this->integer()->unsigned(),
            'session_id' => $this->integer()->unsigned(),
            'state' => $this->boolean()->defaultValue(true),
            'created_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('borrowing');
    }
}
