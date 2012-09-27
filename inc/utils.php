<?php

function getv($key, $dftValue = null)
{
    return isset($_GET[$key]) ? 
        $_GET[$key] : 
        $dftValue;
}

function postv($key, $dftValue = null)
{
    return isset($_POST[$key]) ?
        $_POST[$key] :
        $dftValue;
}

function cookv($key, $dftValue = null)
{
    return isset($_COOKIE[$key]) ?
        $_COOKIE[$key] :
        $dftValue;
}

?>