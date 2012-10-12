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
}

?>