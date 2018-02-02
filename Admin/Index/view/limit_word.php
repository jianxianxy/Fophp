<!DOCTYPE HTML>
<html>
<head>
<?php include(LAY.'/_head.html');?>
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
		<div class="pd-20">
			<div>
				<textarea class="textarea" style="width:100%; height:300px; resize:none">贱人|1090tv|10jil|21世纪中国基金会|ustibet|voa</textarea>
			</div>
			<div class="mt-20 text-c">
				<button name="system-base-save" id="system-base-save" class="btn btn-success radius" type="submit"><i class="icon-ok"></i> 确定</button>
			</div>
		</div>
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