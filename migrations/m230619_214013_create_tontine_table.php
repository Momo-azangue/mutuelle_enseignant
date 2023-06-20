<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tontine}}`.
 */
class m230619_214013_create_tontine_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tontine}}', [
            'id' => $this->primaryKey()->unsigned(),
            'limit_date' => $this->dateTime(),
            'unit_amount' => $this->integer(10)->unsigned(),
            'amount' => $this->integer(10)->unsigned(),
            'comments' => $this->text(),
            'state' => $this->boolean()->defaultValue(true),
            'administrator_id' => $this->integer()->unsigned(),
            'created_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
            'tontine_type_id' => $this->integer()->unsigned(),
            'member_id' => $this->integer()->unsigned()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tontine}}');
    }

}
