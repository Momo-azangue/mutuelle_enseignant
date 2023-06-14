<?php

namespace app\models\forms;

use app\models\Session;

class Agape extends \yii\db\ActiveRecord
{
    public function session() {
        return Session::findOne($this->session_id);
    }

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