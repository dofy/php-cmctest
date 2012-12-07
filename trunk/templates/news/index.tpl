{include file="inc/header.tpl"}

<div class="page_top">当前位置：<a href=".">首页</a> > <a href="?c={$__controller}&a=show">{$title}</a></div><!-- 当前位置 -->



<div class="left">
            <p class="left_title">{$title}&nbsp;&nbsp;News</p>
            <div class="news">
            <ul>
            {foreach from=$news item='item'}
            <li class="bt"><a href="?c=news&a=article&id={$item.id}">{$item.title|strip_tags}</a><span>{$item.updated}</span></li>
            <li>{$item.content|strip_tags|truncate:150:"...":false:true}</li>
            {/foreach}
            </ul></div>
           

            </div><!-- /left -->
            
<div class="right">
    {include file="inc/sidebar.tpl"}
</div><!-- /right -->

</div><!-- /content -->



{include file="inc/footer.tpl"}