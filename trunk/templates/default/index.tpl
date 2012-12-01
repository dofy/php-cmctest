{include file="inc/header.tpl"}

<div class="four_img">
    {foreach from=$imgs item='item' name='img'}
    <span class="f_0{$smarty.foreach.img.index + 1}"><img src="{$item.url}" width="200" height="100" /></span>
    {/foreach}
</div>

<div class="a_n_c">
<div class="about">
<p class="a_01">无锡中微腾芯电子有限公司,是经中国电子科技集团公司批准,由中电58所(51%)、<br />无锡创投风险基金(5%)、自然人(44%)共同发起成立的,专业从事集成电路测试<br />服务的高新技术企业。</p>
<p class="a_02">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;公司不仅具备集成电路测试开发、产品验证、批量生产、应用服务等各类测试配套能力，并且在国内DSP、CPU专用ASIC等高端集成电路测试领域，具有较强的基础和能力，享有较高的声誉，测试技术国内领先。</p></div><!-- about -->
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
    TEL 电话：010 - 8888-8888<br />
    E-MAIL 邮箱：<a href="mailto:zwtx@163.com">zwtx@163.com</a>
</div>

</div><!-- n_c -->

</div><!-- a_n_c -->

<div class="y_link">
    <span class="title">友情链接</span> 
    <span class="link"><a href="#">友情链接</a> <a href="#">友情链接</a> <a href="#">友情链接</a></span>
</div>

</div><!-- content中部 -->

{include file="inc/footer.tpl"}
