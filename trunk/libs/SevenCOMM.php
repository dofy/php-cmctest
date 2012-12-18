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
    
    static public function delSs($key)
    {
        unset($_SESSION[$key]);
    }
    
    static public function clrSs()
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
    
    static public function fileSizeFormat($size)
    {
        if($size < 1024)
        {
            return $size . ' bytes';
        }
        elseif($size < 1024 * 1024)
        {
            return round($size / 1024 * 100) / 100 . ' KB';
        }
        else
        {
            return round($size / 1024 / 1024 * 100) / 100 . ' MB';
        }
    }
    
    static function unlinkRecursive($dir, $deleteRootToo = false) 
    { 
        if(!$dh = @opendir($dir)) 
        { 
            return;
        } 
        while (false !== ($obj = readdir($dh))) 
        { 
            if($obj == '.' || $obj == '..') 
            { 
                continue; 
            }
            
            if (!@unlink($dir . '/' . $obj)) 
            { 
                self::unlinkRecursive($dir.'/'.$obj, true); 
            } 
        }
        
        closedir($dh); 
        
        if ($deleteRootToo) 
        { 
            @rmdir($dir); 
        } 
        
        return; 
    } 
}

?>