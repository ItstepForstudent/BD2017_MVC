<?php

namespace app\controllers;

use app\models\Post;
use app\models\User;
use core\base\Controller;
use core\base\View;
use core\system\database\Database;
use core\system\database\DatabaseQuery;

class Main extends Controller
{
    public function action_index()
    {
//        $v = new View("main");
//        $v->text="hello main page";
//        $v->header="HELLO";
//        $v->x=[1,2,3,4,5,6];
//        $v->setTemplate();
//        echo $v->render();
       // User::insert(["name"=>"oleg","pass"=>"233"]);
//        User::where("pass","?")->delete(["0000"]);
////        //$users = User::where("id",">",":minid")->all(["minid"=>4]);
////        User::where("name","'oleg'")->update(["pass"=>"olegoleg5"]);
////        $users = User::all();
////        $users[0]->dump();
////        echo "<pre>";
////        print_r($users);

//        $user = User::where("name",'?')->first(["Alexandr"]);
//        $posts =  $user->posts()->all();
//        echo "<pre>";
//        foreach ($posts as $post){
//            var_dump($post);
//        }
        $post = Post::where("id",1)->first();
        var_dump($post->author());

    }

    public function action_test()
    {
        echo "test";
    }
}