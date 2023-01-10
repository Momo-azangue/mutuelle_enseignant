<?php
/**
 * Created by PhpStorm.
 * User: medric
 * Date: 30/12/18
 * Time: 11:58
 */

namespace app\managers;


class MemberSessionManager
{

    const place = "memberPlace";
    const head = "memberHead";


    public static function setHome($head = "home") {
        \Yii::$app->session->set(self::place,"home");
        \Yii::$app->session->set(self::head,$head);
    }

    public static function setProfil() {
        \Yii::$app->session->set(self::place,"profil");
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
    

    public static function isHome() {
        return \Yii::$app->session->get(self::place) == "home";
    }

    public static function isProfil() {
        return \Yii::$app->session->get(self::place) == "profil";
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


    public static function isAccueil() {
        return \Yii::$app->session->get(self::head) == "home";
    }
    public static function isEpargnes() {
        return \Yii::$app->session->get(self::head) == "epargnes";
    }

    public static function isEmprunts() {
        return \Yii::$app->session->get(self::head) == "emprunts";
    }

    public static function isContributions() {
        return \Yii::$app->session->get(self::head) == "contributions";
    }

    public static function isSessions() {
        return \Yii::$app->session->get(self::head) == "sessions";
    }
    public static function isExercices() {
        return \Yii::$app->session->get(self::head) == "exercises";
    }
    public static function isAides() {
        return \Yii::$app->session->get(self::head) == "helps";
    }
}