<!DOCTYPE HTML>
<html>
<head>
<?php include(LAY.'/_head.html');?>
<link rel="stylesheet" href="/lib/zTree/v3/css/zTreeStyle/zTreeStyle.css" type="text/css">
</head>
<body>
<!--_header 作为公共模版分离出去-->
<?php include(LAY.'/_top.html');?>
<!--/_header 作为公共模版分离出去-->

<!--_menu 作为公共模版分离出去-->
<?php include(LAY.'/_menu.html');?>
<!--/_menu 作为公共模版分离出去-->

<section class="Hui-article-box">
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 产品管理 <span class="c-gray en">&gt;</span> 产品列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="Hui-article">
		<div class="pos-a" style="width:350px;left:0;top:0; bottom:0; height:100%; border-right:1px solid #e5e5e5; background-color:#f5f5f5">
			<ul id="treeDemo" class="ztree">
			</ul>
		</div>
		<div style="margin-left:350px;">
			<div class="page-container">
                <form class="form form-horizontal" id="form-article-add">
                    <div class="row cl">
                        <label class="form-label col-xs-4 col-sm-2">搜索：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <input type="text" id="catName" placeholder=" 产品名称" style="width:100px" class="input-text">
                            <button class="btn btn-success" type="button"><i class="Hui-iconfont">&#xe665;</i> 搜产品</button>
                        </div>
                    </div>
                    <div class="row cl">
                        <label class="form-label col-xs-4 col-sm-2">简略标题：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <input type="text" class="input-text" value="" placeholder="" id="" name="">
                        </div>
                    </div>
                    <div class="row cl">
                        <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>分类栏目：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <span class="select-box">
                            <select name="" class="select">
                                <option value="0">全部栏目</option>
                                <option value="1">新闻资讯</option>
                                <option value="11">├行业动态</option>
                                <option value="12">├行业资讯</option>
                                <option value="13">├行业新闻</option>
                            </select>
                            </span>
                        </div>
                    </div>
                    <div class="row cl">
                        <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
                            <button onClick="article_save();" class="btn btn-secondary radius" type="button"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
                            <button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
                        </div>
                    </div>
                </form>
            </div>
		</div>
	</div>
</section>
<!--_footer 作为公共模版分离出去-->
<?php include(LAY.'/_foot.html');?>
<!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/lib/zTree/v3/js/jquery.ztree.all-3.5.min.js"></script>
<script type="text/javascript">
var setting = {
	view: {
		dblClickExpand: false,
		showLine: false,
		selectedMulti: false
	},
	data: {
		simpleData: {
			enable:true,
			idKey: "id",
			pIdKey: "pId",
			rootPId: ""
		}
	},
	callback: {
		beforeClick: function(treeId, treeNode) {
			var zTree = $.fn.zTree.getZTreeObj("tree");
			if (treeNode.isParent) {
				zTree.expandNode(treeNode);
				return false;
			} else {
				demoIframe.attr("src",treeNode.file + ".html");
				return true;
			}
		}
	}
};

var zNodes =[
	{ id:1, pId:0, name:"一级分类", open:true},
	{ id:11, pId:1, name:"二级分类"},
	{ id:111, pId:11, name:"三级分类"},
	{ id:112, pId:11, name:"三级分类"},
	{ id:113, pId:11, name:"三级分类"},
	{ id:12, pId:1, name:"二级分类"},
	{ id:121, pId:12, name:"三级分类"},
	{ id:122, pId:12, name:"三级分类"},
];

var code;

function showCode(str) {
	if (!code) code = $("#code");
	code.empty();
	code.append("<li>"+str+"</li>");
}

$(document).ready(function(){
	var t = $("#treeDemo");
	t = $.fn.zTree.init(t, setting, zNodes);
	demoIframe = $("#testIframe");
	demoIframe.bind("load", loadReady);
	var zTree = $.fn.zTree.getZTreeObj("tree");
	zTree.selectNode(zTree.getNodeByParam("id",'11'));
});
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>