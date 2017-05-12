<?php

namespace Admin\Model;
use Think\Model;

/**
 * Description of UserModel
 *
 * @author efe
 */
class UserModel extends Model {
    protected $_validate = array(
        array('username','require','请填用户名',1),
        array('password','','密码不正确',1),
        array('repassword','password','密码不一致',1,'confirm'),
        array('user_sex','0,1,2','请选择性别',1,'in'),
        array('user_qq','/^[1-9]{1}\d{3,12}/','qq 格式不正确',0,'regex'),
        array('user_email','email','邮箱不正确'),
        array('user_tel','/^1[34568]\d{9}/','电话号码格式不正确',0,'regex'),
//        array('user_xueli','',''),
//        array('user_hobby','',''),
//        array('user_introduce','',''),
    );

    protected $_auto = array(
        array('user_time','time',1,'function'),
        array('last_time','time',3,'function'),
    );

    public function index(){
        echo "some text";
    }
    
}
