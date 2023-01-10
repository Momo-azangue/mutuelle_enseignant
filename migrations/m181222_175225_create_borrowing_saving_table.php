<?php

use yii\db\Migration;

/**
 * Handles the creation of table `borrowing_saving`.
 */
class m181222_175225_create_borrowing_saving_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('borrowing_saving', [
            'id' => $this->primaryKey()->unsigned(),
            'borrowing_id'=> $this->integer()->unsigned(),
            'saving_id' => $this->integer()->unsigned(),
            'percent' =>$this->double(2)->unsigned()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('borrowing_saving');
    }
}
