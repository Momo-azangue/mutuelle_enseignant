<?php

use yii\db\Migration;

/**
 * Handles the creation of table `exercise`.
 */
class m181222_180233_create_exercise_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('exercise', [
            'id' => $this->primaryKey()->unsigned(),
            'year' => $this->integer(4),
            'active' => $this->boolean()->defaultValue(true),
            'administrator_id' => $this->integer()->unsigned(),
            'created_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('exercise');
    }
}
