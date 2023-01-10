<?php
/**
 * Created by PhpStorm.
 * User: medric
 * Date: 30/12/18
 * Time: 17:27
 */

namespace app\managers;


class ColorManager
{
    static $T = ['0','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F'];

    private static function getRandomSymbol() {
        return self::$T[rand(0,15)];
    }

    public static function getColor() {
        return '#'.self::getRandomSymbol().self::getRandomSymbol()."A";
    }
}