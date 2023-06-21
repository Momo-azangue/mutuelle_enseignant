<?php

namespace app\models;

class Agape extends \yii\db\ActiveRecord
{

    public function session() {
        return Session::findOne($this->session_id);
    }


    }