<?php
/**
 * Author:  Seven Yu
 * E-Mail:  dofyyu@gmail.com
 * Version: 1.0
 * Update:  11/20/08
 */

/**
 * 生态城翻页链接
 **/
class SevenPager
{
	public $page;
	public $pagesize;
	public $pagecount;
	public $recordcount;
	
	public $beforeBlock;
	public $afterBlock;
	public $beforeItem;
	public $afterItem;
	
    public function __construct($pageInfo = array(), $htmlTags = array())
    {
		$this->page        = $pageInfo['page']        ? $pageInfo['page']        : 1;
		$this->pagesize    = $pageInfo['pagesize']    ? $pageInfo['pagesize']    : 20;
		$this->pagecount   = $pageInfo['pagecount']   ? $pageInfo['pagecount']   : 0;
		$this->recordcount = $pageInfo['recordcount'] ? $pageInfo['recordcount'] : 0;
		
		$this->beforeBlock = isset($htmlTags['beforeBlock']) ? $htmlTags['beforeBlock'] : '<ul>';
		$this->afterBlock  = isset($htmlTags['afterBlock'])  ? $htmlTags['afterBlock']  : '</ul>';
		$this->beforeItem  = isset($htmlTags['beforeItem'])  ? $htmlTags['beforeItem']  : '<li>';
		$this->afterItem   = isset($htmlTags['afterItem'])   ? $htmlTags['afterItem']   : '</li>';
    }
	
	public function create($pstr = 'page', $offset = 3)
	{
		echo self::createHtml($pstr, $offset);
	}
	
	public function createHtml($pstr = 'page', $offset = 3)
	{
		if($offset > 0)
		{
			$min = max(1, $this->page - $offset);
			$max = min($this->pagecount, $this->page + $offset);
		}
		else
		{
			$min = 1;
			$max = $this->pagecount;
		}
		$html = $this->beforeBlock;
		// show the firset page or not
		if($min > 1)
			$html .= $this->beforeItem . self::linkHtml($pstr, 1) . self::dots();
		
		for($i = $min; $i <= $max; $i++)
			$html .= $this->beforeItem . self::linkHtml($pstr, $i);
		
		// show the last page or not
		if($max < $this->pagecount)
			$html .= self::dots() . $this->beforeItem . self::linkHtml($pstr, $this->pagecount);
		
		$html .= $this->afterBlock;
		
		return $html;
	}
	
	private function linkHtml($pstr, $num)
	{
		return '<a href="' . self::getURL($pstr) . $num . '" ' . ($this->page == $num ? 'class="curpage"' : '') . '>' . $num . '</a>';
	}
	
	private function dots()
	{
		return $this->beforeItem . '..' . $this->afterItem;
	}
	
	private function getURL($pstr)
	{
		$url = $_SERVER['PHP_SELF'] . '?';
		foreach($_GET as $k => $v)
		{
			if(strtolower($k) != strtolower($pstr))
			   $url .= $k . '=' . urlencode($v) . '&';
		}
		$url .= $pstr . '=';
		
		return $url;
	}
}
?>