<?php

namespace app\models;


use \yii\base\Model;

use Stripe\Stripe;

use Luhn\Luhn;

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
            'nameOnCard' => 'Nom sur la carte '

        ];
    }
    public function rules()
    {
        return [
            // the name, email, subject and body attributes are required
            [['email', 'cardNumber', 'expirationDate', 'cvc', 'nameOnCard'], 'required'],

            // the email attribute should be a valid email address
            ['email', 'email'],
            ['cardNumber', 'validateCardNumber'],
            ['expirationDate','validateExpiration'],
            ['cvc','validateCvc']
        ];
    }

    public function validateCardNumber($attribute, $params){
        $cardNumber = $this->$attribute;
        $luhn = new Luhn();
        if(!$luhn->isValid($cardNumber)){
            $this->addError($attribute, 'Numéro de carte invalide.');
        }
    }
    public  function  validateExpiration($attribute, $params){
        $expirationDate = $this->$attribute;
        $luhn = new Luhn();
        if(!$luhn->isValid($expirationDate)){
            $this->addError($attribute, 'Date d\'expiration invalide.');
        }
    }

    public  function  validateCvc($attribute, $params){
        $cvc = $this->$attribute;

        $luhn = new Luhn();

        if(!$luhn->isValid($cvc)){
            $this->addError($attribute, 'Code CVC invalide.');
        }
    }
}