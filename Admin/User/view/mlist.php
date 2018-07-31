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
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
		<span class="c-gray en">&gt;</span>
		管理员管理
		<span class="c-gray en">&gt;</span>
		管理员列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a> 
    </nav>
	<div class="Hui-article">
		<article class="cl pd-20">
			<div> 日期范围：
				<input type="text" onfocus="WdatePicker({maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}'})" id="datemin" class="input-text Wdate" style="width:120px;">
				-
				<input type="text" onfocus="WdatePicker({minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d'})" id="datemax" class="input-text Wdate" style="width:120px;">
				<input type="text" class="input-text" style="width:120px" placeholder="输入管理员名称" id="name">
				<button type="button" class="btn btn-success" onclick="tool_search();"><i class="Hui-iconfont">&#xe665;</i> 搜用户</button>
                <button type="button" class="btn btn-success" onclick="tool_add('添加资讯','/User/Manager/Add')" ><i class="Hui-iconfont">&#xe600;</i> 添加</button>
			</div>
			<div class="mt-20">
                <table id="lay_table" lay-filter="lay_table"></table>
			</div>
		</article>
	</div>
</section>

<!--_footer 作为公共模版分离出去--> 
<?php include(APP.'/layout/_foot.html');?>
<!--/_footer /作为公共模版分离出去--> 

<!--请在下方写此页面业务相关的脚本--> 
<script type="text/javascript" src="/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript">
layui.use('table', function(){
  var table = layui.table;
  var trobj = table.render({
    elem: '#lay_table'
    ,url: '/User/Manager/Index'
    ,page: { //详细参数可参考 laypage 组件文档
      curr: 1
      ,layout: ['limit', 'prev', 'page', 'next', 'count','skip'] //自定义分页布局
    }
    ,cellMinWidth: 80
    ,cols: [[
      {type: 'checkbox'},
      {field:'id', title:'ID',width:80, unresize: true, sort: true},
      {field:'name', title:'姓名',width:120},
      {field:'number', title:'工号',width:120},
      {field:'email', title:'邮箱'},
      {field:'role_id', title:'角色'},
      {field:'status', title:'状态',width:80},
      {field:'manage', title:'操作',width:120,align:'center'},
    ]]
  });
  //刷新
  fresh = function(cond){
      var cpage = $(".layui-input").val();
      trobj.reload({
        where: cond,
        page: {curr:cpage}
      });
  };
});
//搜索
function tool_search(){
    var name = $("#name").val();
    var data = {'name':name};
    fresh(data);
}
function tool_add(title,url){
    layer_show(title,url,800,620);
}
function tool_edit(title,url){
	layer_show(title,url,800,620);
}
function tool_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '',
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").remove();
				layer.msg('已删除!',{icon:1,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});		
	});
}
function tool_off(obj,id){
	layer.confirm('确认要禁用吗？',function(flag){
		if(flag){
            $.post('/User/Manager/Status',{"id":id,"status":0},function(ret){
                if(ret.code == 0){
                    fresh({});
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
            $.post('/User/Manager/Status',{"id":id,"status":1},function(ret){
                if(ret.code == 0){
                    fresh({});
                    layer.msg('操作成功!',{icon: 6,time:1000});
                }else{
                    layer.msg('操作失败!',{icon: 5,time:1000});
                }
            },"json");
        }
	});
}
/* 更才菜单 */
function upMenu(){
    $.get('/Index/System/MakeMenu/',{},function(data){
        if(data.code == 0){
            layer.msg('生成成功!',{icon: 6,time:1000});
        }else{
            layer.msg('生成失败!',{icon: 5,time:1000});
        }
    },"json");
}
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>

