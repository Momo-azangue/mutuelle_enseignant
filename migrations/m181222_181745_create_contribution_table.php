<?php

use yii\db\Migration;

/**
 * Handles the creation of table `contribution`.
 */
class m181222_181745_create_contribution_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('contribution', [
            'id' => $this->primaryKey()->unsigned(),
            'member_id' => $this->integer()->unsigned(),
            'date' => $this->dateTime(),
            'state' => $this->boolean()->defaultValue(false),
            'created_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
            'help_id' => $this->integer()->unsigned(),
            'administrator_id' => $this->integer()->unsigned()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('contribution');
    }
}
