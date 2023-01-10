<?php

use yii\db\Migration;

/**
 * Handles the creation of table `member`.
 */
class m181222_174013_create_member_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('member', [
            'id' => $this->primaryKey()->unsigned(),
            'user_id' => $this->integer()->unsigned(),
            'username' =>$this->string()->unique(),
            'active' => $this->boolean()->defaultValue(true),
            'social_crown' => $this->integer()->defaultValue(0),
            'inscription' => $this->integer()->defaultValue(0),
            'administrator_id' => $this->integer()->unsigned()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('member');
    }
}
