<!DOCTYPE HTML>
<html>
<head>
<?php include(LAY.'/_head.html');?>
</head>
<body>
<article class="cl pd-20">
    <div class="site-text site-block">
        <form class="layui-form" action="">
            <div class="layui-form-item">
                <label class="layui-form-label">输入框</label>
                <div class="layui-input-block">
                    <input name="title" lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input" type="text">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">密码框</label>
                <div class="layui-input-inline">
                    <input name="password" lay-verify="required" lay-vertype="tips" placeholder="请输入密码" autocomplete="off" class="layui-input" type="password">
                </div>
                <div class="layui-form-mid layui-word-aux">辅助文字</div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">选择框</label>
                <div class="layui-input-block">
                    <select name="city" lay-verify="required">
                        <option value=""></option>
                        <option value="0">北京</option>
                        <option value="1">上海</option>
                        <option value="2">广州</option>
                        <option value="3">深圳</option>
                        <option value="4">杭州</option>
                    </select><div class="layui-unselect layui-form-select"><div class="layui-select-title"><input placeholder="请选择" value="" readonly="" class="layui-input layui-unselect" type="text"><i class="layui-edge"></i></div><dl class="layui-anim layui-anim-upbit"><dd lay-value="" class="layui-select-tips">请选择</dd><dd lay-value="0" class="">北京</dd><dd lay-value="1" class="">上海</dd><dd lay-value="2" class="">广州</dd><dd lay-value="3" class="">深圳</dd><dd lay-value="4" class="">杭州</dd></dl></div>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">复选框</label>
                <div class="layui-input-block">
                    <input name="like[write]" title="写作" type="checkbox"><div class="layui-unselect layui-form-checkbox" lay-skin=""><span>写作</span><i class="layui-icon"></i></div>
                    <input name="like[read]" title="阅读" checked="" type="checkbox"><div class="layui-unselect layui-form-checkbox layui-form-checked" lay-skin=""><span>阅读</span><i class="layui-icon"></i></div>
                    <input name="like[dai]" title="发呆" type="checkbox"><div class="layui-unselect layui-form-checkbox" lay-skin=""><span>发呆</span><i class="layui-icon"></i></div>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">开关</label>
                <div class="layui-input-block">
                    <input name="switch" lay-skin="switch" lay-text="ON|OFF" lay-filter="switchTest" value="1" type="checkbox"><div class="layui-unselect layui-form-switch" lay-skin="_switch"><em>OFF</em><i></i></div>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">单选框</label>
                <div class="layui-input-block">
                    <input name="sex" value="男" title="男" type="radio"><div class="layui-unselect layui-form-radio layui-form-radioed"><i class="layui-anim layui-icon layui-anim-scaleSpring"></i><div>男</div></div>
                    <input name="sex" value="女" title="女" checked="" type="radio"><div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i><div>女</div></div>
                </div>
            </div>
            <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">文本域</label>
                <div class="layui-input-block">
                    <textarea name="desc" placeholder="请输入内容" class="layui-textarea"></textarea>
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

layui.use('upload', function(){
    var upload = layui.upload;
    upload.render({
      elem: '#upImg',
      field: 'upfile',
      url: '/lib/ueditor/1.4.3/php/controller.php?action=uploadimage',
      size: 300, //限制文件大小，单位 KB
      accept: 'file',
      exts: "jpg|png|gif|bmp|jpeg|pdf",
      done: function(res){
        //如果上传失败
        if(res.state != 'SUCCESS'){
          return layer.msg('上传失败');
        }else{
            var img = '<img src="'+res.url+'" width="100" height="100">';
            $("#upImg").html(img);
        }
      },
      error: function(){
        return layer.msg('上传失败');
      }
    });
});
layui.use('form', function(){
  var form = layui.form;
  //监听提交
  form.on('submit(formSubmit)', function(data){
    layer.msg(JSON.stringify(data.field));
    return false;
  });
});
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>