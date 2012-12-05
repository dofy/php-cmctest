{include file="inc/top.tpl"}

<div class="content">
    <form method="post" action="?c=login&a=save" >
    <div style="width:960px; height:405px ; background:url(images/Register.jpg) no-repeat;padding:90px 0 0 228px;">
           <p class="dl">
           <b style="color:#f00;">&nbsp;{$msg}</b>
           <b class="t">用 户 名：<input name="username" type="text" /></b>
           <b class="h">登录密码：<input name="password" type="password" /></b>
           <b class="h">确认密码：<input name="rpass" type="password" /></b>
           <b class="h">真实姓名：<input name="name" type="text" /></b>
           <b class="h">电子邮箱：<input name="email" type="text" /></b>
           <b class="h">联系电话：<input name="tel" type="text" /></b>
           <b class="h">联系地址：<input name="addr" type="text" /></b>
           <b class="h">邮政编码：<input name="postcode" type="text" /></b>
           <b class="xb">性  别： 
            <input type="radio" name="sex" value="1" checked /> 男  
            <input type="radio" name="sex" value="0" /> 女</b>
           <b class="qrzc"><input type="submit" style="background:url(images/qrzc.jpg) no-repeat;" value="" /></b>
           </p>
       </div>
    </form>
</div><!-- content中部 -->

{include file="inc/footer.tpl"}