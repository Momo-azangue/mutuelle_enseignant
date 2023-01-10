<?php
/**
 * Created by PhpStorm.
 * User: medric
 * Date: 31/12/18
 * Time: 12:31
 */

namespace app\models\forms;


use yii\base\Model;

class NewAdministratorForm extends Model
{
    public $username;
    public $name;
    public $first_name;
    public $tel;
    public $email;
    public $address;
    public $avatar;
    public $password;

    public function rules()
    {
        return [
            [['username','name','first_name','tel','password','email','address'],'string','message' => 'Ce champ doit être du texte'],
            [['username','name','first_name','tel','password','email'],'required','message' => 'Ce champ est obligatoire'],
            [['email'],'email','message' => 'Ce champ doit être un email'],
            [['avatar'],'image','message' => 'Ce champ attend une image','extensions'=>'jpg,jpeg,png,gif'],
        ];
    }
}