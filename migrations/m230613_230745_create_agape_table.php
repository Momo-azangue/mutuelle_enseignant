<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%agape}}`.
 */
class m230613_230745_create_agape_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('agape', [
            'agape_id' => $this->primaryKey()->unsigned(),
            'amount' => $this->integer(10)->unsigned(),



        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('agape');
    }
}
