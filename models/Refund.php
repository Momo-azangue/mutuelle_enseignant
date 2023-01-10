<?php
/**
 * Created by PhpStorm.
 * User: medric
 * Date: 29/12/18
 * Time: 20:43
 */

namespace app\models;


use yii\db\ActiveRecord;

class Refund extends ActiveRecord
{
    public function session() {
        return Session::findOne($this->session_id);
    }

    public function borrowing() {
        return Borrowing::findOne($this->borrowing_id);
    }
}