<?php

namespace app\models\forms;

use yii\base\Model;


class AgapeForm extends Model
{
    public  $agape;


    public  function save(){
        if($this->validate()){

            //Créez une nouvelle instance de la classe Agape
            $agape = new Agape();
            $agape->value = $this->agape;

            //sauvegardez l'objet Agape dans la base de données
            $agape->save();

            //Retournez l'ID de l'objet Agape sauvegardé
            return $agape->id;
        } else {
            return false;
        }
    }


    public function rules()
    {
        return [
            [['agape'],'required','message' => 'Ce champ est obligatoire'],
            [['agape'],'integer','min' => 1,'message' => 'Ce champ attend un entier positif']
        ];
    }
}