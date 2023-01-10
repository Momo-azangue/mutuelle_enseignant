<?php
/**
 * Created by PhpStorm.
 * User: medric
 * Date: 29/12/18
 * Time: 19:56
 */

namespace app\models\forms;


use yii\base\Model;

class NewBorrowingForm extends Model
{
    public $member_id;
    public $amount;
    public $session_id;

    public function rules()
    {
        return [
            [['member_id','amount','session_id' ],'required','message' => 'Ce champ est obligatoire'],
            [['member_id','session_id'],'integer','min' => 1,'message' => 'Ce champ attend une entier positif'],
            ['amount','integer','min' => 1,'message' => 'Ce champ attend un entier positif']
        ];
    }
}