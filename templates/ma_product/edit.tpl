{include file="inc_ma/header.tpl"}

{include file="inc_ma/nav.tpl"}

<div id="content" class="grid_10">
    {include file="inc_ma/cat.tpl"}
    <div class="clear"></div>

    {include file="inc_ma/editor.tpl"}
    
	<link rel="stylesheet" href="editor/themes/default/default.css" />

    <script charset="utf-8" src="editor/kindeditor-min.js"></script>
    <script charset="utf-8" src="editor/lang/zh_CN.js"></script>
    {literal}
    <script >
    KindEditor.ready(function(K) {
        var editor = K.editor({
            allowFileManager : true
        });
        K('#img_upload').click(function() {
            editor.loadPlugin('image', function() {
                editor.plugin.imageDialog({
                    imageUrl: K('#form_url').attr('value'),
                    clickFn : function(url, title, width, height, border, align) {
                        K('#form_url').attr('value', url);
                        K('#img_upload').attr('src', url);
                        editor.hideDialog();
                    }
                });
            });
        });
    });
    function checkForm(frm)
    {
        if($.trim(frm.title.value) == '')
        {
            alert('请填写商品名称.');
            frm.title.focus();
            return false;
        }
        if(frm.url.value == '')
        {
            alert('请上传商品图片.');
            return false;
        }
        if(editor.isEmpty())
        {
            alert('请填写商品描述.');
            editor.focus();
            return false;
        }
        return true;
    }
    </script>
    {/literal}
    <div class="clear" ></div>
    <form method="post" action="?c=product&a=save" onsubmit="return checkForm(this);" >
        <p >名称: <input type="text" name="title" size="40" value="{$product.title}" /></p>
        <div class="grid_6 alpha" ><textarea name="content" rows="17" cols="50" >{$product.content|escape:"html"}</textarea></div>
        <div class="grid_4 omega" ><img id="img_upload" src="{$product.url|default:'images/img.png'}" width="200" /></div>
        <div class="clear" ></div>
        <p >
            <input type="submit" value="保存" />
            <input type="button" value="取消" onclick="location.href='?c=product'" />
            <input type="hidden" name="id" value="{$product.id}"/>
            <input id="form_url" type="hidden" name="url" value="{$product.url}"/>
        </p>
    </form>

</div>

{include file="inc_ma/footer.tpl"}