<?php

class SevenUploader
{
    
    const SAME_NAME   = 'same_name';
    const AUTO_INDEX  = 'auto_index';
    const RANDOM_NAME = 'random_name';
    
    private $exts;
    private $form_field;
    private $max_size;
    
    public function __construct($exts, $form_field, $max_size)
    {
        $this->exts       = $exts;
        $this->form_field = $form_field;
        $this->max_size   = $max_size;
        $this->code       = $code;
    }
    
    public function upload($folder, $newName)
    {
        $error = $_FILES[$this->form_field]['error'];
        if (!empty($error))
        {
            switch($error)
            {
                case '1':
                    $msg = '超过php.ini允许的大小。';
                    break;
                case '2':
                    $msg = '超过表单允许的大小。';
                    break;
                case '3':
                    $msg = '文件只有部分被上传。';
                    break;
                case '4':
                    $msg = '请选择文件。';
                    break;
                case '6':
                    $msg = '找不到临时目录。';
                    break;
                case '7':
                    $msg = '写文件到硬盘出错。';
                    break;
                case '8':
                    $msg = 'File upload stopped by extension。';
                    break;
                case '999':
                default:
                    $msg = '未知错误。';
            }
            return array('code'=> $error, 'msg'=> $msg);
        }
        
        $file_name = $_FILES[$this->form_field]['name'];
        $tmp_name  = $_FILES[$this->form_field]['tmp_name'];
        $file_size = $_FILES[$this->form_field]['size'];
        
        $parts = explode('.', $file_name);
        $ext = strtolower(array_pop($parts));
        
        if(!in_array($ext, $this->exts))
        {
            return array('code'=> 701, 'msg'=> '只允许上传下列类型的文件: ' . join(', ', $this->exts));
        }
        
        if($file_size > $this->max_size)
        {
            return array('code'=> 702, 'msg'=> '文件超过允许的大小（' . $this->max_size . '）。');
        }
        
        if(!file_exists($folder))
        {
            mkdir($folder, 0644, true);
        }
        
        $name = $this->getNewName($folder, $file_name, $newName);
        
        if (move_uploaded_file($tmp_name, $folder . '/' . $name) === false)
        {
            return array('code'=> 702, 'msg'=> '上传文件失败。');
        }
        else
        {
            return array('code'=> 0, 'msg'=> '上传成功。', 'name'=> $name);
        }
    }
    
    /**
     * 获取新文件名
     */
    private function getNewName($folder, $fileName, $newName)
    {
        $parts = explode('.', $fileName);
        $ext = strtolower(array_pop($parts));
        
        switch($newName)
        {
            case self::SAME_NAME:
                return base64_encode($fileName);
                break;
            
            case self::AUTO_INDEX:
                $ind = 0;
                $name = join('.', $parts);
                $full_name = $folder . '/' . base64_encode($name . '.' . $ext);
                
                if(!file_exists($full_name))
                {
                    return base64_encode($name . '.' . $ext);
                }
                else
                {
                    while(true)
                    {
                        $result = base64_encode($name . '_' . ++$ind . '.' . $ext);
                        if(!file_exists( $folder . '/' . $result))
                            return $result;
                    }
                }
                break;
            
            case self::RANDOM_NAME:
                return base64_encode(md5(time()) . '.' . $ext);
                break;
            default:
                return base64_encode($newName);
                break;
        }
    }
    
}

?>