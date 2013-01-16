{include file="inc/header.tpl"}

<div class="page_top">当前位置：<a href=".">首页</a> > <a href="?c={$__controller}">{$title}</a></div><!-- 当前位置 -->

<div class="left">
    <p class="left_title">{$title}&nbsp;&nbsp;Equipment and Capabilities</p>
    <p class="text">
    {$content.content}
    </p> 
    <div class="equ">
        {foreach from=$product item="item"}
        <span class="l">
        <p>产品名称：{$item.title}</p>
        <p class="bg"><img src="{$item.url}" width="230" height="165" /></p>
        <p class="js">产品解释：{$item.content|strip_tags|truncate:100:"..."}</p>
        <hr />
        <p class="xx"><a href="?c=product&a=article&id={$item.id}">详细内容</a></p>
        </span>
        {/foreach}
    </div>

</div><!-- /left -->
            
<div class="right">
    {include file="inc/sidebar.tpl"}
</div><!-- /right -->

</div><!-- /content -->



{include file="inc/footer.tpl"}