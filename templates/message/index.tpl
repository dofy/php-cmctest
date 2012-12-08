{include file="inc/header.tpl"}

<div class="page_top">当前位置：<a href=".">首页</a> > <a href="?c={$__controller}&a=show">{$title}</a></div><!-- 当前位置 -->

<div class="left">
    <p class="left_title">{$title}&nbsp;&nbsp;Message</p>
    <div class="text">
    <form method="post" action="?c=message&a=save" >
        <div>
        {if $msg == "t"}
        请将标题和内容填写完整.
        {elseif $msg == "ok"}
        恭喜, 留言成功, 可以到 [<a href="?c=user&a=message">您的留言</a>] 页面查看.
        {else}
            {if $curuser}
            欢迎您 <strong>{$curuser.name}</strong>, 请留下您的宝贵意见.
            {else}
            登录后才能留言, 请先 [<a href="?c=login">登录</a>] 或 [<a href="?c=login&a=register">注册</a>]
            {/if}
        {/if}
        </div>
        <p class="text_ly"><span class="lou">标题： *</span><span class="bt"><input name="title" type="text" class="kuang" /></span></p>
        <p class="text_ly"><span class="lou">内容： *</span><span class="bt"><textarea name="message" class="neirong"></textarea></span></p>
        <p class="pext"><input type="submit" class="anniu" value="提交留言" /></p>
    </form>
    </div>
</div><!-- /left -->
            
<div class="right">
    {include file="inc/sidebar.tpl"}
</div><!-- /right -->

</div><!-- /content -->

{include file="inc/footer.tpl"}