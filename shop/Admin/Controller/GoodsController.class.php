<?php
/**
 * Created by PhpStorm.
 * User: xian
 * Date: 17-3-18
 * Time: 下午10:53
 */

namespace Admin\Controller;


use Admin\Model\BrandModel;
use Common\Controller\BaseController;
use Think\Page;
use Think\Upload;

class GoodsController extends BaseController {

    public function index(){
        $this->display('goodsList');
    }

    //商品列表
    public function goodsList($brand_id=0){

        $goods = D('Goods');
        $goods_info = null;
        $brandInfo = $this->getBrand();

        //分页
        $count = $goods->count();
        $perPage = 20;
        $page = new Page($count,$perPage);


        // brand_id 不为0时，则是查询某个品牌的商品
        if ($brand_id != 0){
            $goods_info = $goods->where("goods_brand_id=".$brand_id)->select();
            $count = $goods->where("goods_brand_id=".$brand_id)->count();
            $page = new Page($count,$perPage);
        }else{
            $goods_info = $goods->limit($page->firstRow,$perPage)->select();
        }

        $show = $page->show();
        $this->assign('brandInfo',$brandInfo);
//        $this->assign("empty","<span class='empty'>没有数据</span>");
        $this->assign('goods_info',$goods_info);
        $this->assign('show',$show);
        $this->display('goodsList');
    }

    //添加商品
    public function add(){

        $imagePath = '';
        if (isset($_FILES)&&!empty($_FILES['goods_image']['name'])){
            $res = $this->upload($_FILES['goods_image'],"images");
            $imagePath = $res['path'];
        }

        if (isset($_POST)&&!empty($_POST)){
            $goods_data = $_POST;
            if ($imagePath){
                $goods_data['goods_big_img'] = $imagePath;
                $goods_data['goods_small_img'] = $imagePath;
            }
            $goods = D('Goods');
            $goods_data = $goods->create($goods_data);

            if ($goods_data){
                if (isset($goods_data['goods_id'])){  //跟新数据
                    $msg = $goods->save();
                    if (false === $msg){
                        $this->error('添加失败'.$goods->getError(), U('getNew'));
                    }else{
                        $this->success('添加成功',U('getNew'));
                    }
                }else{ // 插入数据

                    $msg = $goods->add();
                    if (false === $msg){
                        $this->error('添加失败'.$goods->getError(), U('add'));
                    }else{
                        $this->success('添加成功',U('add'));
                    }
                }

            }else{
                dump($goods->getError());
            }

        }else{

            $brandInfo = $this->getBrand();
            $cats = $this->getCategory();

            $this->assign('brandInfo',$brandInfo);
            $this->assign('cats',$cats);
            $this->display('add');
        }



    }

    //修改商品信息
    public function update($goods_id=0){

        $brand_info = $this->getBrand();

        $goods = D('Goods');
        $result = $goods->where("goods_id={$goods_id}")->find();


        $cat = $this->getCategory();

        $this->assign('categories',$cat);
        $this->assign('brand_info',$brand_info);
        $this->assign('goods_info',$result);
        $this->display('update');
    }

    //获取最新商品
    public function getNew($goods_brand_id=0){
        $goods_brand_id = intval($goods_brand_id);

        $brands = $this->getBrand();

        $goods = D('Goods');
        //分页
        $count = $goods->count();
        $perPage = 20;
        $page = new Page($count,$perPage);


        $goods_info = $goods->relation(true)->order('goods_create_time desc')->limit($page->firstRow,$perPage)->select();

        if ($goods_brand_id !== 0){
            $count = $goods->where('goods_brand_id='.$goods_brand_id)->count();
            $page = new Page($count,$perPage);
            $goods_info = $goods->relation(true)->where('goods_brand_id='.$goods_brand_id)->order('goods_create_time desc')->limit($page->firstRow,$perPage)->select();

        }

        $show = $page->show();
        $this->assign('goodsInfo',$goods_info);
        $this->assign('brands',$brands);
        $this->assign('show',$show);
        $this->display('zhanshi');
    }
    //获得品牌信息
    protected function getBrand(){
        $brand = D("Brand");
        $brandInfo = $brand->select();
        $brandInfo = $brand->format($brandInfo,0);
        return $brandInfo;
    }

    //获得分类信息
    public function getCategory(){
        $categories = D('Category');
        $cat = $categories->select();
        $cat = $categories->format($cat,0);
        return $cat;
    }

    //文件上传
    public function upload($file,$savePath){
        $upload = new Upload();
        $upload->maxSize = 10*1024*1024;
        $upload->exts = array("jpg","jpeg","png","gif");
        $upload->rootPath = realpath(dirname(APP_PATH))."/Public/Admin/";
        $upload->savePath = $savePath."/";
        $upload->saveName = 'time';
        $upload->autoSub = true;
        $upload->subName = array('date','Ymd');
        $res = $upload->uploadOne($file);

        if ($res){
            return array('status'=>1,'message'=>'success','path'=>$res['savepath'].$res['savename']);
        }else{
            return array('status'=>0,'message'=>$upload->getError(),'path'=>'');
        }

    }
    public function test(){
        $brand = new BrandModel();
        $data = $brand->select();
        $data = $brand->format($data);
        foreach ($data as $val) {
            echo str_repeat("|--",$val['level']).$val['name']."<br/>";
        }
    }

    public function test2(){
        $goods = D('Goods');
        $data = $goods->relation(true)->limit(5,5)->select();
        print_r($data);
    }
}