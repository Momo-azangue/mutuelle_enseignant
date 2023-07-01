<?php

namespace app\models;

use yii\db\ActiveRecord;

class Tontine extends ActiveRecord
{

    public function contributions() {
        return ContributionTontine::findAll(['tontine_id'=> $this->id,'state' => true]);
    }

    public function waitedContributions() {
        return ContributionTontine::findAll(['tontine_id'=> $this->id,'state' => false]);
    }

    public function contributedAmount() {
        return ContributionTontine::find()->where(['tontine_id' => $this->id,'state' => true])->count() * $this->unit_amount;
    }

    public function member() {
        return Member::findOne($this->member_id);
    }

    public function TontineType() {
        return TontineType::findOne($this->tontine_type_id);
    }




}