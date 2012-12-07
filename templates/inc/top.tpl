<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{$title} - 无锡中微腾芯电子有限公司欢迎您!</title>
<link href="css/css.css" type="text/css" rel="stylesheet" />
<script src="js/jquery-1.8.2.min.js" ></script>
</head>

<body>
<div class="header">
    <div class="top_1">
        <span class="l">无锡中微腾芯电子有限公司欢迎您!</span>
        <span class="r">
            {if $curuser}
            <strong>Welcome <a href="?c=user">{$curuser.name}</a></strong> | <a href="?c=login&a=logout" >退出登录</a>
            {else}
            <a href="?c=login">登陆</a>&nbsp;&nbsp;|<a href="?c=login&a=register">注册</a> 
            {/if}
            <a href="#">[ 设为首页 ]</a> <a href="#">[ 加入收藏 ]</a>
        </span>
    </div><!-- top_1 -->
    <div class="top_2">
        <span class="l"><img src="images/logo.jpg" alt="中微腾芯" /></span>
        <span class="r">
            <ul>
                <li><a href="." {if $__controller == "default" || $__controller == "user"}class="h_01"{/if}>首页</a></li>
                <li><a href="?c=about" {if $__controller == "about"}class="h_01"{/if}>关于腾芯</a></li>
                <li><a href="?c=product" {if $__controller == "product"}class="h_01"{/if}>设备与能力</a></li>
                <li><a href="?c=technical" {if $__controller == "technical"}class="h_01"{/if}>技术服务</a></li>
                <li><a href="?c=news" {if $__controller == "news"}class="h_01"{/if}>公司动态</a></li>
                <li><a href="?c=job" {if $__controller == "job"}class="h_01"{/if}>人力资源</a></li>
                <li><a href="?c=message" {if $__controller == "message"}class="h_01"{/if}>客户留言</a></li>
                <li><a href="?c=contact" {if $__controller == "contact"}class="h_01"{/if}>联系我们</a></li>
            </ul>
        </span>
    </div><!-- top_2 -->             
</div><!-- header上部 -->
