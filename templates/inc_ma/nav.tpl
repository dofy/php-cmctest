<div id="nav" class="grid_2">
    <ul>
        <li><a href="?">管理首页</a></li>
        {if $lvl == 1}
        <li><a href="?c=news">新闻管理</a></li>
        <li><a href="?c=imgloop">轮播图片</a></li>
        <li><a href="?c=page">静态页面</a></li>
        <li><a href="?c=product">设备与能力</a></li>
        <li><a href="?c=message">留言管理</a></li>
        {/if}
        <li><a href="?c=user">用户管理</a></li>
        {if $lvl == 1}
        <li><a href="?c=links">友情链接</a></li>
        <li><a href="?c=manager">管理员</a></li>
        {/if}
        <li>---------</li>
        <li><a href="?c=manager&a=chgpass">修改密码</a></li>
        <li><a href="?c=login&a=logout">退出登录</a></li>
    </ul>
</div>