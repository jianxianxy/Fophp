<!DOCTYPE HTML>
<html>
<head>
<?php include(LAY.'/_head.html');?>
</head>
<body>
<article class="cl pd-10">
    <div class="page-container">
        <form class="layui-form" action="<?php echo $this->action;?>">
            <div class="layui-form-item">
                <label class="layui-form-label">上级菜单</label>
                <div class="layui-input-inline">
                    <select name="pid" lay-verify="required">
                        <?php foreach ($this->menu AS $val): ?>
                            <option value="<?php echo $val['id']; ?>" <?php vTag($val['id'],$this->field('pid','return'),'selected')?>><?php echo $val['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">菜单名称</label>
                <div class="layui-input-inline">
                    <input name="name" value="<?php $this->field('name');?>" lay-verify="required" placeholder="请输入名称" class="layui-input" type="text">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">菜单排序</label>
                <div class="layui-input-inline">
                    <input name="sort" value="<?php $this->field('sort');?>" lay-verify="required" placeholder="请输入排序" class="layui-input" type="text">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">菜单图标</label>
                <div class="layui-input-inline">
                    <input name="icon" value="<?php $this->field('icon');?>" class="layui-input" type="text">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">菜单链接</label>
                <div class="layui-input-inline">
                    <input name="link" value="<?php $this->field('link');?>" class="layui-input" type="text">
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit="" lay-filter="formSubmit">立即提交</button>
                    <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                </div>
            </div>
        </form>
    </div>
</article>
<!--_footer 作为公共模版分离出去-->
<?php include(LAY.'/_foot.html');?>
<!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript">
//表单
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
});
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>