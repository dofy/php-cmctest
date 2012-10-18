{include file="inc_ma/header.tpl"}

{include file="inc_ma/nav.tpl"}

<div id="content" class="grid_9">
{include file="inc_ma/cat.tpl"}
{if $m == 'ok'}
<p class="msg" >密码修改成功.</p>
{/if}
<p >
<div class="clear"></div>
<form method="post" action="?c=manager&a=savepass" onsubmit="return checkForm(this);">
 <p ><strong>修改密码:</strong></p>
 <p ><label for="npass">输入新密码:</label><input id="npass" type="password" name="npass" /></p>
 <p ><label for="rpass">确认新密码:</label><input id="rpass" type="password" name="rpass" /></p>
 <p ><input type="submit" value="修改密码" /></p>
</form>
</p>
</div>
<script >
<!--
{literal}
function checkForm(frm)
{
    if(frm.npass.value == '')
    {
        alert('请填写新密码.');
        frm.npass.focus();
        return false;
    }
    if(frm.rpass.value != frm.npass.value)
    {
        alert('请确认新密码.');
        frm.rpass.focus();
        return false;
    }

}
{/literal}
//-->
</script>
{include file="inc_ma/footer.tpl"}