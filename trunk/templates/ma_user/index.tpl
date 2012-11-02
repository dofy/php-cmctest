{include file="inc_ma/header.tpl"}

{include file="inc_ma/nav.tpl"}

<div id="content" class="grid_10">
    {include file="inc_ma/cat.tpl"}
  <div class="clear"></div>
    {foreach from=$users item='user'}

    <table>
    <tr>
        <th class="text_right" >ID: {$user.id}</th>
        <td>
            <a href="?c=user&a=del&id={$user.id}" onclick="return confirm('确定要删除该用户吗?');">删除</a>
        </td>
        <th>UserName:</th>
        <td>{$user.username}</td>
        <th>注册时间:</th>
        <td>{$user.joinin}</td>
        <th>最后登录/次/IP:</th>
        <td>{$user.updated|default:'未登录'}/{$user.times}/{$user.lastip}</td>
    </tr>
    <tr>
        <th>EMail:</th>
        <td>{$user.email}</td>
        <th>电话:</th>
        <td>{$user.tel}</td>
        <th>省份:</th>
        <td>{$user.province}</td>
        <th>城市:</th>
        <td>{$user.city}</td>
    </tr>
    </table>
    {foreachelse}
    还没有用户注册...
    {/foreach}
    
    {$page}
</div>

{include file="inc_ma/footer.tpl"}