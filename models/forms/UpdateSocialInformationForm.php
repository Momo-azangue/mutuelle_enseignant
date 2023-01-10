<?php
/**
 * Created by PhpStorm.
 * User: medric
 * Date: 27/12/18
 * Time: 12:30
 */

namespace app\models\forms;


use yii\base\Model;

class UpdateSocialInformationForm extends Model
{
    public $username;
    public $name;
    public $first_name;
    public $tel;
    public $email;
    public $address;
    public $avatar;

    public function rules()
    {
        return [
            [['username','name','first_name','tel','email'],'required','message' => 'Ce champ est obligatoire'],
            [['username','name','first_name','tel','email','address'],'string','message' => 'Ce champ attend du texte'],
            ['email','email','message' => 'Ce champ attend un email'],
            ['avatar','image','message' => 'Ce champ attend une image','extensions'=>'jpg,jpeg,png,gif']
        ];
    }
}