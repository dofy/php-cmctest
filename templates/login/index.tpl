{include file="inc/top.tpl"}

<div class="content">
    <form method="post" action="?c=login&a=login" >
    <div style="width:960px; height:405px ; background:url(images/login_bg.jpg) no-repeat;padding:125px 0 0 228px;">
        <p class="dl">
            {if $msg}<strong style="color:#f00;">{$msg}</strong>{/if}
            <b class="t">账&nbsp;&nbsp;&nbsp;&nbsp;号：<input type="text" name="username" /></b>
            <b class="h">密&nbsp;&nbsp;&nbsp;&nbsp;码：<input type="password" name="password" /></b>
            <b class="r">验 证 码：<input type="text" name="recode" /><img src="recode.php" title="看不清? 点击刷新" onclick="this.src = this.src;" /></b>
            <b class="ee">
                <input type="button" style="background:url(images/zcan.jpg) no-repeat;" value=""
                    onclick="location.href='?c=login&a=register';" /> 
                <input type="submit" style="background:url(images/dlan.jpg) no-repeat;" value=""  />
            </b>
        </p>
    </div>
    </form>
</div><!-- content中部 -->

{include file="inc/footer.tpl"}