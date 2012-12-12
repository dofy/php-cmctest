{include file="inc_ma/header.tpl"}

{include file="inc_ma/nav.tpl"}

<div id="content" class="grid_10">
    {include file="inc_ma/cat.tpl"}
    
    <div class="grid_4 push_1" >
        <a href="?c=links&a=edit&cid={$cid}" >添加链接</a>
    </div>
    
    {if $m == 'ok'}
    <p class="msg" >链接保存成功.</p>
    {/if}

    <table>
    <tr>
    <th>ID</th>
    <th>标题</th>
    <th>地址</th>
    <th>日期</th>
    <th>编辑</th>
    </tr>
    {foreach from=$links item='item'}
    <tr>
        <td class="text_right" >{$item.id}</td>
        <td>{$item.title|strip_tags}</td>
        <td>{$item.href}</td>
        <td>{$item.updated}</td>
        <td class="text_center" >
        <a href="?c=links&a=edit&id={$item.id}" >编辑</a> | 
        <a href="?c=links&a=del&id={$item.id}" onclick="return confirm('确定要删除该链接吗?');">删除</a>
        </td>
    </tr>
    {/foreach}
    </table>
    
</div>

{include file="inc_ma/footer.tpl"}