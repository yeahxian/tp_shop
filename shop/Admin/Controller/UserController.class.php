<?php
/**
 * Created by PhpStorm.
 * Author: efe
 * Date: 2017-03-12
 * Time: 22:30
 */

namespace Admin\Controller;


use Think\Controller;
use Think\Verify;

class UserController extends Controller{
    public function index(){

    }

    public function login(){
        dump($_POST);
        dump($_SESSION);
        $verify = new Verify();
//        if ($verify->check($_POST['captcha'])){
//            $_SESSION['user'] = serialize($_POST);
//            $this->redirect(U('Index/index'));
//        }
        $this->display("login");
    }

    public function verify(){
        $verify = new Verify();
        $verify->imageW = 100;
        $verify->imageH = 30;
        $verify->fontSize = 14;
        $verify->length = 4;
        $verify->fontttf = '4.ttf';
        $verify->entry();
    }
}