<?php
/**
 * Created by PhpStorm.
 * User: medric
 * Date: 12/01/19
 * Time: 07:58
 */

namespace app\managers;


use app\models\Exercise;
use app\models\Help;
use app\models\HelpType;
use app\models\Member;
use app\models\Session;
use app\models\User;

class MailManager
{

    public static $from = "medricsonwa12@gmail.com";

    public static function alert_new_member(User $user,Member $member) {
        try {
            \Yii::$app->mailer->compose('alert_new_member',compact('user','member'))
                ->setFrom(self::$from)
                ->setTo($user->email)
                ->setSubject("Vous êtes un nouveau membre de la mutuelle")
                ->send();
        }catch (\Exception $exception) {

        }
    }

    public static function alert_new_session(User $user, Session $session) {
        try{
            \Yii::$app->mailer->compose('alert_new_session', compact('user','session'))
                ->setFrom(self::$from)
                ->setTo($user->email)
                ->setSubject("Une nouvelle session commence")
                ->send();
        }catch (\Exception $exception) {

        }
    }

    public static function alert_end_session(User $user, Member $member, Session $session) {
        try{
            \Yii::$app->mailer->compose('alert_cloture_session', compact('user','member','session'))
                ->setFrom(self::$from)
                ->setTo($user->email)
                ->setSubject("Fin de la session")
                ->send();
        }catch (\Exception $exception) {

        }
    }

    public static function alert_end_exercise(User $user, Member $member, Exercise $exercise) {
        try{
            \Yii::$app->mailer->compose('alert_cloture_exercise', compact('user','member','exercise'))
                ->setFrom(self::$from)
                ->setTo($user->email)
                ->setSubject("Fin de l'exercice de ". $exercise->year)
                ->send();
        }catch (\Exception $exception) {

        }
    }

    public static function alert_new_help(User $user, Member $member, Help $help, HelpType $helpType) {
        try{
            \Yii::$app->mailer->compose('alert_new_help', compact('user','member','help','helpType'))
                ->setFrom(self::$from)
                ->setTo($user->email)
                ->setSubject("Nouvelle aide financière")
                ->send();
        }catch (\Exception $exception) {

        }
    }

    public static function alert_new_administrator(User $user) {

    }
}