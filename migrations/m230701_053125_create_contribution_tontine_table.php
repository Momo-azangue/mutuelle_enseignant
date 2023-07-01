<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%contribution_tontine}}`.
 */
class m230701_053125_create_contribution_tontine_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('contribution_tontine', [
            'id' => $this->primaryKey()->unsigned(),
            'member_id' => $this->integer()->unsigned(),
            'date' => $this->dateTime(),
            'state' => $this->boolean()->defaultValue(false),
            'created_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
            'tontine_id' => $this->integer()->unsigned(),
            'administrator_id' => $this->integer()->unsigned()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%contribution_tontine}}');
    }
}
