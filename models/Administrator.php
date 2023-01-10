<?php
/**
 * Created by PhpStorm.
 * User: medric
 * Date: 24/12/18
 * Time: 18:04
 */

namespace app\models;


use yii\db\ActiveRecord;

class Administrator extends ActiveRecord
{
    public function user() {
        return User::findOne($this->user_id);
    }
}