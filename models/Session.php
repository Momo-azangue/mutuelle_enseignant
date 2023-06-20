<?php
/**
 * Created by PhpStorm.
 * User: medric
 * Date: 27/12/18
 * Time: 22:35
 */

namespace app\models;


use yii\db\ActiveRecord;


class Session extends ActiveRecord
{

    public function totalAmount() {
        return $this->savedAmount()+$this->refundedAmount()-$this->borrowedAmount();
    }

    public function savedAmount(){
        return Saving::find()->where(['session_id' => $this->id])->sum('amount');
    }

    public function borrowedAmount() {
        return Borrowing::find()->where(['session_id' => $this->id])->sum('amount');
    }

    public function refundedAmount()  {
        return Refund::find()->where(['session_id' => $this->id])->sum('amount');
    }

    public function agapeAmount(){
        return Agape::find()->where(['session_id' => $this->id])->sum('amount');
    }

    public function date() {
        return (new \DateTime($this->date))->format("d-m-Y");
    }
    public function date_d_écheance_emprunt(){

       $date = new \DateTime($this->date);
       $date->add(new \DateInterval('P3M'));

        return $date->format("d-m-Y");

    }

    public function number() {
        $exercise = $this->exercise();
        $i = 0;
        foreach ($exercise->sessions() as $session) {
            $i++;
            if ($session->id ==  $this->id)
                return $i;
        }
        return 0;
    }

    public function exercise() {
        return Exercise::findOne($this->exercise_id);
    }
}