{include file="inc/header.tpl"}

<div class="page_top">当前位置：<a href=".">首页</a> > <a href="?c={$__controller}">{$title}</a></div><!-- 当前位置 -->

<div class="left">
    <p class="left_title">{$title}&nbsp;&nbsp;My Message</p>
         
    <p class="text">注册时间：{$curuser.joinin}<br />登录次数：{$curuser.times}<br />最后登录时间：{$curuser.updated}</p>

    <p class="text_bg"><span>姓&nbsp;&nbsp;&nbsp;&nbsp;名：{$curuser.name}</span>
                       <span>用户名：{$curuser.username}</span>
                       <span>E-MAIL：{$curuser.email}</span>
                       </p>
                       
    <p class="text_bg"><span>性&nbsp;&nbsp;&nbsp;&nbsp;别：{if $curuser.sex}男{else}nv{/if}</span>
                       <span>地&nbsp;&nbsp;&nbsp;&nbsp;址：{$curuser.addr}</span>
                       <span>邮政编码：{$curuser.postcode}</span>
                       <span>联系电话：{$curuser.tel}</span>
                       </p>
                       
    <p class="text_bg"><span>所在地区：{$curuser.province}&nbsp;&nbsp;{$curuser.city}</span></p>
</div><!-- /left -->
            
<div class="right">
    {include file="inc/sidebar.tpl"}
</div><!-- /right -->

</div><!-- /content -->

{include file="inc/footer.tpl"}