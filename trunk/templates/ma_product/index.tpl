{include file="inc_ma/header.tpl"}

{include file="inc_ma/nav.tpl"}

<div id="content" class="grid_10">
    {include file="inc_ma/cat.tpl"}

    <div class="grid_2 push_1" >
        <p ><a href="?c=product&a=edit" >添加产品</a></p>
    </div>

    <ul id="imgbox" class="grid_10" >
    {foreach from=$product item='item'}
    <li id="img_{$item.id}"  class="box" >
        <img src="{$item.url}" height="100" />
        <div >{$item.title}</div>
    </li>
    {foreachelse}
    <li >还没有添加产品...</li>
    {/foreach}
    </ul>
    
    <div class="clear"></div>

    {$page}
</div>

{include file="inc_ma/footer.tpl"}