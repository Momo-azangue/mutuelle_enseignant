<?php

namespace app\models;

class Agape extends \yii\db\ActiveRecord
{

    public $amount;
    public $session_id;

    public static  function  tableName()
    {
        return 'agape';
    }

    public function rules()
    {
        return [
            [['session_id' ],'required','message' => 'Ce champ est obligatoire'],
            [['session_id'],'integer','min' => 1,'message' => 'Ce champ attend une entier positif'],
            [['amount'],'required','message' => 'Ce champ est obligatoire'],
            [['amount'],'integer','min' => 1,'message' => 'Ce champ attend un entier positif']
        ];
    }
    public function session() {
        return Session::findOne($this->session_id);
    }
    public function refundedAmount() {
        $result = Refund::find()->where(['agape_id' => $this->id])->sum("amount");
        return $result?$result:0;
    }


    }