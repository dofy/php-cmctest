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

    {literal}
    <script>
    $(function()
    {
        $('#del-proxy').click(function (e) {
            e.stopPropagation();
            var item = $(e.currentTarget),
                id   = item.data('id');
            if(confirm('确定要删除该产品吗?'))
            {
                $.getJSON('?c=product&a=del',
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
            .on('mouseenter', '.box', function(e) {
                var item = $(e.currentTarget),
                    id   = item.data('id');
                $('#del-proxy').show().prependTo(item).data('id', id);
            })
            .on('mouseleave', '.box', function(e) {
                $('#del-proxy').hide();
            });
    });
    </script>
    {/literal}

    <div class="grid_4 push_1" >
        <!--
        产品分类: 
        <select name="cid" onchange="location.href='?c=product&cid=' + this.value;" >
        {html_options options=$ids selected=$cid}
        </select>
        -->
        <a href="?c=product&a=edit&cid={$cid}" >添加产品</a>
    </div>

    <ul id="imgbox" class="grid_10" >
    {foreach from=$product item='item'}
    <li id="img_{$item.id}" data-id="{$item.id}" class="box" >
        <a href="?c=product&a=edit&cid={$item.cid}&id={$item.id}" ><img src="{$item.url}" height="100" /></a>
        <div >{$item.title}</div>
    </li>
    {foreachelse}
    <li >还没有添加产品...</li>
    {/foreach}
    </ul>
    
    <div class="clear"></div>

    {$page}
</div>
<span id="del-proxy">X</span>

{include file="inc_ma/footer.tpl"}