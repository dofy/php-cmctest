{include file="inc/header.tpl"}

<div class="page_top">当前位置：<a href=".">首页</a> > <a href="?c={$__controller}&a=show">{$title}</a></div><!-- 当前位置 -->

<div class="left">
    <p class="left_title">{$title}&nbsp;&nbsp;Equipment and Capabilities</p>
    <p class="text">无锡中微腾芯电子有限公司,是经中国电子科技集团公司批准,由中电58所(51%)、无锡创投风险基金(5%)、自然人(44%)共
同发起成立的,专业从事集成电路测试服务的高新技术企业。<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;公司不仅具备集成电路测试开发、产品验证、批量生产、应用服务等各类测试配套能力，并且在国内DSP、CPU、专用
ASIC等高端集成电路测试领域，具有较强的基础和能力，享有较高的声誉，测试技术国内领先。</p> 
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