{include file="inc/header.tpl"}

<div class="page_top">当前位置：<a href=".">首页</a> > <a href="?c={$__controller}&a=show">{$title}</a></div><!-- 当前位置 -->

<div class="left">
    <p class="left_title">{$title}&nbsp;&nbsp;Message</p>
    <div class="text">
    <form method="post" action="" >
        <p class="text_ly"><span class="lou">标题： *</span><span class="bt"><input type="text" class="kuang" /></span></p>
        <p class="text_ly"><span class="lou">内容： *</span><span class="bt"><textarea class="neirong"></textarea></span></p>
    </form>
    </div>
</div><!-- /left -->
            
<div class="right">
    {include file="inc/sidebar.tpl"}
</div><!-- /right -->

</div><!-- /content -->

{include file="inc/footer.tpl"}