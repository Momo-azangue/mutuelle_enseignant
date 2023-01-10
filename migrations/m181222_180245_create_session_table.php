<?php

use yii\db\Migration;

/**
 * Handles the creation of table `session`.
 */
class m181222_180245_create_session_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('session', [
            'id' => $this->primaryKey()->unsigned(),
            'exercise_id' => $this->integer()->unsigned(),
            'date' => $this->dateTime(),
            'administrator_id'=> $this->integer()->unsigned(),
            'state' => $this->string()->defaultValue("SAVING"),
            'active' => $this->boolean()->defaultValue(true),
            'created_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('session');
    }
}
