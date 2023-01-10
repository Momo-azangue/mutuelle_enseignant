<?php

use yii\db\Migration;

/**
 * Handles the creation of table `refund`.
 */
class m181222_180915_create_refund_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('refund', [
            'id' => $this->primaryKey()->unsigned(),
            'amount' => $this->double()->unsigned(),
            'borrowing_id' => $this->integer()->unsigned(),
            'administrator_id' => $this->integer()->unsigned(),
            'exercise_id' => $this->integer()->unsigned(),
            'session_id' => $this->integer()->unsigned(),
            'created_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('refund');
    }
}
