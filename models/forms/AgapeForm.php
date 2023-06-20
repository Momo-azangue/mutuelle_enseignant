<?php

namespace app\models\forms;

use app\models\Agape;
use yii\base\Model;


class AgapeForm extends Model
{
    public  $amount;
    public  $session_id;


    public function save()
    {
        if ($this->validate()) {
            $agape = new Agape();
            $agape->amount = $this->amount;
            $agape->session_id = $this->session_id;

            if ($agape->save()) {
                return $agape->agape_id;
            } else {
                return false;
            }
        } else {
            return false;
        }
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
}