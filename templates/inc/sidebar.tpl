    <div class="nav">
        <p class="title">{$title}</p>
        <div class="menu">
            <ul>
                <li><a href="?c=news">公司动态</a></li>
            </ul>
        </div>
    </div>
    <div class="pro">
    <p class="title">设备与能力</p>
    <div class=" list">
        <ul>
            <li><img src="images/pro_01.jpg" /></li>
            <li><img src="images/pro_02.jpg" /></li>
            <li><img src="images/pro_03.jpg" /></li>
            <li><img src="images/pro_01.jpg" /></li>
            <li><img src="images/pro_02.jpg" /></li>
            <li><img src="images/pro_03.jpg" /></li>
        </ul>
    </div>
</div>

<div class="new">
    <p class="title">公司动态</p>
    <div class="list"> 
        <div id="scrollDiv">
            <ul>
                {foreach from=$top10 item="item"}
                <li><a href="?c=news&id={$item.id}">{$item.title}</a></li>
                {/foreach}
            </ul>
        </div>
    </div>
</div>

<div class="tu"><a href="Technical_services.html"><img src="images/jishu.jpg" /></a></div>
<div class="tu"><a href="message.html"><img src="images/kehu.jpg" /></a></div>

<div class="lianxi">
    <p class="title">联系我们</p>
    <p class="tong"><b>留言箱</b></p>
    <p><font>zwtx@163.com</font></p>
    <p class="tong"><b>销售热线</b></p>
    <p>
        Tel:0538-6929999&nbsp;&nbsp;6207727<br />
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;13884757288
    </p>
    <p>Far:0538-6207288</p>       
</div>
{literal}
<script type="text/javascript">
//滚动插件
(function($){
$.fn.extend({
    Scroll:function(opt,callback)
    {
        //参数初始化
        if(!opt) var opt={};
        var _this=this.eq(0).find("ul:first");
        var lineH=_this.find("li:first").height(), //获取行高
            line=opt.line?parseInt(opt.line,10):parseInt(this.height()/lineH,10), //每次滚动的行数，默认为一屏，即父容器高度
            speed=opt.speed?parseInt(opt.speed,10):500, //卷动速度，数值越大，速度越慢（毫秒）
            timer=opt.timer?parseInt(opt.timer,10):3000; //滚动的时间间隔（毫秒）
        if(line==0) line=1;
        var upHeight=0-line*lineH;
        //滚动函数
        scrollUp=function(){
            _this.animate({
                marginTop:upHeight
            },speed,function(){
                for(i=1;i<=line;i++)
                {
                    _this.find("li:first").appendTo(_this);
                }
                _this.css({marginTop:0});
            });
        }
        //鼠标事件绑定
        _this.hover(function(){
            clearInterval(timerID);
        },function(){
            timerID=setInterval("scrollUp()",timer);
        }).mouseout();
    }        
})
})(jQuery);

$("#scrollDiv").Scroll({line:1,speed:500,timer:2000});
</script>
{/literal}