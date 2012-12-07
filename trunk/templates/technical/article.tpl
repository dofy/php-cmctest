{include file="inc/header.tpl"}

<div class="page_top">当前位置：<a href=".">首页</a> > <a href="?c=technical">技术服务</a> &gt; 正文</div><!-- 当前位置 -->

<div class="left">
    <p class="left_bt">{$news.title|strip_tags}</p>
    <p class="left_time">时间:{$news.updated}&nbsp;&nbsp;&nbsp;&nbsp;点击:{$news.times}次</p>
    <div class="text">{$news.content}</div>
<p class="left_hr"><img src="images/hr.jpg" /></p>
<p class="left_hr">
    <span class="s">上一篇：{if $newer}<a href="?c=technical&a=article&id={$newer.id}">{$newer.title|strip_tags}</a>{else}无{/if}</span>
    <span class="x">下一篇：{if $older}<a href="?c=technical&a=article&id={$older.id}">{$older.title|strip_tags}</a>{else}无{/if}</span>
</p>
</div><!-- /left -->

<div class="right">
    {include file="inc/sidebar.tpl"}
</div><!-- /right -->

</div><!-- /content -->

{include file="inc/footer.tpl"}