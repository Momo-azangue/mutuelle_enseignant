<?php
/**
 * Created by PhpStorm.
 * User: medric
 * Date: 8/14/18
 * Time: 9:06 PM
 */



namespace app\managers;

use app\models\User;
use Yii;
use yii\web\UploadedFile;

class FileManager
{
    static $format = [256,512,1024];

    public static function getWeb() {
        return Yii::getAlias("@web");
    }
    public static function getBase() {
        return Yii::getAlias("@web").'/storage';
    }

    /*public static function storeImage(UploadedFile $image,$path,$name) {
        if ($path[strlen($path)-1] != '/' )
            $path .= '/';
        $link = self::getBase().$path.$name.'.'.$image->getExtension();
        $image->saveAs($link);

        self::create_format_folder($path);
        foreach (self::$format as $item){
            self::put_image($image,$item,$link,$path,$name.'.'.$image->getExtension());
        }
        return $name.'.'.$image->getExtension();
    }*/

    public static function loadImage($path) {
        if(!$path == null){
            return self::getWeb().'/img/upload/'.$path;
        }else{
            return self::getWeb(). 'img/members.png';
        }
        
    }

    public static function deleteImage($file_name,$path) {
        if ($path[strlen($path)-1] != '/' )
            $path .= '/';

        unlink(self::getBase().$path.$file_name);
        foreach (self::$format as $item) {
            unlink(self::getBase().$path.$item."/".$file_name);
        }
    }

    public static function storeAvatar(UploadedFile $image, $username, $type) {
        if ($type == 'ADMINISTRATOR') {
            return self::storeImage($image,Yii::getAlias("@admin_avatar_path"),$username);
        }
        if ($type == 'MEMBER') {
            return self::storeImage($image,Yii::getAlias("@member_avatar_path"),$username);
        }
    }

    public static function loadAvatar(User $user, $format = "256") {
        if ($user->type === 'ADMINISTRATOR') {
            if ($user->avatar)
                return self::loadImage($user->avatar,Yii::getAlias("@admin_avatar_path"),$format);
            else
                return Yii::getAlias('@web').'/img/administrator.jpg';
        }
        else {
            if ($user->avatar)
                return self::loadImage($user->avatar,Yii::getAlias("@member_avatar_path"),$format);
            else
                return Yii::getAlias('@web').'/img/members.png';
        }
    }

    private static function put_image(UploadedFile $image,$size,$link,$path,$name) {
        $img1024 = self::resize_image($image,$link,$size,$size);
        $path = self::getBase().$path.$size."/".$name;
        switch (strtoupper($image->getExtension()) ) {
            case "png":
                imagepng($img1024,$path);
                break;
            case "jpg":
                imagejpg($img1024,$path);
                break;
            case "jpeg":
                imagejpeg($img1024,$path);
                break;
            case "gif":
                imagegif($img1024,$path);
                break;
            default:
                imagepng($img1024,$path);
                break;
        }
    }

    private static function create_format_folder($path) {
        $path = self::getBase().$path;
        foreach (FileManager::$format as $item) {
            $a = $path.$item;
            if (!is_dir($a))
                mkdir($a);
        }
    }

    private static function resize_image(UploadedFile $file,$link, $w, $h, $crop=FALSE) {
        list($width, $height) = getimagesize($link);
        $r = $width / $height;
        if ($crop) {
            if ($width > $height) {
                $width = ceil($width-($width*abs($r-$w/$h)));
            } else {
                $height = ceil($height-($height*abs($r-$w/$h)));
            }
            $newwidth = $w;
            $newheight = $h;
        } else {
            if ($w/$h > $r) {
                $newwidth = $h*$r;
                $newheight = $h;
            } else {
                $newheight = $w/$r;
                $newwidth = $w;
            }
        }


        switch (strtoupper($file->getExtension())) {
            case "png" :
                $src = imagecreatefrompng($link);
                break;
            case "jpg":
                $src = imagecreatefromjpg($link);
                break;
            case "jpeg":
                $src = imagecreatefromjpeg($link);
                break;
            case "gif":
                $src = imagecreatefromgif($link);
                break;
            default:
                $src = imagecreatefrompng($link);
                break;
        }

        $dst = imagecreatetruecolor($newwidth, $newheight);
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

        return $dst;
    }

}