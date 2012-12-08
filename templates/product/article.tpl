{include file="inc/header.tpl"}
<div class="page_top">当前位置：<a href=".">首页</a> > <a href="?c={$__controller}">{$title}</a> &gt; {$product.title|strip_tags}</div><!-- 当前位置 -->

<div class="left">
    <p class="left_title">{$title}&nbsp;&nbsp;Equipment and Capabilities</p>
    <div class="text">
    <span class="equ_page_r"><img src="{$product.url}" width="230" height="165" /></span>
    {$product.content}</div>
</div><!-- /left -->

<div class="right">
    {include file="inc/sidebar.tpl"}
</div><!-- /right -->

</div><!-- /content -->

{include file="inc/footer.tpl"}