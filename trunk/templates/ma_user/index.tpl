{include file="inc_ma/header.tpl"}

{include file="inc_ma/nav.tpl"}

<div id="content" class="grid_10">
    {include file="inc_ma/cat.tpl"}
    {if $m == 'ok'}
    <p class="msg" >用户信息保存成功.</p>
    {elseif $m == 'name'}
    <p class="msg" >用户已经存在.</p>
    {/if}
    <form method="post" action="?c=user&a=save" onsubmit="return checkForm();">
    <strong>{if $user.id > 0}修改{else}添加{/if}用户:</strong>
     <label for="username">用户名:</label><input id="username" type="text" name="username" value="{$user.username}" {if $user.id>0}readonly="readonly"{/if} />
     <label for="password">密码:</label><input id="password" type="text" name="password" />
     <!--
     <label>权限:</label>
        {html_radios name="level" options=$level_opt selected=$user.level}
        -->
     <input type="hidden" name="userid" value="{$user.id}" />
     <input type="submit" value="保存" />
     <input type="button" value="取消" onclick="location.href='?c=user';" />
    </form>
    <p >
    <table>
    <tr>
    <th>ID</th>
    <th>用户名</th>
    <!--th>用户组</th-->
    <th>最后登录时间</th>
    <th>最后登录IP</th>
    <th>编辑</th>
    </tr>
    {foreach from=$users item='user'}
    <tr>
     <td class="text_right" >{$user.id}</td>
     <td>{$user.username}</td>
     <!--td>{$level_opt[$user.level]}</td-->
     <td>{$user.updated}</td>
     <td>{$user.lastip}</td>
     <td class="text_center" >
        <a href="?c=user&id={$user.id}" >编辑</a>
        {if $user.id == 2}
        | <a href="?c=user&a=del&id={$user.id}" onclick="return confirm('确定要删除该用户吗?');">删除</a>
        {/if}
     </td>
    </tr>
    {/foreach}
    </table>
    
    </p>
</div>

<script type="text/javascript">
<!--
{literal}
document.forms[0].username.focus();
function checkForm()
{
    var frm = document.forms[0];
    if(frm.username.value.trim() == '')
    {
        alert('请填写用户名.');
        frm.username.focus();
        return false;
    }
    if(frm.password.value == '' && frm.userid.value == '')
    {
        alert('请填写密码.');
        frm.password.focus();
        return false;
    }

}
{/literal}
//-->
</script>
{include file="inc_ma/footer.tpl"}