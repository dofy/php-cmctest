<?php

class COMM
{
    static public function gets($key, $default = null)
    {
        if(isset($_GET[$key]))
            return $_GET[$key];
        else
            return $default;
    }

    static public function posts($key, $default = null)
    {
        if(isset($_POST[$key]))
            return $_POST[$key];
        else
            return $default;
    }
    
    static public function getSs($key, $default = null)
    {
        if(isset($_SESSION[$key]))
            return $_SESSION[$key];
        else
            return $default;
    }
    
    static public function delSc($key)
    {
        unset($_SESSION[$key]);
    }
    
    static public function clrSc()
    {
        session_unset();
    }
    
    static public function getCk($key, $default = null)
    {
        if(isset($_COOKIE[$key]))
            return $_COOKIE[$key];
        else
            return $default;
    }
    
    static public function setCk($key, $value, $expire = 0)
    {
        if($expire > 0)
            $exprite += time();
            
        setcookie($key, $value, $expire);
    }
    
    static public function delCk($key)
    {
        setcookie($key, null);
    }
}

?>