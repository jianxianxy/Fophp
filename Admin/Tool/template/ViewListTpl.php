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
		资讯管理
		<span class="c-gray en">&gt;</span>
		资讯列表
		<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.reload();" title="刷新" >
            <i class="Hui-iconfont">&#xe68f;</i>
        </a>
	</nav>
	<div class="Hui-article">
		<article class="cl pd-20">
			<div>
				<span class="select-box inline">
				<select name="" class="select">
                    <?php foreach($this->menu AS $val):?>
                    <option value="<?php echo $val['id'];?>"><?php echo $val['name'];?></option>
                    <?php endforeach;?>
				</select>
				</span>
				名称：
				<input type="text" name="" id="" placeholder=" 名称" style="width:150px" class="input-text">
				<button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
			</div>
			<div class="cl pd-5 bg-1 bk-gray mt-20">
				<span class="l">
				<a class="btn btn-primary radius" data-title="添加菜单" onclick="tool_add('添加菜单','/Index/System/MenuAdd')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加菜单</a>
                <a href="javascript:;" onclick="upMenu()" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe603;</i> 更新菜单</a>
				</span>
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
<script type="text/javascript">
layui.use('table', function(){
  var table = layui.table;
  var trobj = table.render({
    elem: '#lay_table'
    ,url: '/{module}/{modelName}/Index'
    ,page: { //详细参数可参考 laypage 组件文档
      curr: 1
      ,layout: ['limit', 'prev', 'page', 'next', 'count','skip'] //自定义分页布局
    }
    ,cellMinWidth: 80
    ,cols: [[
      {type: 'checkbox'},
      {field:'id', title:'ID',width:80,unresize: true, sort: true},
      {field:'name', title:'名称'},
      {field:'pid', title:'上级菜单'},
      {field:'sort', title:'排序',width:80},
      {field:'link', title:'连接'},
      {field:'status', title:'状态',width:80},
      {field:'manage', title:'操作',width:200,align:'center'},
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

/*添加*/
function tool_add(title,url){
	layer_show(title,url,410,450);
}
/*编辑*/
function tool_edit(title,url){
	layer_show(title,url,410,450);
}
/*下架*/
function tool_del(obj,id){
	layer.confirm('确认要禁用吗？',function(flag){
		if(flag){
            $.post('/{module}/{modelName}/del',{"id":id,"status":0},function(ret){
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