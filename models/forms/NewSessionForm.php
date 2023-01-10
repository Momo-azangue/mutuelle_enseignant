<?php
/**
 * Created by PhpStorm.
 * User: medric
 * Date: 27/12/18
 * Time: 22:21
 */

namespace app\models\forms;


use app\models\Exercise;
use yii\base\Model;

class NewSessionForm extends Model
{
    public $year;
    public $date;

    public function rules()
    {
        if (Exercise::findOne(['active' => true]))
            return [
                ['date','date','format' => 'yyyy-M-d','message' => 'Ce champ attend une date'],
                ['date','required','message' => 'Ce champ est obligatoire']
            ];
        else
            return [
                ['year', 'integer'],
                ['date','date','format' => 'yyyy-M-d','message' => 'Ce champ attend une date'],
                [ ['date','year'],'required','message' => 'Ce champ est obligatoire']
            ];
    }
}