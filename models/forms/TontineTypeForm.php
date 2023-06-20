<?php

namespace app\models\forms;
use yii\base\Model;
class TontineTypeForm extends Model
{

    public $id;
    public $title;
    public $amount;

    public function rules()
    {
        return
            [
                ['id','number'],
                ['id','required'],
                ['title','string'],
                ['title','required'],
                ['amount','required'],
                ['amount','number','min'=> 1,'integerOnly' => true,'message' => 'Ce champ doit être un entier positif'],
            ];
    }



}