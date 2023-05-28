<?php

namespace app\models\forms;

class AgapeForm extends \yii\base\Model
{
    public  $agape;


    public function rules()
    {
        return [
            [['agape'],'required','message' => 'Ce champ est obligatoire'],
            [['agape'],'integer','min' => 1,'message' => 'Ce champ attend un entier positif']
        ];
    }
}