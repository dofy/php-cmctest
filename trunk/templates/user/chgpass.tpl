{include file="inc/header.tpl"}

<div class="page_top">当前位置：<a href=".">首页</a> > <a href="?c={$__controller}">{$title}</a></div><!-- 当前位置 -->

<div class="left">
    <p class="left_title">{$title}&nbsp;&nbsp;Password</p>
        <form method="post" action="?c=user&a=savepass" >
            <p class="pext" style="color:#f00;">
            {if $m == "o"}
            原密码错误.
            {elseif $m == "n"}
            新密码长度至少6位.
            {elseif $m == "r"}
            两次输入的密码不一致.
            {elseif $m == "ok"}
            密码修改成功.
            {/if}
            </p>
            <p class="pext"><span>输入旧密码：</span><input type="password" name="opass" class="kuang" /></p>
            <p class="pext"><span>输入新密码：</span><input type="password" name="npass" class="kuang" /></p>
            <p class="pext"><span>再次输入新密码：</span><input type="password" name="rpass" class="kuang" /></p>
            <p class="pext"><input type="submit" class="anniu" value="确定修改" /></p>
        </form>
</div><!-- /left -->
            
<div class="right">
    {include file="inc/sidebar.tpl"}
</div><!-- /right -->

</div><!-- /content -->

{include file="inc/footer.tpl"}