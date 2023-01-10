<?php

use yii\db\Migration;

/**
 * Handles the creation of table `saving`.
 */
class m181222_174733_create_saving_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('saving', [
            'id' => $this->primaryKey()->unsigned(),
            'member_id'=> $this->integer()->unsigned(),
            'administrator_id' => $this->integer()->unsigned(),
            'amount' => $this->integer(10)->unsigned(),
            'session_id' => $this->integer()->unsigned(),
            'created_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('saving');
    }
}
