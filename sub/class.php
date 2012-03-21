<?php 
!function_exists('cdstr') && exit('Forbidden');
class uobarpage {
	private $page_name="p";
	private $pagesize=10;//每页显示记录条数
	private $total=0;//总的记录数
	private $pagebarnum=10;//控制记录条的个数。
	private $totalpage=0;//总页数
	private $linkhead="";//url地址头
	private $current_pageno=1;//当前页
	/**显示符号设置*/
	private $next_page='>';//下一页
	private $pre_page='<';//上一页
	private $first_page='First';//首页
	private $last_page='Last';//尾页
	private $pre_bar='<<';//上一分页条
	private $next_bar='>>';//下一分页条
	private $format_left=' [';
	private $format_right='] ';
	public function __construct($total,$pagesize=10) {		
		if((!is_int($total))||($total<0))die("记录总数错误！");
		if((!is_int($pagesize))||($pagesize<0))die("Pagesize错误！");
		$this->set("total",$total);
		$this->set("pagesize",$pagesize);
		$this->set('totalpage',ceil($total/$pagesize));
	}
	public function set($var,$value){
		if(in_array($var,get_object_vars($this)))
		   $this->$var=$value;
		else {
				throw new PB_Page_Exception("Error in set():".$var." does not belong to PB_Page!");
		}
	}
	public function get_linkhead() {
		$this->set_current_page();
		if(empty($_SERVER['QUERY_STRING'])){
			 $this->linkhead=$_SERVER['REQUEST_URI']."?".$this->page_name."=";
		}else{
			if(isset($_GET[$this->page_name])){                                
					$this->linkhead=str_replace($this->page_name.'='.$this->current_pageno,$this->page_name.'=',$_SERVER['REQUEST_URI']);
			} else {
					$this->linkhead=$_SERVER['REQUEST_URI'].'&'.$this->page_name.'=';
			}
		}
	}
	/*为指定的页面返回地址值*/
	public function get_url($pageno=1){
		if(empty($this->linkhead))$this->get_linkhead();
		return str_replace($this->page_name.'=',$this->page_name.'='.$pageno,$this->linkhead);
	}
	/*设置当前页面*/
	public function set_current_page($current_pageno=0) {
		if(empty($current_pageno)){
			if(isset($_GET[$this->page_name])){
				 $this->current_pageno=intval($_GET[$this->page_name]);
			}
		}else{
				$this->current_pageno=intval($current_pageno);
		}
		if ($this->current_pageno>$this->totalpage)	header("Location:./");//$this->current_pageno=1
	}
	public function set_format($str) {return $this->format_left.$str.$this->format_right;}
	/* 获取显示"下一页"*/
	public function next_page() {
		if($this->current_pageno<$this->totalpage){
				return '　<a href="'.$this->get_url($this->current_pageno+1).'">'.$this->next_page.'</a>　';
		}
		return '';
	}
	/*获取显示“上一页”*/
	public function pre_page() {
	if($this->current_pageno>1){return '<a href="'.$this->get_url($this->current_pageno-1).'">'.$this->pre_page.'</a>　';}
		return '';
	}
	/*获取显示“首页”*/
	public function first_page() {return '<a href="'.$this->get_url(1).'">'.$this->first_page."</a>";}
	/*获取显示“尾页”*/
	public function last_page() {return '<a href="'.$this->get_url($this->totalpage).'">'.$this->last_page.'</a>';}
	//gyl1
	public function nowbar() {
		if ($this->totalpage > 1){
			$begin=$this->current_pageno-ceil($this->pagebarnum/2);
			$begin=($begin>=1)?$begin:1;
			$return='';
			for($i=$begin;$i<$begin+$this->pagebarnum;$i++){
				if($i<=$this->totalpage){
					if($i!=$this->current_pageno)
						$return.=" <a href=".$this->get_url($i)." class=a666>".'<span class=page1 onMouseOver=this.style.background="ffffcc" onMouseOut=this.style.background="FBF9F9"><b>'.$i.'</b></span>'.'</a>&nbsp;';
					else 
						$return.=' <span class=page2><b>'.$i.'</b></span>&nbsp;';
				}else{
					break;
				}
			}
			unset($begin);
		}	
		return $return;
	}
	/*获取显示“上一分页条”*/
	public function pre_bar()	{
		if($this->current_pageno>ceil($this->pagebarnum/2)){
				$pageno=$this->current_pageno-$this->pagebarnum;
				if($pageno<=0)$pageno=1;
				return $this->set_format('<a href="'.$this->get_url($pageno).'">'.$this->pre_bar."</a>");
		}
		return $this->set_format('<a href="'.$this->get_url(1).'">'.$this->pre_bar."</a>");
	}
	/*获取显示“下一分页条”*/
	public function next_bar()	{
		if($this->current_pageno<$this->totalpage-ceil($this->pagebarnum/2)){
				$pageno=$this->current_pageno+$this->pagebarnum;
				return $this->set_format('<a href="'.$this->get_url($pageno).'">'.$this->next_bar."</a>");
		}
		return $this->set_format('<a href="'.$this->get_url($this->totalpage).'">'.$this->next_bar."</a>");
	}
	/*获取显示跳转按钮*/
	public function select()	{
		$return='<select name="PB_Page_Select" onchange="window.location.href=\''.$this->linkhead.'\'+this.options[this.selectedIndex].value">';
		for($i=1;$i<=$this->totalpage;$i++){
			if($i==$this->current_pageno){
					$return.='<option value="'.$i.'" selected>'.$i.'</option>';
			}else{
					$return.='<option value="'.$i.'">'.$i.'</option>';
			}
		}
		$return.='</select>';
		return $return;
	}
	/*获取mysql 语句中limit需要的值*/
	public function limit2(){
		//return ("共有<font color=red><b>".$this->total."</b></font>条记录。");
		//return ('共有<font color=red>'.$this->total.'</font>条记录。第<font color=red>'.$this->current_pageno)."</font>页/共<font color=red>".$this->totalpage.'</font>页';
		if ($this->totalpage > 1){
			return ('<span style="height:20px;padding-top:3px;">当前第 <b>'.$this->current_pageno.' / '.$this->totalpage.'</b> 页</span>');
		}
	}
	public function pagebar($mode=1){
		global $Global;
		$this->set_current_page();
		$this->get_linkhead();
		$this->next_page='<img src='.$Global['www_2domain'].'/images/next.gif border=0 align=absmiddle alt=下一页>';
		$this->pre_page='<img src='.$Global['www_2domain'].'/images/pre.gif border=0 align=absmiddle alt=上一页>';
		return $this->pre_page().$this->nowbar().$this->next_page();
		//return $this->pre_page().$this->nowbar().$this->next_page().'第'.$this->select().'页';
	}
}
?>