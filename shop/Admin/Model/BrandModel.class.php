<?php
/**
 * Created by PhpStorm.
 * User: xian
 * Date: 17-3-18
 * Time: 下午3:01
 */

namespace Admin\Model;


use Think\Model;

class BrandModel extends Model {
   protected $_validate = array(
       array('name','require','品牌名为必填选项'),
       array('name','','该品牌已存在',1,'unique',1),
       array('parent_id','require','请选择父品牌')
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