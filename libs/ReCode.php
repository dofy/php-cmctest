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
    
    public $mode;
    public $length;
    public $font;
    public $paddingTB;
    public $paddingLR;
    public $frontColor;
    public $backgroundColor;

    public function __construct($mode = null, $length = 4, $font = 3, $paddingTB = 3, $paddingLR = 10, $frontColor = 0xffffff, $backgroundColor = 0)
    {
        $this->mode = is_null($mode) ? self::MODE_NUMERAL : $mode;
        $this->length = $length;
        $this->font = $font;
        $this->paddingTB = $paddingTB;
        $this->paddingLR = $paddingLR;
        $this->frontColor = $frontColor;
        $this->backgroundColor = $backgroundColor;
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

    public function getImage($session_key, $noise = 0)
    {
        session_start();
        $_SESSION[$session_key] = $this->getCode();
        $font_width = imagefontwidth($this->font);
        $font_height = imagefontheight($this->font);
        
        $width = $font_width * $this->length + $this->paddingLR * 2;
        $height = $font_height + $this->paddingTB * 2;
        
        $im = imagecreatetruecolor($width, $height);
        imagefill($im, 0, 0, $this->backgroundColor);
        imagestring($im, $this->font, $this->paddingLR, $this->paddingTB, $_SESSION[$session_key], $this->frontColor);
        
        for($i = 0; $i < $noise; $i++)
        {
            imagesetpixel($im, rand(0, $width), rand(0, $height), $this->frontColor);
        }
        
        header('Content-type: image/png');
        imagepng($im);
    }

}

/**
 * 废了
 * */
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

?>