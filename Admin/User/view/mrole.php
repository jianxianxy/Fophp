<!DOCTYPE HTML>
<html>
<head>
<?php include(APP.'/layout/_head.html');?>
</head>
<body>
<!--_header 作为公共模版分离出去-->
<?php include(APP.'/layout/_top.html');?>
<!--/_header 作为公共模版分离出去-->

<!--_menu 作为公共模版分离出去-->
<?php include(APP.'/layout/_menu.html');?>
<!--/_menu 作为公共模版分离出去-->

<section class="Hui-article-box">
	<nav class="breadcrumb"><i class="layui-icon">&#xe68e;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 角色管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="layui-icon">&#x1002;</i></a></nav>
	<div class="Hui-article">
		<article class="cl pd-20">
			<div class="cl pd-5 bg-1 bk-gray"> 
                <span class="l"> 
                    <a class="btn btn-primary radius" href="javascript:;" onclick="tool_add('添加角色','/User/Manager/RoleAdd','800')">
                        <i class="layui-icon">&#xe654;</i> 添加角色
                    </a> 
                </span> 
            </div>
			<div class="mt-10">
                <table id="lay_table" lay-filter="lay_table"></table>
			</div>
		</article>
	</div>
</section>

<!--_footer 作为公共模版分离出去-->
<?php include(APP.'/layout/_foot.html');?>
<!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript">
layui.use('table', function(){
  var table = layui.table;
  var trobj = table.render({
    elem: '#lay_table'
    ,url: '/User/Manager/Role'
    ,page: { //详细参数可参考 laypage 组件文档
      curr: 1
      ,layout: ['limit', 'prev', 'page', 'next', 'count','skip'] //自定义分页布局
    }
    ,cellMinWidth: 80
    ,cols: [[
      {field:'id', title:'ID', unresize: true, sort: true},
      {field:'role_name', title:'角色名称'},
      {field:'status', title:'状态'},
      {field:'manage', title:'操作'},
    ]]
  });
  //刷新
  fresh = function(){
      var cpage = $(".layui-input").val();
      trobj.reload({
        where: {},
        page: {curr:cpage}
      });
  }
});
function tool_add(title,url){
    layer_show(title,url,800,620);
}
function tool_edit(title,url){
	layer_show(title,url,800,620);
}
function tool_off(obj,id){
	layer.confirm('确认要禁用吗？',function(flag){
		if(flag){
            $.post('/Index/System/MenuStatus',{"id":id,"status":0},function(ret){
                if(ret.code == 0){
                    fresh();
                    layer.msg('操作成功!',{icon: 6,time:1000});
                }else{
                    layer.msg('操作失败!',{icon: 5,time:1000});
                }
            },"json");
        }
	});
}
function tool_on(obj,id){
	layer.confirm('确认要启用吗？',function(flag){
        if(flag){
            $.post('/Index/System/MenuStatus',{"id":id,"status":1},function(ret){
                if(ret.code == 0){
                    fresh();
                    layer.msg('操作成功!',{icon: 6,time:1000});
                }else{
                    layer.msg('操作失败!',{icon: 5,time:1000});
                }
            },"json");
        }
	});
}
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>