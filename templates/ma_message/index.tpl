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
        <th>留言时间:</th>
        <td>{$message.updated}</td>
    </tr>
    <tr>
        <th>标题:</th>
        <td>{$message.title}</td>
        <th>内容:</th>
        <td>{$message.message}</td>
        <th>回复:</th>
        <td>{$message.reply}</td>
    </tr>
    </table>
    {foreachelse}
    还没有用户留言...
    {/foreach}
    
    {$page}
</div>

{include file="inc_ma/footer.tpl"}