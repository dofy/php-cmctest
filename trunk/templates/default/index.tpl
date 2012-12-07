{include file="inc/header.tpl"}

<div class="four_img">
    {foreach from=$imgs item='item' name='img'}
    <span class="f_0{$smarty.foreach.img.index + 1}"><img src="{$item.url}" width="200" height="100" /></span>
    {/foreach}
</div>

<div class="a_n_c">
<div class="about">
<img src="" width="205" height="80" style="float:left; visibility: hidden;" />
{$about.content}
</div><!-- about -->
<div class="n_c">
<div class="news">
    <ul>
        {foreach from=$news item='item'}
        <li><span>{$item.updated}</span><a href="?c=news&a=article&id={$item.id}">{$item.title|strip_tags|truncate:17:"..."}</a></li>
        {/foreach}
    </ul>
</div>
    
<div></div>
<div class="contact">
{$contact.content}
</div>

</div><!-- n_c -->

</div><!-- a_n_c -->

<div class="y_link">
    <span class="title">友情链接</span> 
    <span class="link"><a href="#">友情链接</a> <a href="#">友情链接</a> <a href="#">友情链接</a></span>
</div>

</div><!-- content中部 -->

{include file="inc/footer.tpl"}
