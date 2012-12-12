{include file="inc_ma/header.tpl"}

{include file="inc_ma/nav.tpl"}

<div id="content" class="grid_10">
    {include file="inc_ma/cat.tpl"}

    {include file="inc_ma/editor.tpl"}

    {literal}
    <script >
    function checkForm(frm)
    {
        if($.trim(frm.title.value) == '')
        {
            alert('请填写链接名称.');
            frm.title.focus();
            return false;
        }
        if($.trim(frm.href.value) == '')
        {
            alert('请填写链接地址.');
            frm.href.focus();
            return false;
        }
        return true;
    }
    </script>
    {/literal}
    <div class="clear" ></div>
    <form method="post" action="?c=links&a=save" onsubmit="return checkForm(this);" >
        <p >链接名称:<input type="text" name="title" size="30" value="{$links.title}" /></p>
        <p >链接地址:<input type="text" name="href" size="50" value="{$links.href}" /></p>
        <p >
            <input type="submit" value="保存" />
            <input type="button" value="取消" onclick="location.href='?c=links'" />
            <input type="hidden" name="id" value="{$links.id}"/>
        </p>
    </form>

</div>

{include file="inc_ma/footer.tpl"}