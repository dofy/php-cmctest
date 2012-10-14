{include file="inc_ma/header.tpl"}

{include file="inc_ma/nav.tpl"}

<div id="content" class="grid_10">
    <p>{$user|ucfirst} 欢迎使用 Cmc Test Manager.</p>
    <p>
        您上次登录的
        <ul>
            <li>时间: {$updated}</li>
            <li>IP: {$lastip}</li>
    </p>
</div>

{include file="inc_ma/footer.tpl"}