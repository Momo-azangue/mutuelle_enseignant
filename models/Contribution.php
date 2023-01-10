<?php
/**
 * Created by PhpStorm.
 * User: medric
 * Date: 28/12/18
 * Time: 11:53
 */

namespace app\models;


use yii\db\ActiveRecord;

class Contribution extends ActiveRecord
{
    public function member() {
        return Member::findOne($this->member_id);
    }
    public function administrator() {
        return Administrator::findOne($this->administrator_id);
    }
    public function help() {
        return Help::findOne($this->help_id);
    }

}