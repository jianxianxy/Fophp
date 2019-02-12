<!DOCTYPE HTML>
<html>
<head>
<?php include(APP.'/layout/_head.html');?>
<link rel="stylesheet" href="/lib/layui/dist/css/layui.css">
</head>
<body>
<!--_header 作为公共模版分离出去-->
<?php include(APP.'/layout/_top.html');?>
<!--/_header 作为公共模版分离出去-->

<!--_menu 作为公共模版分离出去-->
<?php include(APP.'/layout/_menu.html');?>
<!--/_menu 作为公共模版分离出去-->

<section class="Hui-article-box">
	<nav class="breadcrumb">
        <i class="Hui-iconfont">&#xe67f;</i> 首页
		<span class="c-gray en">&gt;</span>资讯管理
		<span class="c-gray en">&gt;</span>资讯列表
	</nav>
	<div class="Hui-article">
		<article class="cl pd-20">
			<div>
				<span class="select-box inline">
				<select id="seasel" class="select">
					<option value="0">全部栏目</option>
                    <?php foreach($this->column AS $val):?>
                    <option value="<?php echo $val['id'];?>"><?php echo $val['name'];?></option>
                    <?php endforeach;?>
				</select>
				</span>
                栏目关键字：<input type="text" name="name" style="width:100px;" placeholder="栏目名称" class="input-text">
				<button class="btn btn-success" type="submit" id="search"><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
                <a class="btn btn-primary radius" data-title="添加资讯" _href="article-add.html" onclick="winAdd('添加栏目','/Cms/Column/Add')" href="javascript:;">
                    <i class="Hui-iconfont">&#xe600;</i> 添加栏目
                </a>
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
<script type="text/javascript" src="/lib/layui/dist/layui.js"></script>
<script type="text/javascript">
//列表
layui.use('table',function() {
    var table = layui.table;
    table.render({
        elem: '#lay_table',
        url: '/Cms/Column/index',
        page: { //详细参数可参考 laypage 组件文档
            curr: 1,
            layout: ['limit', 'prev', 'page', 'next', 'count', 'skip'] //自定义分页布局
        },
        cellMinWidth: 80,
        cols: [[
            {type: 'checkbox'},
            {field:'id', title:'ID', unresize: true, sort: true},
            {field:'name', title:'标题'},
            {field:'pid', title:'分类'},
            {field:'status', title:'状态'},
            {field:'manage', title:'操作'},
        ]]
    });
});    
//搜索
$("#search").click(function() {
    var table = layui.table;
    var pid = $("#seasel").val();
    var name = $.trim($("input[name='name']").val());
    var seaData = {"name":name,"pid":pid};
    table.reload('lay_table', {
        page: {
            curr: 1
        },
        where: seaData
    });
});
/*资讯-添加*/
function winAdd(title,url){
    layer_show(title,url,350,300);
}
/*资讯-编辑*/
function winEdit(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*资讯-删除*/
function winDel(obj,id){
	layer.confirm('确认要删除吗？',function(){
		$.ajax({
			type: 'POST',
			url: '/Cms/Column/del?id='+id,
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

/*资讯-审核*/
function winApp(id,mod){
    var manage = "禁用";
    if(mod == 1){
        manage = "启用";
    }
	layer.confirm('确认要'+manage+'么？', {
		btn: ['确定','取消'], 
		shade: false,
		closeBtn: 0
	},
	function(){
		layer.msg('操作成功', {icon:6,time:1000});
	});	
}
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>