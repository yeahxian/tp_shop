<?php
/**
 * Created by PhpStorm.
 * Author: efe
 * Date: 2017-03-12
 * Time: 23:37
 */

namespace Home\Controller;


use Think\Controller;

class GoodsController extends Controller{
    public function index(){
        $this->display('index');
    }

    public function category(){
        $this->display('category');
    }

    public function detail(){
        $this->display('detail');
    }

    public function cart(){
        $this->display('cart');
    }

    public function settleAccount(){
        $this->display('settleAccount');
    }

    public function deliveryAddress(){
        $this->display('deliveryAddress');
    }
}