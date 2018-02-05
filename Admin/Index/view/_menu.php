<!--_menu 作为公共模版分离出去-->
<aside class="Hui-aside">
    <div class="menu_dropdown bk_2">
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
<!--/_menu 作为公共模版分离出去-->