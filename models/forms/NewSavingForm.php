<?php
/**
 * Created by PhpStorm.
 * User: medric
 * Date: 28/12/18
 * Time: 23:40
 */

namespace app\models\forms;


use yii\base\Model;

class NewSavingForm extends Model
{
    public $member_id;
    public $amount;
    public $session_id;

    public function rules()
    {
        return [
            [['member_id','amount','session_id' ],'required','message' => 'Ce champ est obligatoire'],
            [['member_id','session_id'],'integer','min' => 1],
            ['amount','integer','min' => 1,'message' => 'Ce champ attend un entier positif']
        ];
    }
}