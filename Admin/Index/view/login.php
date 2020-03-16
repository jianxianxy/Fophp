<!DOCTYPE HTML>
<html>
<head>
<?php include(LAY.'/_head.html');?>
</head>
<body>
<div style="margin-top:200px;"></div>
<div class="loginWraper">
    <div id="loginform" class="loginBox">
        <form class="form form-horizontal" action="index.html" method="post">
            <div class="row cl">
                <label class="form-label col-xs-3"><i class="layui-icon">&#xe60d;</i></label>
                <div class="formControls col-xs-3">
                    <input id="" name="" type="text" placeholder="账户" class="input-text size-L">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-3"><i class="layui-icon">&#xe60e;</i></label>
                <div class="formControls col-xs-3">
                    <input id="" name="" type="password" placeholder="密码" class="input-text size-L">
                </div>
            </div>
            <div class="row cl">
                <div class="formControls col-xs-8 col-xs-offset-3">
                    <input class="input-text size-L" type="text" placeholder="验证码" style="width:150px;">
                    <img id="Validate" src="/index/Validate/">
                    <a onclick="$('#Validate').attr('src','/index/Validate/index/?code=' + Math.random())" href="javascript:void(0);">看不清，换一张</a>
                </div>
            </div>
            <div class="row cl">
                <div class="formControls col-xs-8 col-xs-offset-3">
                    <label for="online">
                        <input type="checkbox" name="online" id="online" value="">
                        使我保持登录状态</label>
                </div>
            </div>
            <div class="row cl">
                <div class="formControls col-xs-8 col-xs-offset-3">
                    <input name="" type="submit" class="btn btn-success radius size-L" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;">
                    <input name="" type="reset" class="btn btn-default radius size-L" value="&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;">
                </div>
            </div>
        </form>
    </div>
</div>
<div style="margin-top:20px;"></div>
<div class="footer">Copyright 你的公司名称 by H-ui.admin.page.v3.0</div>
<script type="text/javascript" src="/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/static/h-ui/js/H-ui.js"></script>
</body>
</html>