<?php
/**
 * Created by PhpStorm.
 * Author: efe
 * Date: 2017-03-14
 * Time: 1:58
 */

namespace Admin\Model;


use Think\Model;

class CategoryModel extends Model {
    protected $_validate = array(
        array('cat_name','require','分类名称为必填字段'),
        array('cat_name','','该类名已存在',1,'unique',3),
        array('parent_id','require','请选择父类id'),
    );



    /** 重排数组，将同一大类的数据摆放到一起以便格式化
     * @param array $arr
     * @param int $parentId
     * @param int $level
     * @return array
     */
    public function format(array $arr, $parentId=0, $level = 0){

        $data = array();
        foreach ($arr as $item=>$value){
            if ($value['parent_id'] == $parentId){
                $value['level'] = $level;
                $data[] = $value;
//               $data[] = $this->format($arr,$value['id'],$level+1);
                $data = array_merge($data,$this->format($arr,$value['id'],$level+1));
            }

        }
        return $data;
    }
}