<?php

namespace app\models;

use yii\db\ActiveRecord;

class TontineType extends ActiveRecord
{
    public function Tontines() {
        return Help::findAll(['tontine_type_id' => $this->id]);
    }

    public static function getDb()
    {
        return \Yii::$app->db;
    }

    public function rules()
    {
        return [
            ['title','unique','message' => 'Cet aide a déjà été crée']
        ];
    }
}