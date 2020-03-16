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
        <i class="layui-icon">&#xe68e;</i> 首页
		<span class="c-gray en">&gt;</span>资讯管理
		<span class="c-gray en">&gt;</span>资讯列表
	</nav>
	<div class="Hui-article">
		<article class="cl pd-20">
            <div>
                选择状态：
                <span class="select-box inline">                    
                    <select id="seasel" class="select">
                        <option value="-1">全部</option>
                        <option value="0">未审核</option>
                        <option value="1">已通过</option> 
                        <option value="2">未通过</option> 
                    </select>
				</span>
                关键字：<input type="text" name="name" style="width:100px;" placeholder="房型名称" class="input-text">
				<button class="btn btn-success" type="submit" id="search"><i class="layui-icon">&#xe615;</i> 搜索</button>
                <button class="btn btn-success" type="button" onclick="verifyMore();">启用</button>
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
        id : 'lay_table',
        elem: '#lay_table',
        url: '/Match/Word/index',
        page: { //详细参数可参考 laypage 组件文档
            curr: 1,
            layout: ['limit', 'prev', 'page', 'next', 'count', 'skip'] //自定义分页布局
        },
        cellMinWidth: 80,
        cols: [[
            {type: 'checkbox'},
            {field:'id', title:'ID', unresize: true, sort: true},
            {field:'base', title:'房型名称'},
            {field:'word_pure', title:'纯净分词'},
            {field:'is_pure', title:'确认状态'},
            {field:'manage', title:'操作'}
        ]]
    });
});    
//搜索
$("#search").click(function() {
    var table = layui.table;
    var status = $("#seasel").val();
    var name = $.trim($("input[name='name']").val());
    var seaData = {"name":name,"status":status};
    table.reload('lay_table', {
        page: {
            curr: 1
        },
        where: seaData
    });
});

//审核
function verify(id,mod){
    $.post('/Match/Word/Verify/',{"id":id,'value':mod},function(ret){
        if(ret.code == 0){
            location.reload();
        }else{
            layer.msg('操作失败', {icon:7,time:1000});
        }
    },"json");
}
//批量审核
function verifyMore(){
    var table = layui.table;
    var checkStatus = table.checkStatus("lay_table");
    var data = checkStatus.data;
    var pure = [];
    for(var i in data){
        pure.push($.trim(data[i].word_pure));
    }
    $.post('/Match/Word/verifyMore/',{"pure":pure},function(ret){
        if(ret.code == 0){
            location.reload();
        }else{
            layer.msg('操作失败', {icon:7,time:1000});
        }
    },"json");
}
//编辑
function edit(btn){
    var td = $(btn).parent().parent();
    var data = {};
    var word_pure = '';
    td.siblings("td").each(function(){
        var index = $(this).data("field");        
        if(index == 'word_pure'){
            word_pure = $(this);
        }
        var value = $(this).text();
        data[index] = value;
    });
    var layIndex = layer.open({type: 1,area: ['320px', '150px'],closeBtn: 1,shadeClose: true,title: "修改",btn: ['确认'],
        content: '<input type="text" id="newVal" value="'+data.word_pure+'" class="layui-input" style="margin:5px;width:300px;">',
        yes: function () {
            $.post('/Match/Word/update/',{"id":data.id,'value':$("#newVal").val()},function(ret){
                if(ret.code == 0){
                    word_pure.find("div").text($("#newVal").val());
                    layer.msg('操作成功', {icon:6,time:1000});
                    layer.close(layIndex);
                }else{
                    layer.msg('操作失败', {icon:7,time:1000});
                }
            },"json");
        }
    });
}
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>