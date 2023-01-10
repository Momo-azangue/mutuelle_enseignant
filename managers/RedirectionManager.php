<?php
/**
 * Created by PhpStorm.
 * User: medric
 * Date: 27/12/18
 * Time: 19:21
 */

namespace app\managers;


use yii\web\Controller;

class RedirectionManager
{

    public static function abort(Controller $controller) {
        \Yii::$app->response->setStatusCode(404);
        $controller->layout = "404";
        return $controller->renderContent("");
    }
}