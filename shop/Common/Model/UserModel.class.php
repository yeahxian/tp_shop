<?php
/**
 * User: xian
 * Date: 17-4-13上午1:23
 */
namespace Common\Model;

class UserModel extends BaseModel {
    protected $_validate = array(
        array('username','require','请填用户名',1),
        array('password','require','密码不正确',1),
        array('repassword','password','密码不一致',1,'confirm'),
        array('user_sex','1,2,3','请选择性别',1,'in'),
        array('user_qq','/^[1-9]{1}\d{3,12}/','qq 格式不正确',0,'regex'),
        array('user_email','email','邮箱不正确'),
        array('user_tel','/^1[34568]\d{9}/','电话号码格式不正确',0,'regex'),
        array('user_xueli','require','请选择学历'),
        array('user_hobby','require','请选择爱好'),
//        array('user_introduce','',''),
    );

    protected $_auto = array(
        array('user_time','time',1,'function'),
        array('last_time','time',3,'function'),
    );


}