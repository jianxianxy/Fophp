<!DOCTYPE HTML>
<html>
<head>
<?php include(LAY.'/_head.html');?>
<style>
.icon_lists li {
	float: left;
	width: 100px;
	height: 190px;
	text-align: center
}
.icon_lists .Hui-iconfont {
	font-size: 38px;
	line-height: 100px;
	margin: 10px 0;
	color: #333;
	-webkit-transition: font-size 0.25s ease-out 0s;
	-moz-transition: font-size 0.25s ease-out 0s;
	transition: font-size 0.25s ease-out 0s
}
.icon_lists .Hui-iconfont:hover {
	font-size: 100px
}
@media (max-width:450px) {
.icon_lists li {
	width: 50%}
}
</style>
</head>
<body>
<!--_header 作为公共模版分离出去-->
<?php include(LAY.'/_top.html');?>
<!--/_header 作为公共模版分离出去-->

<!--_menu 作为公共模版分离出去-->
<?php include(LAY.'/_menu.html');?>
<!--/_menu 作为公共模版分离出去-->

<section class="Hui-article-box">
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
		<span class="c-gray en">&gt;</span>
		系统管理
		<span class="c-gray en">&gt;</span>
		基本设置
		<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
	</nav>
	<div class="Hui-article">
		<article class="cl pd-20">
			<ul class="icon_lists cl">
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">返回顶部</div>
					<div class="code">&amp;#xe684;</div>
					<div class="fontclass">.Hui-iconfont-gotop</div>
				</li>
				<li><i class="icon Hui-iconfont"></i>
					<div class="name">列表</div>
					<div class="code">&amp;#xe667;</div>
					<div class="fontclass">.Hui-iconfont-menu</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">剪切</div>
					<div class="code">&amp;#xe64e;</div>
					<div class="fontclass">.Hui-iconfont-jiandao</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">搜索2</div>
					<div class="code">&amp;#xe665;</div>
					<div class="fontclass">.Hui-iconfont-search2</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">搜索1</div>
					<div class="code">&amp;#xe709;</div>
					<div class="fontclass">.Hui-iconfont-search1</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">保存</div>
					<div class="code">&amp;#xe632;</div>
					<div class="fontclass">.Hui-iconfont-save</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">撤销</div>
					<div class="code">&amp;#xe66b;</div>
					<div class="fontclass">.Hui-iconfont-chexiao</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">重做</div>
					<div class="code">&amp;#xe66c;</div>
					<div class="fontclass">.Hui-iconfont-zhongzuo</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">下载</div>
					<div class="code">&amp;#xe640;</div>
					<div class="fontclass">.Hui-iconfont-down</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">切换器右</div>
					<div class="code">&amp;#xe63d;</div>
					<div class="fontclass">.Hui-iconfont-slider-right</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">切换器左</div>
					<div class="code">&amp;#xe67d;</div>
					<div class="fontclass">.Hui-iconfont-slider-left</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">发布</div>
					<div class="code">&amp;#xe603;</div>
					<div class="fontclass">.Hui-iconfont-fabu</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">添加</div>
					<div class="code">&amp;#xe604;</div>
					<div class="fontclass">.Hui-iconfont-add2</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">换一批</div>
					<div class="code">&amp;#xe68f;</div>
					<div class="fontclass">.Hui-iconfont-huanyipi</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">等待</div>
					<div class="code">&amp;#xe606;</div>
					<div class="fontclass">.Hui-iconfont-dengdai</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">导出</div>
					<div class="code">&amp;#xe644;</div>
					<div class="fontclass">.Hui-iconfont-daochu</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">导入</div>
					<div class="code">&amp;#xe645;</div>
					<div class="fontclass">.Hui-iconfont-daoru</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">删除</div>
					<div class="code">&amp;#xe60b;</div>
					<div class="fontclass">.Hui-iconfont-del</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">删除</div>
					<div class="code">&amp;#xe609;</div>
					<div class="fontclass">.Hui-iconfont-del2</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">删除</div>
					<div class="code">&amp;#xe6e2;</div>
					<div class="fontclass">.Hui-iconfont-del3</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">输入</div>
					<div class="code">&amp;#xe647;</div>
					<div class="fontclass">.Hui-iconfont-shuru</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">添加</div>
					<div class="code">&amp;#xe600;</div>
					<div class="fontclass">.Hui-iconfont-add</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">减号</div>
					<div class="code">&amp;#xe6a1;</div>
					<div class="fontclass">.Hui-iconfont-jianhao</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">编辑</div>
					<div class="code">&amp;#xe60c;</div>
					<div class="fontclass">.Hui-iconfont-edit2</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">编辑</div>
					<div class="code">&amp;#xe6df;</div>
					<div class="fontclass">.Hui-iconfont-edit</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">管理</div>
					<div class="code">&amp;#xe61d;</div>
					<div class="fontclass">.Hui-iconfont-manage</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">添加</div>
					<div class="code">&amp;#xe610;</div>
					<div class="fontclass">.Hui-iconfont-add3</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">添加</div>
					<div class="code">&amp;#xe61f;</div>
					<div class="fontclass">.Hui-iconfont-add4</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">密码</div>
					<div class="code">&amp;#xe63f;</div>
					<div class="fontclass">.Hui-iconfont-key</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">解锁</div>
					<div class="code">&amp;#xe605;</div>
					<div class="fontclass">.Hui-iconfont-jiesuo</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">锁定</div>
					<div class="code">&amp;#xe60e;</div>
					<div class="fontclass">.Hui-iconfont-suoding</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">关闭</div>
					<div class="code">&amp;#xe6a6;</div>
					<div class="fontclass">.Hui-iconfont-close</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">关闭2</div>
					<div class="code">&amp;#xe706;</div>
					<div class="fontclass">.Hui-iconfont-close2</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">选择</div>
					<div class="code">&amp;#xe6a7;</div>
					<div class="fontclass">.Hui-iconfont-xuanze</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">未选</div>
					<div class="code">&amp;#xe608;</div>
					<div class="fontclass">.Hui-iconfont-weigouxuan2</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">选中</div>
					<div class="code">&amp;#xe6a8;</div>
					<div class="fontclass">.Hui-iconfont-xuanzhong1</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">选中</div>
					<div class="code">&amp;#xe676;</div>
					<div class="fontclass">.Hui-iconfont-xuanzhong</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">未选中</div>
					<div class="code">&amp;#xe677;</div>
					<div class="fontclass">.Hui-iconfont-weixuanzhong</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">启用</div>
					<div class="code">&amp;#xe601;</div>
					<div class="fontclass">.Hui-iconfont-gouxuan2</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">重启</div>
					<div class="code">&amp;#xe6f7;</div>
					<div class="fontclass">.Hui-iconfont-chongqi</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">勾选</div>
					<div class="code">&amp;#xe617;</div>
					<div class="fontclass">.Hui-iconfont-selected</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">上架</div>
					<div class="code">&amp;#xe6dc;</div>
					<div class="fontclass">.Hui-iconfont-shangjia</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">下架</div>
					<div class="code">&amp;#xe6de;</div>
					<div class="fontclass">.Hui-iconfont-xiajia</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">上传</div>
					<div class="code">&amp;#xe642;</div>
					<div class="fontclass">.Hui-iconfont-upload</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">下载</div>
					<div class="code">&amp;#xe641;</div>
					<div class="fontclass">.Hui-iconfont-yundown</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">剪裁</div>
					<div class="code">&amp;#xe6bc;</div>
					<div class="fontclass">.Hui-iconfont-caiqie</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">旋转</div>
					<div class="code">&amp;#xe6bd;</div>
					<div class="fontclass">.Hui-iconfont-xuanzhuan</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">启用</div>
					<div class="code">&amp;#xe615;</div>
					<div class="fontclass">.Hui-iconfont-gouxuan</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">未勾选</div>
					<div class="code">&amp;#xe614;</div>
					<div class="fontclass">.Hui-iconfont-weigouxuan</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">录音</div>
					<div class="code">&amp;#xe619;</div>
					<div class="fontclass">.Hui-iconfont-luyin</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">预览</div>
					<div class="code">&amp;#xe695;</div>
					<div class="fontclass">.Hui-iconfont-yulan</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">审核不通过</div>
					<div class="code">&amp;#xe6e0;</div>
					<div class="fontclass">.Hui-iconfont-shenhe-weitongguo</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">审核不通过</div>
					<div class="code">&amp;#xe6dd;</div>
					<div class="fontclass">.Hui-iconfont-shenhe-butongguo2</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">审核通过</div>
					<div class="code">&amp;#xe6e1;</div>
					<div class="fontclass">.Hui-iconfont-shenhe-tongguo</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">停用</div>
					<div class="code">&amp;#xe631;</div>
					<div class="fontclass">.Hui-iconfont-shenhe-tingyong</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">播放</div>
					<div class="code">&amp;#xe6e6;</div>
					<div class="fontclass">.Hui-iconfont-bofang</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">上一首</div>
					<div class="code">&amp;#xe6db;</div>
					<div class="fontclass">.Hui-iconfont-shangyishou</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">下一首</div>
					<div class="code">&amp;#xe6e3;</div>
					<div class="fontclass">.Hui-iconfont-xiayishou</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">暂停</div>
					<div class="code">&amp;#xe6e5;</div>
					<div class="fontclass">.Hui-iconfont-zanting</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">停止</div>
					<div class="code">&amp;#xe6e4;</div>
					<div class="fontclass">.Hui-iconfont-tingzhi</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">阅读</div>
					<div class="code">&amp;#xe720;</div>
					<div class="fontclass">.Hui-iconfont-yuedu</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">眼睛</div>
					<div class="code">&amp;#xe725;</div>
					<div class="fontclass">.Hui-iconfont-yanjing</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">电源</div>
					<div class="code">&amp;#xe726;</div>
					<div class="fontclass">.Hui-iconfont-power</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">图标2_橡皮擦</div>
					<div class="code">&amp;#xe72a;</div>
					<div class="fontclass">.Hui-iconfont-xiangpicha</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">计时器</div>
					<div class="code">&amp;#xe728;</div>
					<div class="fontclass">.Hui-iconfont-jishiqi</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">home</div>
					<div class="code">&amp;#xe625;</div>
					<div class="fontclass">.Hui-iconfont-home</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">小箭头</div>
					<div class="code">&amp;#xe67f;</div>
					<div class="fontclass">.Hui-iconfont-home2</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">cmstop新闻</div>
					<div class="code">&amp;#xe616;</div>
					<div class="fontclass">.Hui-iconfont-news</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">图片</div>
					<div class="code">&amp;#xe613;</div>
					<div class="fontclass">.Hui-iconfont-tuku</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">音乐</div>
					<div class="code">&amp;#xe60f;</div>
					<div class="fontclass">.Hui-iconfont-music</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">标签</div>
					<div class="code">&amp;#xe64b;</div>
					<div class="fontclass">.Hui-iconfont-tags</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">语音</div>
					<div class="code">&amp;#xe66f;</div>
					<div class="fontclass">.Hui-iconfont-yuyin3</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">系统</div>
					<div class="code">&amp;#xe62e;</div>
					<div class="fontclass">.Hui-iconfont-system</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">帮助</div>
					<div class="code">&amp;#xe633;</div>
					<div class="fontclass">.Hui-iconfont-help</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">出库</div>
					<div class="code">&amp;#xe634;</div>
					<div class="fontclass">.Hui-iconfont-chuku</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">图片</div>
					<div class="code">&amp;#xe646;</div>
					<div class="fontclass">.Hui-iconfont-picture</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">分类</div>
					<div class="code">&amp;#xe681;</div>
					<div class="fontclass">.Hui-iconfont-fenlei</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">合同管理</div>
					<div class="code">&amp;#xe636;</div>
					<div class="fontclass">.Hui-iconfont-hetong</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">全部订单</div>
					<div class="code">&amp;#xe687;</div>
					<div class="fontclass">.Hui-iconfont-quanbudingdan</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">任务管理</div>
					<div class="code">&amp;#xe637;</div>
					<div class="fontclass">.Hui-iconfont-renwu</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">问题反馈</div>
					<div class="code">&amp;#xe691;</div>
					<div class="fontclass">.Hui-iconfont-feedback</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">意见反馈</div>
					<div class="code">&amp;#xe692;</div>
					<div class="fontclass">.Hui-iconfont-feedback2</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">合同</div>
					<div class="code">&amp;#xe639;</div>
					<div class="fontclass">.Hui-iconfont-dangan</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">日志</div>
					<div class="code">&amp;#xe623;</div>
					<div class="fontclass">.Hui-iconfont-log</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">列表页面</div>
					<div class="code">&amp;#xe626;</div>
					<div class="fontclass">.Hui-iconfont-pages</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">文件</div>
					<div class="code">&amp;#xe63e;</div>
					<div class="fontclass">.Hui-iconfont-file</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">管理</div>
					<div class="code">&amp;#xe63c;</div>
					<div class="fontclass">.Hui-iconfont-manage2</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">订单</div>
					<div class="code">&amp;#xe627;</div>
					<div class="fontclass">.Hui-iconfont-order</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">语音</div>
					<div class="code">&amp;#xe6a4;</div>
					<div class="fontclass">.Hui-iconfont-yuyin2</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">语音</div>
					<div class="code">&amp;#xe6a5;</div>
					<div class="fontclass">.Hui-iconfont-yuyin</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">图片</div>
					<div class="code">&amp;#xe612;</div>
					<div class="fontclass">.Hui-iconfont-picture1</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">图文详情</div>
					<div class="code">&amp;#xe685;</div>
					<div class="fontclass">.Hui-iconfont-tuwenxiangqing</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">模版</div>
					<div class="code">&amp;#xe72d;</div>
					<div class="fontclass">.Hui-iconfont-moban-2</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">节日</div>
					<div class="code">&amp;#xe727;</div>
					<div class="fontclass">.Hui-iconfont-jieri</div>
				</li>
				<li>
					<i class="icon Hui-iconfont"></i>
					<div class="name">随你后台-网站</div>
					<div class="code">&amp;#xe72b;</div>
					<div class="fontclass">.Hui-iconfont-moban</div>
				</li>
			</ul>
        </article>
	</div>
</section>
<!--_footer 作为公共模版分离出去-->
<?php include(LAY.'/_foot.html');?>
<!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>