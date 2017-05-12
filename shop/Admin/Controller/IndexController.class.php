<?php
namespace Admin\Controller;
use Common\Controller\BaseController;

class IndexController extends BaseController {

    public function index(){
        if (!isset($_SESSION['user'])){
            $this->redirect('User/login');
        }
//        var_dump($_SESSION['user']);
        $this->display('index');
    }


    public function head(){
        $this->display('head');
    }

    public function left(){
        $this->display("left");
    }

    public function right(){
        $this->display("right");
    }
}