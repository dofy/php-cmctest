
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js" ></script>
{literal}
<script >
$(function()
{
    $.getJSON('api/news.php', function(data)
    {
        for (var i = 0, l = data.length; i < l; i++)
        {
            alert(data[i].title);
        }
    });
});
</script>
{/literal}
<div id="debug" ></div>
<form>
    <input type="text" name="test" />
    <input type="submit" />
</form>