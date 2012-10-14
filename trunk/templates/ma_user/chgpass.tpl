{include file="inc_ma/header.tpl"}

{include file="inc_ma/nav.tpl"}

<div id="content" class="grid_9">
    {include file="inc_ma/cat.tpl"}
{if $m == 'ok'}
<p class="msg" >密码修改成功.</p>
{/if}
<p >
<form method="post" action="?c=user&a=savepass" onsubmit="return checkForm();">
 <p ><strong>修改密码:</strong></p>
 <p ><label for="npass">输入新密码:</label><input id="npass" type="password" name="npass" /></p>
 <p ><label for="rpass">确认新密码:</label><input id="rpass" type="password" name="rpass" /></p>
 <p ><input type="submit" /></p>
</form>
</p>
</div>
<script type="text/javascript">
<!--
{literal}
document.forms[0].npass.focus();
function checkForm()
{
    var frm = document.forms[0];
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