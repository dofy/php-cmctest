{include file="inc/header.tpl"}

<div class="page_top">当前位置：<a href=".">首页</a> > <a href="?c={$__controller}">{$title}</a></div><!-- 当前位置 -->

<div class="left">
    <p class="left_title">{$title}&nbsp;&nbsp;My Message</p>
    <div class="text" >
    {foreach from=$mymessage item="item" name="msg"}
    <p class="text_mm"><span class="lou">{$smarty.foreach.msg.index + 1}楼</span><span class="bt"><b>标&nbsp;&nbsp;&nbsp;&nbsp;题</b>：{$item.title|strip_tags}</span></p>
    <p class="text_mm"><span><b>时&nbsp;&nbsp;&nbsp;&nbsp;间</b>：{$item.updated}</span></p>
    <p class="text_mm"><span><b>留&nbsp;&nbsp;&nbsp;&nbsp;言</b>：{$item.message|strip_tags}</span></p>
    {if $item.reply}
    <p class="text_mm"><span class="lou">管理员</span><span class="bt"><b>回复留言</b>：{$item.reply}</span></p>
    {/if}
    <br /><br />
    {foreachelse}
    您还没有留言, 请转到 [<a href="?c=message">客户留言</a>] 页面.
    {/foreach}
    </div>
</div><!-- /left -->
            
<div class="right">
    {include file="inc/sidebar.tpl"}
</div><!-- /right -->

</div><!-- /content -->

{include file="inc/footer.tpl"}