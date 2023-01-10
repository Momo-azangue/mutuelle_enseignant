<?php

use yii\db\Migration;

/**
 * Handles the creation of table `help_type`.
 */
class m181222_181453_create_help_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('help_type', [
            'id' => $this->primaryKey()->unsigned(),
            'title' => $this->string(),
            'amount' => $this->integer(10)->unsigned(),
            'active' => $this->boolean()->defaultValue(true)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('help_type');
    }
}
