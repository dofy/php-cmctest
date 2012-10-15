{include file="inc_ma/header.tpl"}

{include file="inc_ma/nav.tpl"}

<div id="content" class="grid_10">
    {include file="inc_ma/cat.tpl"}
    
    <div class="grid_2 push_1" >
        <p ><a href="?c=news&a=edit" >添加新闻</a></p>
    </div>
    
    {if $m == 'ok'}
    <p class="msg" >新闻保存成功.</p>
    {/if}

    <table>
    <tr>
    <th>ID</th>
    <th>标题</th>
    <th>内容</th>
    <th>日期</th>
    <th>编辑</th>
    </tr>
    {foreach from=$news item='item'}
    <tr>
        <td class="text_right" >{$item.id}</td>
        <td>{$item.title}</td>
        <td>{$item.content|truncate:40:"...":false:true|escape:"html"}</td>
        <td>{$item.updated}</td>
        <td class="text_center" >
        <a href="?c=news&a=edit&id={$item.id}" >编辑</a> | 
        <a href="?c=news&a=del&id={$item.id}" onclick="return confirm('确定要删除该新闻吗?');">删除</a>
        </td>
    </tr>
    {/foreach}
    </table>
    
    <div id="page">{$page}</div>
    
</div>

{include file="inc_ma/footer.tpl"}