{include file="inc_ma/header.tpl"}

{include file="inc_ma/nav.tpl"}

<div id="content" class="grid_10">
    {include file="inc_ma/cat.tpl"}
    
    <div class="grid_4 push_1" >
        新闻分类: 
        <select name="cid" onchange="location.href='?c=news&cid=' + this.value;" >
        {html_options options=$ids selected=$cid}
        </select>
        <a href="?c=news&a=edit&cid={$cid}" >添加新闻</a>
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
        <td>{$item.title|strip_tags} <em style="float: right;">({$item.times}次)</em></td>
        <td>{$item.content|strip_tags|truncate:40:"...":false:true}</td>
        <td>{$item.updated}</td>
        <td class="text_center" >
        <a href="?c=news&a=edit&cid={$cid}&id={$item.id}" >编辑</a> | 
        <a href="?c=news&a=del&id={$item.id}" onclick="return confirm('确定要删除该新闻吗?');">删除</a>
        </td>
    </tr>
    {/foreach}
    </table>
    
    <div id="page">{$page}</div>
    
</div>

{include file="inc_ma/footer.tpl"}