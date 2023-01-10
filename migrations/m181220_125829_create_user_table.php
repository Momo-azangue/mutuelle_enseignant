<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m181220_125829_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey()->unsigned(),
            'name' =>$this->string(),
            'first_name' => $this->string(),
            'tel' => $this->string(),
            'email' =>$this->string(),
            'address' =>$this->string(),
            'type' => $this->string(),
            'avatar' => $this->string(),
            'password' =>$this->string(),
            'created_at'=> $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');
    }
}
