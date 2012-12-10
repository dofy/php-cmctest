<?php
/**
 * Author:  Seven Yu
 * E-Mail:  dofyyu@gmail.com
 * Version: 
 * Update:  
 */

class ReCode
{
    const NUMERAL = '0123456789';
    const CHARACTER = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

    const MODE_NUMERAL = 'mode_numeral';
    const MODE_CHARACTER = 'mode_character';
    const MODE_ALL = 'mode_all';
    
    private $mode;
    private $length;
    private $fontsize;
    private $padding;
    private $frontColor;
    private $backgroundColor;


    public function __construct($mode = null, $length = 4, $fontsize = 14, $padding = 5, RGBColor $frontColor = null, RGBColor $backgroundColor = null)
    {
        $this->mode = is_null($mode) ? self::MODE_NUMERAL : $mode;
        $this->length = $length;
        $this->fontsize = $fontsize;
        $this->padding = $padding;
        $this->frontColor = is_null($frontColor) ? new RGBColor(0xff, 0xff, 0xff) : $frontColor;
        $this->backgroundColor = is_null($backgroundColor) ? new RGBColor() : $backgroundColor;
		
    }

    private function getCode()
    {
        $result = '';
        switch($this->mode)
        {
            case self::MODE_NUMERAL:
                $chars = self::NUMERAL;
                break;
            case self::MODE_CHARACTER:
                $chars = self::CHARACTER;
                break;
            case self::MODE_ALL:
            default:
                $chars = self::NUMERAL . self::CHARACTER;
                break;
        }
        
        $len = strlen($chars);
        for($i = 0; $i < $this->length; $i++)
        {
            $index = rand(0, $len - 1);
            $result .= $chars[$index];
        }
        
        return $result;
    }

    public function getImage($session_key = 'recode')
    {
        $_SESSION[$session_key] = $this->getCode();
        
        echo $_SESSION[$session_key];
    }

}

class RGBColor
{
    private $data = array('R'=>0, 'G'=>0, 'B'=>0, 'A'=>0);
    
    public function __construct($R = 0, $G = 0, $B = 0, $A = 0)
    {
        $this->data['R'] = $R;
        $this->data['G'] = $G;
        $this->data['B'] = $B;
        $this->data['A'] = $A;
    }
    
    public function __set($name, $value)
    {
        if(array_key_exists($name, $this->data))
        {
            if($name == 'A')
            {
                $value = max(0, min(127, $value));
            }
            else
            {
                $value = max(0, min(255, $value));
            }
            $this->data[$name] = $value;
        }
    }
    
    public function __get($name)
    {
        if(array_key_exists($name, $this->data))
        {
            return $this->data[$name];
        }
        return null;
    }
}

$rc = new ReCode();

echo $rc->getImage();

?>