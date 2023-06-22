<?php

namespace app\models;

use yii\db\ActiveRecord;

class Agape3 extends ActiveRecord
{
    public static function tableName()
    {
        return 'agape3';
    }

    public function rules()
    {
        return [
            [['amount'], 'required'],
            [['amount'], 'number'],
            [['session_id'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'agape_id' => 'Agape ID',
            'amount' => 'Amount',
            'session_id' => 'Session ID',
        ];
    }

    public static function primaryKey()
    {
        return ['agape_id']; // Replace 'id' with the actual primary key column name
    }


    public function getSession()
    {
        return $this->hasOne(Session::class, ['id' => 'session_id']);
    }


}

