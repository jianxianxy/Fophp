<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
<?php include(APP.'/layout/_head.html');?>
</head>
<body>
<div class="page-container">
	<form class="form form-horizontal" id="form-article-add">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>图片标题：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="" name="">
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
			<label class="form-label col-xs-4 col-sm-2">产品规格：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" name="" id="" placeholder="输入长度" value="" class="input-text" style=" width:25%">
				MM
				<input type="text" name="" id="" placeholder="输入宽度" value="" class="input-text" style=" width:25%">
				MM
				<input type="text" name="" id="" placeholder="输入高度" value="" class="input-text" style=" width:25%">
				MM </div>
		</div>
        
        <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">图片上传：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<div class="upload_btn" id="img1">多图上传</div>
			</div>
		</div>
		
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">图片摘要：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea name="" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！" onKeyUp="textarealength(this,200)"></textarea>
				<p class="textarea-numberbar"><em class="textarea-length">0</em>/200</p>
			</div>
		</div>
		
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<button onClick="article_save_submit();" class="btn btn-primary radius" type="submit"><i class="layui-icon">&#xe632;</i> 保存并提交审核</button>
				<button onClick="article_save();" class="btn btn-secondary radius" type="button"><i class="layui-icon">&#xe632;</i> 保存草稿</button>
				<button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
			</div>
		</div>
	</form>
</div>
<!--_footer 作为公共模版分离出去-->
<?php include(APP.'/layout/_foot.html');?>
<!--/_footer /作为公共模版分离出去-->

<script type="text/javascript" src="/lib/ueditor/1.4.3/ueditor.config.js"></script>
<script type="text/javascript" src="/lib/ueditor/1.4.3/ueditor.all.js"></script>
<!-- 使用ueditor -->
<script type="text/javascript">
document.write('<textarea id="uploadEditor" style="display: none;"></textarea>');
// 实例化编辑器，这里注意配置项隐藏编辑器并禁用默认的基础功能。
var uploadEditor = UE.getEditor("uploadEditor", {
    isShow: false,
    focus: false,
    enableAutoSave: false,
    autoSyncData: false,
    autoFloatEnabled:false,
    wordCount: false,
    sourceEditor: null,
    scaleEnabled:true,
    toolbars: [["insertimage", "attachment"]]
});
var currId = '';
// 监听多图上传组件的插入动作
uploadEditor.ready(function () {
    uploadEditor.addListener("beforeInsertImage", _beforeInsertImage);
});

// 自定义按钮绑定触发多图上传和上传附件对话框事件
$(function(){
    $(".upload_btn").click(function(){
        currId = $(this).attr("id");
        var dialog = uploadEditor.getDialog("insertimage");
        dialog.title = '多图上传';
        dialog.render();
        dialog.open();
    });
});

// 多图上传动作
function _beforeInsertImage(t, result) {
    if(t == "beforeinsertimage"){
        if($("#ul_"+currId).size() == 0){
            $("#"+currId).after('<div class="box" id="ul_'+currId+'"></div>');
        }
        var ul = $("#ul_"+currId);
        var imageHtml = '';
        for(var i in result){
            imageHtml += '<div class="fileItem" filecodeid="1">';
            imageHtml += '<div class="imgShow"><img src="'+result[i].src+'" alt="'+result[i].alt+'" height="150"></div>';
            imageHtml += '<div class="fileName">删除</div>';
            imageHtml += '</div>';
        }
        ul.append(imageHtml);
    }
}
</script>
</body>
</html>