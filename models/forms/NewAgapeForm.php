<?php

namespace app\models\forms;

class NewAgapeForm extends \yii\base\Model
{

    public $amount;
    public $session_id;


    public function rules()
    {
        return [
            [['session_id' ],'required','message' => 'Ce champ est obligatoire'],
            [['session_id'],'integer','min' => 1,'message' => 'Ce champ attend une entier positif'],
            [['amount'],'required','message' => 'Ce champ est obligatoire'],
            [['amount'],'integer','min' => 1,'message' => 'Ce champ attend un entier positif']
        ];
    }

}