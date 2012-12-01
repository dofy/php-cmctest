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
            alert('请填写新闻标题.');
            frm.title.focus();
            return false;
        }
        if(editor.isEmpty())
        {
            alert('请填写新闻内容.');
            editor.focus();
            return false;
        }
        return true;
    }
    </script>
    {/literal}
    <div class="clear" ></div>
    <form method="post" action="?c=news&a=save" onsubmit="return checkForm(this);" >
        <p >新闻分类:<select name="cid" >{html_options options=$ids selected=$cid}</select>
        标题:<input type="text" name="title" size="30" value="{$news.title}" />
        时间:{html_select_date start_year="-5" month_format="%m" time=$news.updated}</p>
        <p ><textarea name="content" rows="17" cols="77" >{$news.content|escape:"html"}</textarea></p>
        <p >
            <input type="submit" value="保存" />
            <input type="button" value="取消" onclick="location.href='?c=news&cid={$cid}'" />
            <input type="hidden" name="id" value="{$news.id}"/>
        </p>
    </form>

</div>

{include file="inc_ma/footer.tpl"}