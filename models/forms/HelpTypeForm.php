<?php
/**
 * Created by PhpStorm.
 * User: medric
 * Date: 27/12/18
 * Time: 17:34
 */

namespace app\models\forms;
use yii\db\ActiveRecord;


use yii\base\Model;

class HelpTypeForm extends Model
{
    public $id;
    public $title;
    public $amount;

    public function rules()
    {
        return [
            ['id','number'],
            ['id','required'],
            ['title','string'],
            ['title','required'],
            ['amount','required'],
            ['amount','number','min'=> 1,'integerOnly' => true,'message' => 'Ce champ doit être un entier positif'],
        ];
    }

}