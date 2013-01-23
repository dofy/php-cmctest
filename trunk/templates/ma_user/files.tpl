{include file="inc_ma/header.tpl"}

{include file="inc_ma/nav.tpl"}

<div id="content" class="grid_10">
    {include file="inc_ma/cat.tpl"}
  <div class="clear"></div>
  <div>
    <h3>{$user.name} 的文件列表</h3>
    {if $m}<div class="msg">{$m}</div>{/if}
    <form enctype="multipart/form-data" method="post" action="?c=user&a=upload&id={$user.id}">
        <input name="user_file" type="file" />
        <input type="submit" value="上传文件" />
    </form>
    <br />
    <strong>发送给用户的文件:</strong>
    <table>
        <tr><th>ID</th><th>Filename</th><th>Size</th><th>Action</th></tr>
        {foreach from=$inbox item='item' name='file'}
        <tr>
            <td>{$smarty.foreach.file.index + 1}</td>
            <td><a href="?c=user&a=download&id={$user.id}&d=inbox&f={$item.name}" target="_blank">{$item.name|base64_decode}</a></td>
            <td>{$item.size}</td>
            <td><a href="?c=user&a=delfile&id={$user.id}&d=inbox&f={$item.name}">删除</a></td>
        </tr>
        {/foreach}
    </table>
    <strong>来自用户的文件:</strong>
    <table>
        <tr><th>ID</th><th>Filename</th><th>Size</th><th>Action</th></tr>
        {foreach from=$outbox item='item' name='file'}
        <tr>
            <td>{$smarty.foreach.file.index + 1}</td>
            <td><a href="?c=user&a=download&id={$user.id}&d=outbox&f={$item.name}" target="_blank">{$item.name|base64_decode}</a></td>
            <td>{$item.size}</td>
            <td><a href="?c=user&a=delfile&id={$user.id}&d=outbox&f={$item.name}">删除</a></td>
        </tr>
        {/foreach}
    </table>
  </div>
</div>

{include file="inc_ma/footer.tpl"}