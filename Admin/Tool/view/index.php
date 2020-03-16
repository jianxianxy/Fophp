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
    <nav class="breadcrumb"><i class="layui-icon"></i> <a href="/" class="maincolor">首页</a> 
        <span class="c-999 en">&gt;</span>
        <span class="c-666">智能工程</span> 
    </nav>
    <article class="cl pd-10">
    <div class="page-container">
        <form class="layui-form">
            <div class="layui-form-item">
                <label class="layui-form-label">模块</label>
                <div class="layui-input-inline">
                    <select name="module" id="module" lay-verify="required" autocomplete="off">
                        <?php foreach($this->module AS $val):?>
                        <option value="<?php echo $val;?>"><?php echo $val;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">选择连接库</label>
                <div class="layui-input-inline">
                    <select name="configDb" id="configDb" lay-filter="configDb" lay-verify="required" autocomplete="off">
                        <option value="" selected="1">连接库</option>
                        <?php foreach($this->configDb AS $key => $val):?>
                        <option value="<?php echo $key;?>"><?php echo $val;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">选择表</label>
                <div class="layui-input-inline">
                    <select name="tableName" id="tableName" lay-filter="tableName" lay-verify="required" autocomplete="off">
                        <option value="">选择表</option>
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">Model</label>
                <div class="layui-input-inline">
                    <input name="modelName" lay-verify="required" placeholder="例如:UserModel" autocomplete="off" class="layui-input" type="text">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">View-添加</label>       
                <div class="layui-inline" id="viewAdd"></div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">View-列表</label>       
                <div class="layui-inline" id="viewList"></div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">Controller</label>
                <div class="layui-input-inline">
                    <input name="contName" lay-verify="required" placeholder="例如:User" autocomplete="off" class="layui-input" type="text">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label"></label>
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit lay-filter="subform" id="view" type="button">预览</button>
                    <button class="layui-btn" lay-submit lay-filter="subform" id="make" type="button">生成</button>
                </div>                       
            </div>
        </form>
    </div>
    </article>
    <footer class="footer">
        <p></p>
    </footer>
</section>

<!--_footer 作为公共模版分离出去-->
<?php include(APP.'/layout/_foot.html');?>
<!--/_footer /作为公共模版分离出去-->
<script>
//表单
layui.use('form', function(){
    var form = layui.form;
    form.render();
    //获取数据表
    form.on('select(configDb)', function(cfg){
        var configDb = cfg.value;
        if(configDb != ""){
            $.post('/Tool/Project/getTables',{'configDb':configDb},function(ret){
                if(ret.code == 0){
                    var opt = '<option value="">选择表</option>';
                    for(var i in ret.data){
                        opt += '<option value="'+ret.data[i]+'">'+ret.data[i]+'</option>';
                    }
                    $("#tableName").html(opt);
                    form.render('select');
                }
            },"json");
        }else{
            $("#tableName").html('<option value="">选择表</option>');
            form.render('select');
        }    
    });
    //表字段
    form.on('select(tableName)',function(cfg){
        var table = cfg.value;
        var configDb = $("#configDb").val();
        if(table && configDb){
            $.post('/Tool/Project/getTableCol',{"table":table,"configDb":configDb},function(ret){
                if(ret.code == 0){
                    setCol(ret.data);
                    form.render('checkbox');
                }
            },"json");
        }
    });
    //提交
    form.on('submit(subform)', function(data){
        data.field.mod = data.elem.id;
        var url = '/Tool/Project/Add';
        url = url + '?' + makeQuery(data.field);
        layer_show("预览",url,1200,900);
        return false;
    });
});
layui.use('element', function(){
    var element = layui.element;
    element.on('tab(step)');
});
//构建url请求地址
function makeQuery(param) {
    var data = [];
    for(attr in param) {
	    var str = attr + '=' + param[attr];
	    data.push(str);
    }
    return data.join('&');
}
//设置字段
function setCol(col){
    var add = '';
    var list = '';
    for(var i in col){
        add += '<input name="addView['+col[i]+']" lay-skin="primary" title="'+col[i]+'" type="checkbox" checked="1">';
        list += '<input name="listView['+col[i]+']" lay-skin="primary" title="'+col[i]+'" type="checkbox" checked="1">';
    }
    $("#viewAdd").html(add);
    $("#viewList").html(list);
}
</script>
</body>
</html>