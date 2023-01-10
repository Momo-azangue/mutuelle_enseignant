<?php
/**
 * Created by PhpStorm.
 * User: medric
 * Date: 29/12/18
 * Time: 20:33
 */

namespace app\managers;


use app\models\Borrowing;
use app\models\Exercise;
use app\models\Help;
use app\models\Member;
use app\models\Refund;
use app\models\Saving;
use app\models\Session;
use app\models\User;

class FinanceManager
{

    public static function exerciseAmount() {
        return self::totalSavedAmount()+self::totalRefundedAmount()-self::totalBorrowedAmount();
    }

    public function totalInscriptionAmount() {
        return Member::find()->sum('inscription') ;
    }

    public static function totalSavedAmount() {
        $exercise = Exercise::findOne(['active' => true]);
        if ($exercise) {
            $sessions = Session::find()->select('id')->where(['exercise_id' => $exercise->id])->column();
            return Saving::find()->where(['session_id' => $sessions])->sum('amount') ;
        }
        return 0;
    }

    public static function totalBorrowedAmount() {

        $exercise = Exercise::findOne(['active' => true]);
        if ($exercise){
            $sessions = Session::find()->select('id')->where(['exercise_id' => $exercise->id])->column();
            return Borrowing::find()->where(['session_id' => $sessions])->sum('amount') ;
        }
        else
            return 0;

    }

    public static function totalRefundedAmount() {
        $exercise = Exercise::findOne(['active' => true]);
        if ($exercise)
        {
            $sessions = Session::find()->select('id')->where(['exercise_id' => $exercise->id])->column();

            return Refund::find()->where(['session_id' => $sessions])->sum('amount') ;
        }
        else
            return 0;
    }

    public static function numberOfSession(){
        $exercise = Exercise::findOne(['active' => true]);
        if ($exercise) {
            return count(Session::findAll(['exercise_id' => $exercise->id]));
        }
        return 0;
    }

    public static function exerciseSavings() {
        $exercise = Exercise::findOne(['active' => true]);
        $sessions = Session::find()->select('id')->where(['exercise_id' => $exercise->id])->column();
        return Saving::find()->where(['session_id' => $sessions])->all();
    }

    public static function exerciseActiveBorrowings() {
        $exercise = Exercise::findOne(['active' => true]);
        $sessions = Session::find()->select('id')->where(['exercise_id' => $exercise->id])->column();
        return Borrowing::find()->where(['session_id' => $sessions,'state'=> true])->all();
    }

    public static function MembersAndUsersWithBorrowings() {
        $users = [];
        $members = [];
        foreach (self::exerciseActiveBorrowings() as $borrowing) {
            $member = Member::findOne($borrowing->member_id);
            $members[] =$member;
            $users[] = (User::findOne( $member->user_id));
        }

        return compact('users','members');
    }

    public static function borrowingRefundedAmount(Borrowing $borrowing) {
        return Refund::find()->where(['borrowing_id' => $borrowing->id])->sum('amount');
    }

    public static function intendedAmountFromBorrowing(Borrowing $borrowing) {
        return $borrowing->amount + ($borrowing->amount*$borrowing->interest)/100.0;
    }

    public static function notRefundedBorrowings() {
        $exercise = Exercise::findOne(['active' => true]);
        $sessions = Session::find()->select('id')->where(['exercise_id' => $exercise->id])->column();
        return Borrowing::findAll(['session_id' => $sessions, 'state' => true]);
    }

    public static function socialCrown() {
        $r = Member::find()->sum('social_crown');
        foreach (Help::find()->all() as $help) {
            $r += $help->contributedAmount();
            $r -= $help->amount;
        }

        return $r + self::totalInscriptionAmount();
    }


}