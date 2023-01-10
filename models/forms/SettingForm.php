<?php
/**
 * Created by PhpStorm.
 * User: medric
 * Date: 01/01/19
 * Time: 23:10
 */

namespace app\models\forms;


use yii\base\Model;

class SettingForm extends Model
{
    public $interest;
    public $social_crown;
    public $inscription;


    public function rules()
    {
        return [
            [['interest','social_crown','inscription'],'required','message' => 'Ce champ est obligatoire'],
            [['interest','social_crown','inscription'],'integer','min' => 1,'message' => 'Ce champ attend un entier positif']
        ];
    }
}