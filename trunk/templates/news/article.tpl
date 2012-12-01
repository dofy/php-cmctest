{include file="inc/header.tpl"}
<div class="page_top">当前位置：<a href="index.html">首页</a> > <a href="news.html">公司动态</a> &gt; 正文</div><!-- 当前位置 -->

<div class="left">
    <p class="left_bt">{$news.title|strip_tags}</p>
    <p class="left_time">时间:{$news.updated}&nbsp;&nbsp;&nbsp;&nbsp;来源:网络&nbsp;&nbsp;&nbsp;&nbsp;点击:93次</p>
    <p class="text">{$news.content}</p>
<p class="left_hr"><img src="images/hr.jpg" /></p>
<p class="left_hr">
    <span class="s">上一篇：{if $newer}<a href="?c=news&a=article&id={$newer.id}">{$newer.title|strip_tags}</a>{else}无{/if}</span>
    <span class="x">下一篇：{if $older}<a href="?c=news&a=article&id={$older.id}">{$older.title|strip_tags}</a>{else}无{/if}</span>
</p>
</div><!-- /left -->

<div class="right">
    {include file="inc/sidebar.tpl"}
</div><!-- /right -->

</div><!-- /content -->

{include file="inc/footer.tpl"}