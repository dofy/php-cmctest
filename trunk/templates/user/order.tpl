{include file="inc/header.tpl"}

<div class="page_top">当前位置：<a href=".">首页</a> > <a href="?c={$__controller}">{$title}</a></div><!-- 当前位置 -->

<div class="left">
    <p class="left_title">{$title}&nbsp;&nbsp;My Order</p>
    <div class="text myfiles" >
    
    <strong>下载数据:</strong>
    <table>
        <tr><th>ID</th><th>Filename</th><th>Size</th></tr>
        {foreach from=$inbox item='item' name='file'}
        <tr>
            <td>{$smarty.foreach.file.index + 1}</td>
            <td><a href="?c=user&a=download&d=inbox&f={$item.name}" target="_blank">{$item.name|base64_decode}</a></td>
            <td>{$item.size}</td>
        </tr>
        {/foreach}
    </table>
    
    <strong>上传我的文件:</strong>

    <form enctype="multipart/form-data" method="post" action="?c=user&a=upload">
    
    {if $m}<div class="msg">{$m}</div>{/if}
    
    <table>
        <tr><td colspan="4"><input name="user_file" type="file" /><input type="submit" value="上传文件" /></td></tr>
        <tr><th>ID</th><th>Filename</th><th>Size</th><th>Action</th></tr>
        {foreach from=$outbox item='item' name='file'}
        <tr>
            <td>{$smarty.foreach.file.index + 1}</td>
            <td><a href="?c=user&a=download&d=outbox&f={$item.name}" target="_blank">{$item.name|base64_decode}</a></td>
            <td>{$item.size}</td>
            <td><a href="?c=user&a=delfile&f={$item.name}">删除</a></td>
        </tr>
        {/foreach}
    </table>

    </form>

    
    </div>

</div><!-- /left -->
            
<div class="right">
    {include file="inc/sidebar.tpl"}
</div><!-- /right -->

</div><!-- /content -->

{include file="inc/footer.tpl"}