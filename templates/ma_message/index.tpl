{include file="inc_ma/header.tpl"}

{include file="inc_ma/nav.tpl"}

<div id="content" class="grid_10">
    {include file="inc_ma/cat.tpl"}
  <div class="clear"></div>
  
    {foreach from=$messages item='message'}
    <table>
    <tr>
        <th><em>{$message.id}</em> {$message.username} 
        [<a href="?c=user&a=del&id={$message.id}" onclick="return confirm('确定要删除该留言吗?');">删除</a>]
        <strong>留言时间:</strong> {$message.updated}</th>
    </tr>
    <tr >
        <td ><strong>{$message.title}</strong></td>
    </tr>
    <tr>
        <td><blockquote>{$message.message}</blockquote></td>
    </tr>
    <tr>
        <td>
            <form method="post" action="?c=message&a=reply&id={$message.id}" >
            回复: <input type="text" name="reply" size="50" value="{$message.reply}" /> <input type="submit" value="Reply" />
            </form>
        </td>
    </tr>
    </table>
    {foreachelse}
    还没有用户留言...
    {/foreach}
    
    {$page}
</div>

{include file="inc_ma/footer.tpl"}