<?php
/**
 * Created by PhpStorm.
 * User: medric
 * Date: 27/12/18
 * Time: 12:35
 */

namespace app\models\forms;


use yii\base\Model;

class UpdatePasswordForm extends Model
{
    public $password;

    public $new_password;
    public $confirmation_new_password;

    public function rules()
    {
        return [
            [['password','new_password','confirmation_new_password'],'required','message' => 'Ce champ est obligatoire'],
            [['password','new_password','confirmation_new_password'],'string','message' => 'Ce champ attend du texte'],
            [['confirmation_new_password'],'compare','compareAttribute' => 'new_password','message'=>'Le mot de passe ne correspond pas.']
        ];
    }


}