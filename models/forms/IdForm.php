<?php
/**
 * Created by PhpStorm.
 * User: medric
 * Date: 27/12/18
 * Time: 22:53
 */

namespace app\models\forms;


use yii\base\Model;

class IdForm extends Model
{
    public $id;

    public function rules()
    {
        return [
            ['id','required'],
            ['id','integer','min' => 0]
        ];
    }

}