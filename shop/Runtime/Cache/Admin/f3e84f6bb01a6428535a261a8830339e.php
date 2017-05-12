<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <title>分类列表</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <link href="/Public/Admin/css/mine.css" type="text/css" rel="stylesheet">
</head>

<body>

<div class="div_head">
            <span>
                <span style="float:left">当前位置是：商品管理-》分类列表</span>
                <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="/index.php/Admin/Manager/showList">【商品列表】</a>
                </span>
            </span>
</div>
<div></div>

<div style="font-size: 13px;margin: 10px 5px">

    <div style="font-size: 13px; margin: 10px 5px;">
        <table class="table_a" border="1" width="100%">
            <tbody><tr style="font-weight: bold;">
                <td>序号</td>
                <td>分类名称</td>
                <td>创建时间</td>
                <td align="center" colspan="2">操作</td>
            </tr>

            <?php if(is_array($category_info)): $i = 0; $__LIST__ = $category_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$category): $mod = ($i % 2 );++$i;?><tr id="product1">
                    <td><?php echo ($category["cat_id"]); ?></td>
                    <td><a href="#"><?php echo ($category["cat_name"]); ?></a></td>
                    <td><?php echo ($category["create_time"]); ?></td>
                    <td><a href="/index.php?m=Admin&c=Manager&a=updateCategories&cat_id=<?php echo ($category["cat_id"]); ?>">修改</a></td>
                    <td><a href="javascript:;" onclick="delete_product(1)">删除</a></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>



            <tr>
                <td colspan="20" style="text-align: center;">
                    [1]
                </td>
            </tr>
            </tbody>
        </table>
    </div>


</div>
</body>
</html>