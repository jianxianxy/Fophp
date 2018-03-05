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
                <div class="layui-inline">
                    <label class="layui-form-label">姓名</label>
                    <div class="layui-input-inline">
                        <input name="name" value="<?php $this->field('name');?>" lay-verify="required" placeholder="请输入姓名" autocomplete="off" class="layui-input" type="text">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">工号</label>
                    <div class="layui-input-inline">
                        <input name="number" value="<?php $this->field('number');?>" lay-verify="required" placeholder="请输入工号" autocomplete="off" class="layui-input" type="text">
                    </div>
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label">手机</label>
                    <div class="layui-input-inline">
                        <input name="phone" value="<?php $this->field('phone');?>" lay-verify="phone" placeholder="请输入手机" autocomplete="off" class="layui-input" type="text">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">邮箱</label>
                    <div class="layui-input-inline">
                        <input name="email" value="<?php $this->field('email');?>" lay-verify="email" placeholder="请输入邮箱" autocomplete="off" class="layui-input" type="text">
                    </div>
                    <div class="layui-form-mid layui-word-aux"></div>
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label">角色</label>
                    <div class="layui-input-inline">
                        <select name="role_id" lay-verify="required">
                            <?php foreach ($this->role AS $val): ?>
                                <option value="<?php echo $val['id']; ?>" <?php vTag($val['id'],$this->field('role_id','return'),'selected')?>><?php echo $val['role_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>   
                <div class="layui-inline">
                    <label class="layui-form-label">密码</label>
                    <div class="layui-input-inline">
                        <input name="password" lay-verify="" lay-vertype="tips" placeholder="请输入密码" autocomplete="off" class="layui-input" type="password">
                    </div>
                    <div class="layui-form-mid layui-word-aux"></div>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">性别</label>
                <div class="layui-input-block">
                    <input name="sex" value="1" title="男" type="radio" <?php vTag(1,$this->field('sex','return'))?>>
                    <input name="sex" value="0" title="女" type="radio" <?php vTag(0,$this->field('sex','return'))?>>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">图片</label>
                <div class="layui-input-block">
                    <div class="layui-upload-drag" id="upImg">
                        <i class="layui-icon">&#xe67c;</i>
                        <p>上传图片</p>
                    </div>
                </div>
            </div>
            <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">简介</label>
                <div class="layui-input-block">
                    <textarea name="desc" placeholder="请输入内容" class="layui-textarea"><?php $this->field('desc');?></textarea>
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
//图片上传
layui.use('upload', function(){
    var upload = layui.upload;
    upload.render({
      elem: '#upImg',
      field: 'upfile', //ueditor接收不可修改
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
            var hidden = '<input type="hidden" name="picture" value="'+res.url+'">';
            $("#upImg").html(img+hidden);
        }
      },
      error: function(){
        return layer.msg('上传失败');
      }
    });
});
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