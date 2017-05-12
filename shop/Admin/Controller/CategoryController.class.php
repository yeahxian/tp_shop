<?php
/**
 * Created by PhpStorm.
 * Author: efe
 * Date: 2017-03-13
 * Time: 23:32
 */

namespace Admin\Controller;


use Common\Controller\BaseController;

class CategoryController extends BaseController {
    public function index(){
        $this->display('index');
    }

    public function add(){
        $cat = D('Category');
        $cat_info = $cat->select();

        if (isset($_POST) && !empty($_POST)){
            $data = $cat->create();
            if (!$data){
                $this->error($cat->getError(),U('add'));
            }
            $status = $cat->add();
            if ($status){
                $this->redirect(U('showCategories'),array(),1,'添加成功');
            }
        }else{
            $this->assign('cat_info',$cat_info);
            $this->display('add');
        }
    }


    public function delete($id){
        //todo
        if (isset($id)){
            $category = D('Category');
            $result = $category->where(array('cat_id'=>$id))->delete();
            if (false === $result){
                $error = $category->getError();
//                $errorInfo = json_encode($error);
                echo json_encode(array('code'=>400,'message'=>"delete id:{$id} fail",'data'=>$error));
            }else{
                echo json_encode(array('code'=>200,'message'=>'successful','data'=>''));
            }
        }
    }



    //获取品牌信息
    protected function getBrand(){
        $brand = D("Brand");
        $brandInfo = $brand->select();
        return $brandInfo;
    }


    //分类列表
    public function showCategories(){
        $categories = D('Category');
        $category_info = $categories->select();

        $this->assign('category_info',$category_info);
        $this->display('categoryList');
    }

    //更新分析类信息
    public function updateCategories($cat_id=0){
        $cat = D('Category');
        $cat_info = $cat->where("cat_id=".$cat_id)->find();

        $this->assign('cat_info',$cat_info);
        $this->display('categoryUpdate');
    }


}