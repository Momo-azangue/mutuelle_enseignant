<?php

namespace app\models\forms;

class Agape extends \yii\db\ActiveRecord
{

    public static  function  tableName()
    {
        return 'agape';
    }

    public function rules()
    {
        return [
            [['amount'], 'required'],
            [['amount'], 'integer'],
        ];
    }

    }