<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        layout("layout/layout");
        $this->display("index");
    }

    public function login(){
        $this->display('User/login');
    }

    public function _empty(){
        echo "don't exist";
    }

    public function test(){
        $this->display();
    }

}