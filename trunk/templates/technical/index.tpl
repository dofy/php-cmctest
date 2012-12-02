{include file="inc/header.tpl"}

<div class="page_top">当前位置：<a href=".">首页</a> > <a href="?c=technical">技术服务</a></div><!-- 当前位置 -->

<div class="left">
            <p class="left_title">技术服务&nbsp;&nbsp;Technical Services</p>
            <p class="text">无锡中微腾芯电子有限公司,是经中国电子科技集团公司批准,由中电58所(51%)、无锡创投风险基金(5%)、自然人(44%)共
同发起成立的,专业从事集成电路测试服务的高新技术企业。<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;公司不仅具备集成电路测试开发、产品验证、批量生产、应用服务等各类测试配套能力，并且在国内DSP、CPU、专用
ASIC等高端集成电路测试领域，具有较强的基础和能力，享有较高的声誉，测试技术国内领先。</p> 

            <div class="news">
            <ul>
            {foreach from=$news item='item'}
            <li class="bt"><a href="?c=technical&a=article&id={$item.id}">{$item.title|strip_tags}</a><span>{$item.updated}</span></li>
            <li>{$item.content|strip_tags|truncate:150:"...":false:true}</li>
            {/foreach}
            </ul></div>
           

            </div><!-- /left -->
            
<div class="right">
    {include file="inc/sidebar.tpl"}
</div><!-- /right -->

</div><!-- /content -->



{include file="inc/footer.tpl"}