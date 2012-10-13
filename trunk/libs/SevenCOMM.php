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
        return $_SESSION[$key] or $default;
    }
    
    static public function setSs($key, $value)
    {
        $_SESSION[$key] = $value;
    }
    
    static public function delSc($key)
    {
        
    }
    
    static public function clrSc()
    {
        session_unset();
    }
}

?>