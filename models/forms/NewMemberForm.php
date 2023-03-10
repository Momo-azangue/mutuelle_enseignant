<?php
/**
 * Created by PhpStorm.
 * User: medric
 * Date: 26/12/18
 * Time: 13:41
 */
/**
 * modified by vs code
 * User: William Momo
 * Date: 06/01/2023
 * Time: 11:21
 */
namespace app\models\forms;
use app\models\User;
use Yii;


use yii\base\Model;

class NewMemberForm extends Model
{
    public $username;
    public $name;
    public $first_name;
    public $tel;
    public $email;
    public $address;
    public $avatar;
    public $password;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username','name','first_name','tel','password','email','address'],'string','message' => 'Ce champ attend du texte'],
            [['username','name','first_name','tel','password','email'],'required','message' => 'Ce champ est obligatoire'],
            [['email'],'email','message' => 'Ce champ attend un email'],
            [['avatar'],'image','message' => 'Ce champ attend une image'],
        ];
    } /**
    * Signs user up.
    *
    * @return bool whether the creating new account was successful and email was sent
    */
   public function singup()
   {
       if (!$this->validate()) {
           return null;
       }
       
       $user = new User();
       $user->username = $this->username;
       $user->name = $this->name;
       $user->first_name = $this->first_name;
       $user->tel = $this->tel;
       $user->email = $this->email;
       $user->adress = $this->adress;
       $user->setPassword($this->password);
       $user->generateAuthKey();
       $user->generateEmailVerificationToken();

       return $user->save() && $this->sendEmail($user);
   }

      /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}