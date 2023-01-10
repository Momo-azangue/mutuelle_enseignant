<?php
/**
 * Created by PhpStorm.
 * User: medric
 * Date: 28/12/18
 * Time: 21:51
 */

namespace app\controllers;


use app\managers\RedirectionManager;
use yii\web\Controller;

class PageController extends Controller
{
    public function actionError() {
        return RedirectionManager::abort($this);
    }
}