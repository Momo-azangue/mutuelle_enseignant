<?php

namespace app\models\forms;

use yii\base\Model;

class AgapeForm extends Model
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