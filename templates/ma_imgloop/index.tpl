{include file="inc_ma/header.tpl"}

{include file="inc_ma/nav.tpl"}

<div id="content" class="grid_10">
    {include file="inc_ma/cat.tpl"}
    
	<link rel="stylesheet" href="editor/themes/default/default.css" />

    <script charset="utf-8" src="editor/kindeditor-min.js"></script>
    <script charset="utf-8" src="editor/lang/zh_CN.js"></script>
    {literal}
    <script>
    KindEditor.ready(function(K) {
        var editor = K.editor({
            allowFileManager : true
        });
        K('#upload-image').click(function() {
            editor.loadPlugin('image', function() {
                editor.plugin.imageDialog({
                    clickFn : function(url, title, width, height, border, align) {
                        alert(url);
                        editor.hideDialog();
                    }
                });
            });
        });
    });
    </script>
    {/literal}
    
    <div class="grid_2 push_1" >
        <p ><a id="upload-image" href="#" >添加图片</a></p>
    </div>

    <ul id="imgbox" class="grid_10" >
    {foreach from=$imgs item='item'}
    <li id="img_{$item.id}" class="box {if $item.show}box-selected{/if}" >
        <img src="{$item.url}" height="100" /></li>
    {/foreach}
    </ul>
    
</div>

{include file="inc_ma/footer.tpl"}