<?php

use yii\db\Migration;

/**
 * Handles the creation of table `help`.
 */
class m181222_181147_create_help_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('help', [
            'id' => $this->primaryKey()->unsigned(),
            'limit_date' => $this->dateTime(),
            'unit_amount' => $this->integer(10)->unsigned(),
            'amount' => $this->integer(10)->unsigned(),
            'comments' => $this->text(),
            'state' => $this->boolean()->defaultValue(true),
            'administrator_id' => $this->integer()->unsigned(),
            'created_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
            'help_type_id' => $this->integer()->unsigned(),
            'member_id' => $this->integer()->unsigned()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('help');
    }
}
