<?php
/**
 * Created by PhpStorm.
 * User: medric
 * Date: 27/12/18
 * Time: 23:04
 */

namespace app\models;


use yii\db\ActiveRecord;

class Exercise extends ActiveRecord
{
    public function sessions() {
        return Session::find()->where(['exercise_id' => $this->id])->orderBy('created_at',SORT_ASC)->all();
    }
    public function exerciseAmount() {
        return $this->totalSavedAmount()+ $this->totalRefundedAmount()- $this->totalBorrowedAmount() - $this->totalAgapeAmount();
    }

    public function totalInscriptionAmount() {
        return Member::find()->sum('inscription') ;
    }

    public  function renflouementAmount(){
        return ($this->exerciseAmount()/ $this->numberofMembers());
    }
    public function totalSavedAmount() {
        $sessions = Session::find()->select('id')->where(['exercise_id' => $this->id])->column();
        return Saving::find()->where(['session_id' => $sessions])->sum('amount') ;
    }

    public function totalBorrowedAmount() {
        $sessions = Session::find()->select('id')->where(['exercise_id' => $this->id])->column();
        return Borrowing::find()->where(['session_id' => $sessions])->sum('amount') ;
    }

    public function totalRefundedAmount() {
        $sessions = Session::find()->select('id')->where(['exercise_id' => $this->id])->column();
        return Refund::find()->where(['session_id' => $sessions])->sum('amount') ;
    }


    public function totalAgapeAmount() {
        $sessions = Session::find()->select('id')->where(['exercise_id' => $this->id])->column();
        return Agape::find()->where(['session_id' => $sessions])->sum('amount') ;
    }

    public function interest() {
        $sessions = Session::find()->select('id')->where(['exercise_id' => $this->id])->column();
        $amount =(int) Borrowing::find()->select('ceil(sum(amount*interest/100))')->where(['session_id' => $sessions])->column()[0];
        return $amount;
    }

    public function sessionNumber() {
        return count( Session::findAll(['exercise_id' => $this->id]));
    }

    public function borrowings() {
        $c = 1;
        $sessions = Session::find()->select('id')->where(['exercise_id' => $this->id])->column();
        return Borrowing::find()->where(['session_id' => $sessions,'state' =>$c])->all();
    }

    public function numberofMembers()
    {
        return Member::find()->count();
    }



}