<?php
/**
 * Author:  Seven Yu
 * E-Mail:  dofyyu@gmail.com
 * Version: 1.0
 * Update:  11/20/08
 */
class SevenModule
{
    public $db;
    public function __construct()
    {
        $this->db = new SevenDB('', 'root', '', 'keywordlog');
    }
}
?>