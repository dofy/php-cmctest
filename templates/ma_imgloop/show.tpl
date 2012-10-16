{
    "error": {$error},
    {if $error > 0}
    "msg": "{$msg}"
    {else}
    "id": {$id},
    "show": {$show}
    {/if}
}