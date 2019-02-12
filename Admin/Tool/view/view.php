<!DOCTYPE HTML>
<html>
<head>
<?php include(APP.'/layout/_head.html');?>
</head>
<body>
<article class="cl pd-10">
    <div class="page-container">
        <div class="page-container">
            <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
                <ul class="layui-tab-title">
                    <li class="layui-this">控制器</li>
                    <li>模型</li>
                    <li>摸版@添加</li>
                    <li>摸版@列表</li>
                </ul>
                <div class="layui-tab-content" style="height: 100px;">
                    <div class="layui-tab-item layui-show">
                        <pre><?php echo htmlentities($this->model->getController(), ENT_QUOTES, 'UTF-8');?></pre>                        
                    </div>
                    <div class="layui-tab-item">
                        <pre><?php echo htmlentities($this->model->getModel(), ENT_QUOTES, 'UTF-8');?></pre>          
                    </div>
                    <div class="layui-tab-item">
                        <pre><?php echo htmlentities($this->model->getViewAdd(), ENT_QUOTES, 'UTF-8');?></pre>          
                    </div>
                    <div class="layui-tab-item">
                        <pre><?php echo htmlentities($this->model->getViewList(), ENT_QUOTES, 'UTF-8');?></pre>          
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>

<!--_footer 作为公共模版分离出去-->
<?php include(APP.'/layout/_foot.html');?>
<!--/_footer /作为公共模版分离出去-->
<script>
//表单
layui.use('form', function(){
    var form = layui.form;
    form.render();
});
layui.use('element', function(){
    var element = layui.element;
    element.on('tab(step)');
});
</script>
</body>
</html>