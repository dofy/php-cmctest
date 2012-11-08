{include file="inc_ma/header.tpl"}

{include file="inc_ma/nav.tpl"}

<div id="content" class="grid_10">
    {include file="inc_ma/cat.tpl"}

    {include file="inc_ma/editor.tpl"}

    <div class="clear" ></div>
    <form method="post" action="?c=page&a=save" >
        <p > 选择页面: 
        <select name="id" onchange="location.href='?c=page&id=' + this.value;" >
        {html_options options=$ids selected=$id}
        </select>
        </p>
        <p ><textarea name="content" rows="17" cols="77" >{$page.content|escape:"html"}</textarea></p>
        <p >
            <input type="submit" value="保存" />
            <input type="button" value="取消" onclick="location.href='?c=page'" />
        </p>
    </form>

</div>

{include file="inc_ma/footer.tpl"}