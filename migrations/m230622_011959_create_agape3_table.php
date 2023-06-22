<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%agape3}}`.
 */
class m230622_011959_create_agape3_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('agape3', [
            'agape_id' => $this->primaryKey(),
            'amount' => $this->integer(),
            'session_id' => $this->integer()->notNull(),

        ]);

        $this->addForeignKey(
            'fk-agape3-session_id',
            'agape3',
            'session_id',
            'session',
            'id',
            'CASCADE',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {     $this->dropForeignKey('fk-agape3-session_id', 'agape3');
        $this->dropTable('agape3');
    }
}
