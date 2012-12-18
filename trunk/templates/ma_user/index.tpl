{include file="inc_ma/header.tpl"}

{include file="inc_ma/nav.tpl"}

<div id="content" class="grid_10">
    {include file="inc_ma/cat.tpl"}
  <div class="clear"></div>
  
    {foreach from=$users item='user'}
    <table>
    <tr>
        <th ><em>{$user.id}</em> <strong>{$user.name}</strong> ({$user.username})
        {if $user.sex == 1} 男 {else} 女 {/if}
        [<a href="?c=user&a=files&id={$user.id}&name={$user.name}">文件管理</a>]
        [<a href="?c=user&a=del&id={$user.id}" onclick="return confirm('确定要删除该用户吗?');">删除</a>]
        <strong>注册时间: </strong>{$user.joinin} 
        </th>
    </tr>
    <tr>
        <td>
        <strong>最后登录:</strong> {$user.updated} ({$user.times}次) <strong>IP:</strong> {$user.lastip}<br />
        <strong>EMail:</strong> {$user.email}  <strong>电话:</strong> {$user.tel} <br />
        <strong>省份:</strong> {$user.province} <strong>城市:</strong> {$user.city}<br />
        <strong>地址:</strong> {$user.addr} <strong>邮编:</strong> {$user.postcode}<br />
    </tr>
    </table>
    {foreachelse}
    还没有用户注册...
    {/foreach}
    
    {$page}
</div>

{include file="inc_ma/footer.tpl"}