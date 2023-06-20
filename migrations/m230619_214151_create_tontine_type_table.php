<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tontine_type}}`.
 */
class m230619_214151_create_tontine_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tontine_type}}', [
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
        $this->dropTable('{{%tontine_type}}');
    }

}
