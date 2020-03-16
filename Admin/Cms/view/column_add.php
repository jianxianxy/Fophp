<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
<?php include(APP.'/layout/_head.html');?>
</head>
<body>
<article class="cl pd-20">
    <div class="site-text site-block">
    <form method="post" class="layui-form">
        <div class="layui-form-item">
            <label class="layui-form-label">栏目名称</label>
            <div class="layui-input-inline">
                <input name="name" value="<?php $this->field('name');?>" lay-verify="required" placeholder="栏目名称" autocomplete="off" class="layui-input" type="text">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">父级栏目</label>
                <div class="layui-input-inline">
                    <select name="pid" lay-verify="required">
                    <option value="0">无</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">栏目排序</label>
            <div class="layui-input-inline">
                <input name="sort" value="<?php $this->field('sort');?>" lay-verify="required" placeholder="排序" autocomplete="off" class="layui-input" type="text">
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <input name="id" value="<?php $this->field('id');?>" autocomplete="off" class="layui-input" type="hidden">
                <button lay-submit="" lay-filter="subform" class="btn btn-primary radius" type="button"><i class="layui-icon">&#xe632;</i> 保存</button>
                <button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
            </div>
        </div>
    </form>
    </div>
</article>

<!--_footer 作为公共模版分离出去-->
<?php include(APP.'/layout/_foot.html');?>
<!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script>
//表单
layui.use('form', function(){
  var form = layui.form;
  //监听提交
  form.on('submit(subform)', function(data){
      $.post('<?php echo $this->action;?>',data.field,function(ret){
          if(ret.code == 0){
              layer.msg('保存成功', {icon:6,time:1200},function(){
                  layer_close();
              });
          }else{
              layer.msg(ret.msg, {icon:5,time:1200});
          }
      },"json");
      return false;
  });
});
</script>
</body>
</html>