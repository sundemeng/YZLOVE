<style type="text/css"> 
a.pagecool,.pagecoolSelect,.pagecoolPre,.pagecoolNext,.pageInfo,.curtotalX,.pagecoolPreX,.pagecoolNextX{float:left;height:20px;font-family:Arial,宋体;color:#444;font-weight:bold}
a.pagecool,.pagecoolSelect{width:22px;height:18px;font-weight:bold;border:#ccc 1px solid;margin:0 3px 0 3px;text-align:center;line-height:18px}
a.pagecool{text-decoration:none;color:#444;background:#FBF9F9;display:block}
a.pagecool:hover,.pagecoolSelect{color:#f00;background:#ffc}
.pagecoolPre,.pagecoolNext{margin:0 8px 0 8px}
.pageInfo{line-height:20px;margin:0 0 0 8px;font-family:Verdana,Arial}
.pageInfo span{color:#f60}
.pagecoolPreX,.pagecoolNextX{margin:0 0 0 5px}
.curtotalX{color:#666;line-height:20px;margin:0 2px 0 0;font-weight:normal;font-family:Verdana,Arial;text-align:right}
</style>
<?php 
!function_exists('cdstr') && exit('Forbidden');
class zeaipage {
	private $page_name="p";
	private $pagesize=10;//每页显示记录条数
	private $total=0;//总的记录数
	private $pagebarnum=10;//bar数。
	private $totalpage=0;
	private $linkhead="";//url地址头
	private $current_pageno=1;//当前页
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
	/*当前页*/
	public function set_current_page($current_pageno=0) {
		if(empty($current_pageno)){
			if(isset($_GET[$this->page_name])){$this->current_pageno=intval($_GET[$this->page_name]);}
		}else{
			$this->current_pageno=intval($current_pageno);
		}
		if ($this->current_pageno>$this->totalpage)	header("Location:./");//$this->current_pageno=1
	}
	public function set_format($str) {return $this->format_left.$str.$this->format_right;}
	/* 获取显示"下一页"*/
	public function next_page() {
		if($this->current_pageno<$this->totalpage){
			return '<a href="'.$this->get_url($this->current_pageno+1).'">'.$this->next_page.'</a>';
		}
		return '';
	}
	/*获取显示“上一页”*/
	public function pre_page() {
		if($this->current_pageno>1){return '<a href="'.$this->get_url($this->current_pageno-1).'">'.$this->pre_page.'</a>';}
		return '';
	}
	/*获取显示“首页”*/
	public function first_page() {return '<a href="'.$this->get_url(1).'">'.$this->first_page."</a>";}
	/*获取显示“尾页”*/
	public function last_page() {return '<a href="'.$this->get_url($this->totalpage).'">'.$this->last_page.'</a>';}
	public function nowbar() {
		if ($this->totalpage > 1){
			$begin=$this->current_pageno-ceil($this->pagebarnum/2);
			$begin=($begin>=1)?$begin:1;
			$return='';
			for($i=$begin;$i<$begin+$this->pagebarnum;$i++){
				if($i<=$this->totalpage){
					if($i!=$this->current_pageno){
						$return.="<a href=".$this->get_url($i)." class=pagecool>".$i.'</a>';
					}else {
						$return.='<div class=pagecoolSelect>'.$i.'</div>';
					}
				}else{
					break;
				}
			}
			unset($begin);
		}	
		return $return;
	}
	/*“上一页”*/
	public function pre_bar()	{
		if($this->current_pageno>ceil($this->pagebarnum/2)){
				$pageno=$this->current_pageno-$this->pagebarnum;
				if($pageno<=0)$pageno=1;
				return $this->set_format('<a href="'.$this->get_url($pageno).'">'.$this->pre_bar."</a>");
		}
		return $this->set_format('<a href="'.$this->get_url(1).'">'.$this->pre_bar."</a>");
	}
	/*“下一页”*/
	public function next_bar()	{
		if($this->current_pageno<$this->totalpage-ceil($this->pagebarnum/2)){
				$pageno=$this->current_pageno+$this->pagebarnum;
				return $this->set_format('<a href="'.$this->get_url($pageno).'">'.$this->next_bar."</a>");
		}
		return $this->set_format('<a href="'.$this->get_url($this->totalpage).'">'.$this->next_bar."</a>");
	}
	/*跳转*/
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
	public function pagebar($mode=1){
		global $Global;
		$this->set_current_page();
		$this->get_linkhead();
		//return ("共有<font color=red><b>".$this->total."</b></font>条记录。");
		switch ($mode) {
			case 1:
				$this->pre_page='<img src='.$Global['www_2domain'].'/images/precool.gif title=上一页 class=pagecoolPre>';
				$this->next_page='<img src='.$Global['www_2domain'].'/images/nextcool.gif title=下一页 class=pagecoolNext>';
				return $this->pre_page().$this->nowbar().$this->next_page().'<div class=pageInfo>第<span>'.$this->current_pageno.'</span>页 / 共<span>'.$this->totalpage.'</span>页</div>';
			break;
			case 2:
				$this->pre_page='<img src='.$Global['www_2domain'].'/images/precoolX.gif title=上一页 class=pagecoolPreX>';
				$this->next_page='<img src='.$Global['www_2domain'].'/images/nextcool.gif title=下一页 class=pagecoolNextX>';
				return '<div class=curtotalX>'.$this->current_pageno.'/'.$this->totalpage.'</div>'.$this->pre_page().$this->next_page();
				//return '<div class=curtotalX>'.$this->total.'/'.$this->current_pageno.'/'.$this->totalpage.'</div>'.$this->pre_page().$this->next_page();
			break;
			case 3:
				$this->pre_page='<img src='.$Global['www_2domain'].'/images/precoolX.gif title=上一页 class=pagecoolPreX>';
				$this->next_page='<img src='.$Global['www_2domain'].'/images/nextcool.gif title=下一页 class=pagecoolNextX>';
				return '<div class=curtotalX>第'.$this->current_pageno.'页/共'.$this->totalpage.'页</div>'.$this->pre_page().$this->next_page();
			break;
		}
	}
}
?>