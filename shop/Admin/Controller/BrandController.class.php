<?php
/**
 * Created by PhpStorm.
 * User: xian
 * Date: 17-4-4
 * Time: 下午6:53
 */

namespace Admin\Controller;


use Common\Controller\BaseController;

class BrandController extends BaseController{
    public function index(){
        $this->display('index');
    }

    public function add(){
        $brands = D('Brand');
        $data = $brands->select();
        $data = $brands->format($data);

        if (isset($_POST)&&!empty($_POST)){
            dump($_POST);
            $postData = $brands->create($_POST);
            dump($postData);
            if (!$brands->create($_POST)){
                exit($brands->getError());
            }
            $ret = $brands->add();
            if (false !== $ret){
                $this->redirect(U('Brand/add'),[],3,'添加成功');
            }else{
                $this->error('添加失败',U('Brand/add'));
            }
        }

        $this->assign('brand_info',$data);
        $this->display('add');
    }
}