{include file="inc_ma/header.tpl"}

{include file="inc_ma/nav.tpl"}

<div id="content" class="grid_10">
    {include file="inc_ma/cat.tpl"}
  <div class="clear"></div>
  
    {foreach from=$messages item='message'}
    <table>
    <tr>
        <th class="text_right" >ID: {$message.id}</th>
        <td>
            <a href="?c=user&a=del&id={$message.id}" onclick="return confirm('确定要删除该留言吗?');">删除</a>
        </td>
        <th>UserName:</th>
        <td>{$message.username}</td>
        <th>注册时间:</th>
        <td>{$message.joinin}</td>
        <th>最后登录/次/IP:</th>
        <td>{$message.updated|default:'未登录'}/{$message.times}/{$message.lastip}</td>
    </tr>
    <tr>
        <th>EMail:</th>
        <td>{$message.email}</td>
        <th>电话:</th>
        <td>{$message.tel}</td>
        <th>省份:</th>
        <td>{$message.province}</td>
        <th>城市:</th>
        <td>{$message.city}</td>
    </tr>
    </table>
    {foreachelse}
    还没有用户留言...
    {/foreach}
    
    {$page}
</div>

{include file="inc_ma/footer.tpl"}