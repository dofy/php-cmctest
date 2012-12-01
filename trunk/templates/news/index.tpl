{include file="inc/header.tpl"}

<div class="page_top">当前位置：<a href="?">首页</a> > <a href="?c=news">公司动态</a></div><!-- 当前位置 -->



<div class="left">
            <p class="left_title">公司动态&nbsp;&nbsp;News</p>
            <div class="news">
            <ul>
            {foreach from=$news item='item'}
            <li class="bt"><a href="?c=news&a=article&id={$item.id}">{$item.title|strip_tags}</a><span>{$item.updated}</span></li>
            <li>{$item.content|strip_tags|truncate:150:"...":false:true}</li>
            {/foreach}
            </ul></div>
           

            </div><!-- /left -->
            
<div class="right">
      <div class="nav">
      <p class="title">公司动态</p>
      <div class="menu"><ul>
                        <li><a href="news.html">公司动态</a></li>
                        </ul></div>
      </div>
      <div class="pro">
      <p class="title">设备与能力</p>
      <div class=" list"><ul><li><img src="images/pro_01.jpg" /></li>
                             <li><img src="images/pro_02.jpg" /></li>
                             <li><img src="images/pro_03.jpg" /></li>
                             <li><img src="images/pro_01.jpg" /></li>
                             <li><img src="images/pro_02.jpg" /></li>
                             <li><img src="images/pro_03.jpg" /></li></ul></div>
      </div>
      
      <div class="new">
      <p class="title">公司动态</p>
      <div class="list"> 
      <div id="scrollDiv">
  <ul>
    <li><a href="#">这是公告标题的第一行第一行第一行第一行第一行</a></li>
    <li><a href="#">这是公告标题的第二行</a></li>
    <li><a href="#">这是公告标题的第三行</a></li>
    <li><a href="#">这是公告标题的第四行</a></li>
    <li><a href="#">这是公告标题的第五行</a></li>
    <li><a href="#">这是公告标题的第六行</a></li>
    <li><a href="#">这是公告标题的第七行</a></li>
    <li><a href="#">这是公告标题的第八行</a></li>
  </ul>
</div> </div>
      </div>
      
      <div class="tu"><a href="Technical_services.html"><img src="images/jishu.jpg" /></a></div>
      <div class="tu"><a href="message.html"><img src="images/kehu.jpg" /></a></div>
      
      <div class="lianxi">
      <p class="title">联系我们</p>
      <p class="tong"><b>留言箱</b></p>
      <p><font>zwtx@163.com</font></p>
      <p class="tong"><b>销售热线</b></p>
      <p>Tel:0538-6929999&nbsp;&nbsp;6207727<br />
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;13884757288</p>
      <p>Far:0538-6207288</p>       
      </div>
</div><!-- /right -->

</div><!-- /content -->



{include file="inc/footer.tpl"}