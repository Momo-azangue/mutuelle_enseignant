<?php
/**
 * Created by PhpStorm.
 * User: medric
 * Date: 27/12/18
 * Time: 21:47
 */

namespace app\managers;


class AdministratorSessionManager
{

    const place = "adminPlace";
    const head = "adminHead";


    public static function setHome($head = "home") {
        \Yii::$app->session->set(self::place,"home");
        \Yii::$app->session->set(self::head,$head);
    }

    public static function setProfile() {
        \Yii::$app->session->set(self::place,"profile");
        \Yii::$app->session->set(self::head,null);
    }

    public static function setMembers() {
        \Yii::$app->session->set(self::place,"members");
        \Yii::$app->session->set(self::head,null);
    }

    public static function setAdministrators() {
        \Yii::$app->session->set(self::place,"administrators");
        \Yii::$app->session->set(self::head,null);
    }

    public static function setHelps() {
        \Yii::$app->session->set(self::place,"helps");
        \Yii::$app->session->set(self::head,null);
    }
    public static function setTontine() {
        \Yii::$app->session->set(self::place,"tontine");
        \Yii::$app->session->set(self::head,null);
    }
    public static function setSettings() {
        \Yii::$app->session->set(self::place,"settings");
        \Yii::$app->session->set(self::head,null);
    }
    public static  function setAgapes(){
        \Yii::$app->session->set(self::place, "agape");
        \Yii::$app->session->set(self::head,null);

    }

    public static function isHeadHome() {
        return \Yii::$app->session->get(self::head) == "home";
    }
    public static function isHeadSaving() {
        return \Yii::$app->session->get(self::head) == "saving";
    }
    public static function isHeadRefund() {
        return \Yii::$app->session->get(self::head) == "refund";
    }
    public static function isHeadBorrowing() {
        return \Yii::$app->session->get(self::head) == "borrowing";
    }
    public static function isHeadHelp() {
        return \Yii::$app->session->get(self::head) == "help";
    }
    public static function isHeadTontine() {
        return \Yii::$app->session->get(self::head) == "tontine";
    }
    public static function isHeadSession() {
        return \Yii::$app->session->get(self::head) == "session";
    }
    public static function isHeadExercise() {
        return \Yii::$app->session->get(self::head) == "exercise";
    }
    public static function isHeadExerciseDebt() {
        return \Yii::$app->session->get(self::head) == "exercise_debt";
    }


    public static function isHome() {
        return \Yii::$app->session->get(self::place) == "home";
    }

    public static function isProfile() {
        return \Yii::$app->session->get(self::place) == "profile";
    }

    public static function isMembers() {
        return \Yii::$app->session->get(self::place) == "members";
    }

    public static function isAdministrators() {
        return \Yii::$app->session->get(self::place) == "administrators";
    }

    public static function isHelps() {
        return \Yii::$app->session->get(self::place) == "helps";
    }

    public static function isSettings()
    {
        return \Yii::$app->session->get(self::place) == "settings";
    }
    public static function isTontine() {
        return \Yii::$app->session->get(self::place) == "tontine";
    }

    public static function isHeadAgape() {
        return \Yii::$app->session->get(self::place) == "agape";
    }
}