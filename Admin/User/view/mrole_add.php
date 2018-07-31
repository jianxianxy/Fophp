<!DOCTYPE HTML>
<html>
<head>
<?php include(APP.'/layout/_head.html');?>
</head>
<body>
<article class="cl pd-20">
	<form class="layui-form">
        <div class="layui-form-item">
            <label class="layui-form-label">角色名称</label>
            <div class="layui-input-block">
                <input name="role_name" value="<?php $this->field('role_name');?>" lay-verify="required" placeholder="请输入角色名称" autocomplete="off" class="layui-input" type="text">
            </div>
        </div>
        <?php foreach($this->menu AS $val):?>
        <?php
            $menu = explode(',',$this->field('menu_ids','return'));
        ?>
        <div class="layui-form-item">
            <label class="layui-form-label"><?php echo $val['name'];?></label>
            <div class="layui-input-block" id="menu_<?php echo $val['id'];?>">
                <input type="checkbox" lay-filter="cheAll" value="<?php echo $val['id'];?>" title="全选" lay-skin="primary" <?php vTag($val['id'],$menu);?>>&nbsp;&nbsp;
                <?php foreach($val['child'] AS $v):?>
                <input type="checkbox" name="menu_ids[]" value="<?php echo $v['id'];?>" title="<?php echo $v['name'];?>" lay-skin="primary" <?php vTag($v['id'],$menu);?>> 
                <?php endforeach;?>
            </div>
        </div>
        <?php endforeach;?>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit="" lay-filter="formSubmit">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>
</article>

<!--_footer 作为公共模版分离出去-->
<?php include(APP.'/layout/_foot.html');?>
<!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script>
layui.use('form', function(){
  var form = layui.form;
  //监听提交
  form.on('submit(formSubmit)', function(data){
      $.post('<?php echo $this->action;?>',data.field,function(ret){
          if(ret.code == 0){
              layer.alert('保存成功',function(){
                layer_close();
              });
          }else{
            layer.alert(ret.msg, {icon: 5});
          }
      },"json");
      return false;
  });
  form.on('checkbox(cheAll)', function(data){
    var child = $("#menu_"+data.value).find('input[type="checkbox"]');
    child.each(function(index,item){
      item.checked = data.elem.checked;
    });
    form.render('checkbox');
  });
});
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>