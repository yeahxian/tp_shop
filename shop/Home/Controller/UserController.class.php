<?php
/**
 * Created by PhpStorm.
 * Author: efe
 * Date: 2017-03-13
 * Time: 0:04
 */

namespace Home\Controller;


use Common\Model\UserModel;
use Think\Controller;

class UserController extends Controller{
    public function index(){

    }

    public function login(){
        layout('layout/layout');
        $this->display('login');
    }

    public function register(){
        layout('layout/layout');
        $user = new UserModel();

        if (isset($_POST) && !empty($_POST)){

            $_POST['password'] = md5(C('MD5_KEY').$_POST['password']);
            $_POST['repassword'] = md5(C('MD5_KEY').$_POST['repassword']);
            if (!empty($_POST['user_hobby'])){
                $_POST['user_hobby'] = implode(',',$_POST['user_hobby']);
            }

            $data = $user->create();
            if (!$data){
                $this->error('发生错误: '.$user->getError(),U('register'));
            }
            $ret = $user->add();
            if ($ret){
                unset($data['password']);
                $_SESSION['user'] = serialize($data);
                $this->success('注册成功',U('Index/index'));
            }

        }else{
            $this->display('register');
        }



    }

    public function memberCenter(){
        $this->display('memberCenter');
    }

    public function memberAddress(){
        $this->display('memberAddress');
    }

    public function memberOrder(){
        $this->display('memberOrder');
    }

}