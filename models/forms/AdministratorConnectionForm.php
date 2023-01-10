<?php
/**
 * Created by PhpStorm.
 * User: medric
 * Date: 24/12/18
 * Time: 17:43
 */

namespace app\models\forms;


use yii\base\Model;

class AdministratorConnectionForm extends Model
{
    public $username;
    public $password;
    public $remember;

    public function rules()
    {
        return [
            [['username','password'],'required','message' => 'Ce champ est obligatoire'],
            [['username','password'],'string','message' => 'Ce champ doit être du texte'],
            [['remember'],'boolean'],
        ];
    }
}