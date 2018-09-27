<?php
/**
 * Created by PhpStorm.
 * User: mamedov
 * Date: 27.09.2018
 * Time: 20:32
 */

namespace app\controllers;



use app\models\User;
use core\base\Controller;
use core\system\Url;
use core\system\Auth as ModuleAuth;


class Auth extends Controller
{
    public function action_login(){
        try{
            if(empty($_POST["login"])||empty($_POST["pass"])) throw new \Exception("Pass or login is empty");
            if(!ModuleAuth::instance()->login($_POST["login"],$_POST["pass"])) throw new \Exception("Pass or login incorrect");
            Url::redirect($_SERVER["HTTP_REFERER"]);
        }catch (\Exception $e){
            echo $e->getMessage();
        }
    }
    public function action_register(){
        try{
            if(empty($_POST["login"])||empty($_POST["pass"])) throw new \Exception("Pass or login is empty");
            $user = new User();
            $user->login = $_POST["login"];
            $user->pass = $_POST["pass"];
            try{
                $user->save();
            }catch (\Exception $e){
                throw new \Exception("login already used");
            }
            echo "OK";
        }catch (\Exception $e){
            echo $e->getMessage();
        }

    }

    public function action_logout(){
        ModuleAuth::instance()->logout();
        Url::redirect($_SERVER["HTTP_REFERER"]);
    }
}