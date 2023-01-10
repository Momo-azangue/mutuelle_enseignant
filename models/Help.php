<?php
/**
 * Created by PhpStorm.
 * User: medric
 * Date: 27/12/18
 * Time: 20:42
 */

namespace app\models;


use yii\db\ActiveRecord;

class Help extends ActiveRecord
{
    public function contributions() {
        return Contribution::findAll(['help_id'=> $this->id,'state' => true]);
    }

    public function waitedContributions() {
        return Contribution::findAll(['help_id'=> $this->id,'state' => false]);
    }

    public function contributedAmount() {
        return Contribution::find()->where(['help_id' => $this->id,'state' => true])->count() * $this->unit_amount;
    }

    public function member() {
        return Member::findOne($this->member_id);
    }

    public function helpType() {
        return HelpType::findOne($this->help_type_id);
    }
}