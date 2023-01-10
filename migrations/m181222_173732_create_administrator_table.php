<?php

use yii\db\Migration;

/**
 * Handles the creation of table `administrator`.
 */
class m181222_173732_create_administrator_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('administrator', [
            'id' => $this->primaryKey()->unsigned(),
            'user_id' => $this->integer()->unsigned(),
            'root' => $this->boolean()->defaultValue(false),
            'username' => $this->string()->unique(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('administrator');
    }
}
