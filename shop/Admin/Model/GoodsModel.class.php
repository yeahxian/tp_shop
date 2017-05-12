<?php
/**
 * Created by PhpStorm.
 * Author: efe
 * Date: 2017-03-14
 * Time: 0:14
 */

namespace Admin\Model;



use Think\Model\RelationModel;

class GoodsModel extends RelationModel {
    protected $_link = array(
        'Brand'=>array(
            'mapping_type'=>self::BELONGS_TO,
            'class_name'=>'Brand',
            'mapping_name'=>'brand',
            'foreign_key'=>'goods_brand_id',
            'mapping_fields'=>'id,name'
        )
    );


    protected $_validate = array(
        array('goods_name','require','请输入商品名'),
        array('goods_name','','该商品名已存在',1,'unique',1),
        array('goods_category_id','require','请选择分类'),
        array('goods_brand_id','require','请选择品牌'),
    );

    protected $_auto = array(
        array('goods_create_time','time',1,'function'),
        array('goods_last_time','time',3,'function'),
    );

    public function index(){
        //todo
    }
}