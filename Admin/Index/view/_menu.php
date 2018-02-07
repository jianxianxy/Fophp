<!--_menu 作为公共模版分离出去-->
<aside class="Hui-aside">
    <div class="menu_dropdown bk_2" id="Amenu">
        <?php foreach($this->menu AS $val):?>
        <dl>
            <dt><i class="Hui-iconfont"><?php echo $val['icon'];?></i> <?php echo $val['name'];?><i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <?php foreach($val['child'] AS $v):?>
                    <li><a href="<?php echo $v['link'];?>" title="<?php echo $v['name'];?>"><?php echo $v['name'];?></a></li>
                    <?php endforeach;?>
                </ul>
            </dd>
        </dl>
        <?php endforeach;?>
    </div>
</aside>
<div class="dislpayArrow hidden-xs">
    <a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a>
</div>
<script>
function menuSel(){
    var url = location.href;
    var urlReg=/http:\/\/([^\/]+)/i; 
    domain = url.match(urlReg);
    url = url.replace(domain[0],"");
    url = url.replace(/^\/|\/$/,"");
    urlArr = url.split("/");
    if(urlArr[0].indexOf(".") > 0){
            var menu1 = urlArr[1];
            var menu2 = urlArr[2];
    }else{
            var menu1 = urlArr[0];
            var menu2 = urlArr[1];	
    }
    var search = menu1+'/'+menu2;
    $("#Amenu a").each(function(){
        if($(this).attr("href").indexOf(search) >= 0){
            var dd = $(this).parent().parent().parent();
            dd.attr("style","display: block;");
            dd.prev().attr("class","selected");
        }
    });
}
$(function(){
    menuSel();
});
</script>