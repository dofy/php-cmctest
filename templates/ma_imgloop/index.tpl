{include file="inc_ma/header.tpl"}

{include file="inc_ma/nav.tpl"}

<style>
#del-proxy {
    display: none;
    position: absolute;
    padding: 3px 7px;
    background-color: #fcc;
    z-index: 999;
    cursor: pointer;
}
</style>

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
                        $.getJSON('?c=imgloop&a=add',
                            {'url': url},
                            function(data) {
                                if(data.error == 0)
                                {
                                    var img = $('<li id="img_' + data.id + '" class="box" ><img src="' + data.url + '" height="120" /></li>');
                                    img.data({'id': data.id, 'show': 0});
                                    $('#imgbox').append(img);
                                }
                                else
                                {
                                    alert(data.msg);
                                }
                            });
                        editor.hideDialog();
                    }
                });
            });
        });
        
        $('#del-proxy').click(function (e) {
            e.stopPropagation();
            var item = $(e.currentTarget),
                id   = item.data('id');
            if(confirm('确定要删除该图片吗?'))
            {
                $.getJSON('?c=imgloop&a=del',
                    {'id': id},
                    function(data) {
                        if(data.error == 0)
                        {
                            $('#img_' + data.id).fadeOut();
                        }
                        else
                        {
                            alert(data.msg);
                        }
                    });
            }
        });

        $('#imgbox')
            //.sortable()
            .on('mouseenter', '.box', function(e) {
                var item = $(e.currentTarget),
                    id   = item.data('id');
                $('#del-proxy').show().prependTo(item).data('id', id);
            })
            .on('mouseleave', '.box', function(e) {
                $('#del-proxy').hide();
            })
            .on('click', '.box', function(e) {
                var item = $(e.currentTarget),
                    id   = item.data('id'),
                    show = item.data('show');
                $.getJSON('?c=imgloop&a=show',
                    {'id': id, 'show': show},
                    function(data) {
                        if(data.error == 0)
                        {
                            var img = $('#img_' + data.id);
                            var show = data.show;
                            img.data('show', show);
                            show == 0 ? img.removeClass('box-selected') : img.addClass('box-selected');
                        }
                        else
                        {
                            alert(data.msg);
                        }
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
    <li id="img_{$item.id}" data-id="{$item.id}" data-show="{$item.show}" class="box {if $item.show}box-selected{/if}" >
        <img src="{$item.url}" height="120" />
    </li>
    {foreachelse}
    <li >还没有添加图片...</li>
    {/foreach}
    </ul>
    
</div>
<span id="del-proxy">X</span>

{include file="inc_ma/footer.tpl"}