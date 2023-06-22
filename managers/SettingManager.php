<?php
/**
 * Created by PhpStorm.
 * User: medric
 * Date: 29/12/18
 * Time: 20:19
 */

namespace app\managers;


class SettingManager
{
    public static function getInterest() {
        $json_source = file_get_contents(\Yii::$app->getBasePath().'/managers/app.json');
        $data = json_decode($json_source,true);
        return $data['interest'];
    }

    public static function getSocialCrown() {
        $json_source = file_get_contents(\Yii::$app->getBasePath().'/managers/app.json');
        $data = json_decode($json_source,true);

        return $data['social_crown'];
    }

    public static function getInscription() {
        $json_source = file_get_contents(\Yii::$app->getBasePath().'/managers/app.json');
        $data = json_decode($json_source,true);

        return $data['inscription'];
    }

    public static function getAgape() {
        $json_source = file_get_contents(\Yii::$app->getBasePath().'/managers/app2.json');
        $data = json_decode($json_source,true);

        return $data['amount'];
    }

    public static function setValues($interest,$social_crown,$inscription) {
        $data = [
            'interest'=>$interest,
            'social_crown'=>$social_crown,
            'inscription'=>$inscription,
        ];

        file_put_contents(\Yii::$app->getBasePath().'/managers/app.json',json_encode($data));

    }

    public static function setvaluesAgape($amount){
        $data = [
            'amount'=> $amount,
        ];

        file_put_contents(\Yii::$app->getBasePath().'/managers/app2.json',json_encode($data));

    }
}