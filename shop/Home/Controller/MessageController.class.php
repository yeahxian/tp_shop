<?php
/**
 * Created by PhpStorm.
 * Author: efe
 * Date: 2017-03-13
 * Time: 21:30
 */

namespace Home\Controller;


use Think\Controller;

class MessageController extends Controller {
    public function index(){
        $message = D('message');
        $result = $message->limit(10)->select();
//        print_r($result);
        dump($result);
        dump($message);

    }
}