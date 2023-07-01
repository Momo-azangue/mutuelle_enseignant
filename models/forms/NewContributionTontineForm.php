<?php
/**
 * Created by PhpStorm.
 * User: medric
 * Date: 31/12/18
 * Time: 16:58
 */

namespace app\models\forms;


use yii\base\Model;

class NewContributionTontineForm extends Model
{
    public $member_id;
    public $date;
    public $tontine_id;

    public function rules()
    {
        return [
            [['member_id','tontine_id'],'integer','min' => 1,'message' => 'Ce champ attend un entier positif'],
            ['date','datetime','format' => 'yyyy-M-d','message' => 'Ce champ attend une date'],
            [['date','member_id','tontine_id'],'required','message' => 'Ce champ est obligatoire']
        ];
    }
}