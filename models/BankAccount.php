<?php

namespace app\models;


use \yii\base\Model;

class BankAccount extends Model {

    public $email;
    public $cardNumber;

    public $expirationDate;

    public $cvc;

    public $nameOnCard;

    public  $country;



    public function attributeLabels()
    {
        return [
            'email' => 'Email',
            'cardNumber' => 'Numéro sur la carte ',
            'expirationDate' => 'Date d\'Expiration',
            'cvc' => ' CVC',
            'nameOnCard' => 'Name on card '

        ];
    }
    public function rules()
    {
        return [
            // the name, email, subject and body attributes are required
            [['email', 'cardNumber', 'expirationDate', 'cvc', 'nameOnCard'], 'required'],

            // the email attribute should be a valid email address
            ['email', 'email'],
        ];
    }

}