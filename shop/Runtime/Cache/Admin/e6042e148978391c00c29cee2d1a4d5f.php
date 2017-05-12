<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>修改分类信息</title>
    <link href="/Public/Admin/css/mine.css" type="text/css" rel="stylesheet">
</head>
<body>

<div class="div_head">
        <span>
            <span style="float:left">当前位置是：商品管理-》修改分类信息</span>
            <span style="float:right;margin-right: 8px;font-weight: bold">
                <a style="text-decoration: none" href="/index.php/Admin/Category/showCategories">【分类列表】</a>
            </span>
        </span>
</div>
<div></div>

<p>contents

<form action="/index.php?m=Admin&amp;c=Category&amp;a=updateCategories&amp;cat_id=1" method="post">
    <table border="1" width="100%" class="table_a">
        <tr>
            <td>分类ID</td>
            <td><input type="text" name="cat_id" value="<?php echo ($cat_info["cat_id"]); ?>"></td>
        </tr>
        <tr>
            <td>父类ID</td>
            <td>
                <select name="parent_id" id="parent_id">
                    <option>请选择</option>
                    <option value="{}">{}</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>分类名称</td>
            <td><input type="text" name="cat_name" value="<?php echo ($cat_info["cat_name"]); ?>"></td>
        </tr>
        <tr>
            <td>添加时间</td>
            <td><input type="text" name="create_time" value="<?php echo ($cat_info["create_time"]); ?>" disabled></td>
        </tr>

        <tr>
            <td colspan="2" align="center"><input type="submit" value="修改"></td>
        </tr>
    </table>
    <!---->
    <!--<div class="row">-->
        <!--<label for="cat_id">分类ID</label>-->
        <!--<input type="text" id="cat_id" name="cat_id" value="<?php echo ($cat_info["cat_id"]); ?>">-->
    <!--</div>-->
    <!--<div class="row">-->
        <!--<label for="cat_name">分类名称</label>-->
        <!--<input type="text" name="cat_name" id="cat_name" value="<?php echo ($cat_info["cat_name"]); ?>">-->
    <!--</div>-->
</form>



</body>
</html>