{include file="inc_ma/header.tpl"}

{include file="inc_ma/nav.tpl"}

<div id="content" class="grid_10">
    <p>{$user|ucfirst} 欢迎使用 Cmc Test Manager.</p>
    <p>
        您上次登录的
        <ul>
            <li>时间: {$updated}</li>
            <li>IP: {$lastip}</li>
        </ul>
        {if $notify}
        用户上传文件通知:
        <ul>
            {foreach from=$notify item='item'}
            <li>用户 <a href="?c=user&a=files&id={$item.uid}">{$item.username}</a> 上传了 {$item.c} 个文件</li>
            {/foreach}
        </ul>
        {/if}
    </p>
</div>

{include file="inc_ma/footer.tpl"}