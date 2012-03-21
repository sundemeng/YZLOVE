<?php
/*
+--------------------------------+
+ 本后台程序修改版权属于本人所有
+ Modified Author：林小先，lyixian@126.com www.linxiaoxian.com，QQ：6154041
+ 本文件最后修改日期：2010年1月
+ 如有修改，请保留本段信息，对您站没有影响
+--------------------------------+
*/
class yzlove_data{
	function getbirthday($str){
		$tmpbirthday1 = substr($str,0,4);
		$tmpbirthday2 = date("Y");
		$tmpbirthday  = $tmpbirthday2 - $tmpbirthday1;
		return $tmpbirthday.'岁';
	}
	function getlove($str){
		switch ($str){ 
		case 1:$tmpstr = "未婚";break;
		case 2:$tmpstr = "已婚";break;
		case 3:$tmpstr = "离异有子女";break;
		case 4:$tmpstr = "离异无子女";break;
		case 5:$tmpstr = "丧偶有子女";break;
		case 6:$tmpstr = "丧偶无子女";break;
		case 7:$tmpstr = "婚姻保密";break;
		}
		return $tmpstr;
	}
	function getloveX($str){
		switch ($str){ 
		case 1:$tmpstr = "未婚";break;
		case 2:$tmpstr = "已婚";break;
		case 3:$tmpstr = "离异有子女";break;
		case 4:$tmpstr = "离异无子女";break;
		case 5:$tmpstr = "丧偶有子女";break;
		case 6:$tmpstr = "丧偶无子女";break;
		case 7:$tmpstr = "保密";break;
		}
		return $tmpstr;
	}
	function getkind($str){
		switch ($str){ 
		case 1:$tmpstr = "都可以";break;
		case 2:$tmpstr = "约会交友";break;
		case 3:$tmpstr = "婚姻恋爱";break;
		case 4:$tmpstr = "红尘知己";break;
		case 5:$tmpstr = "以商会友";break;
		}
		return $tmpstr;
	}
	function gethouse($str){
		switch ($str){ 
		case 1:$tmpstr = "有婚房";break;
		case 2:$tmpstr = "有能力购房";break;
		case 3:$tmpstr = "无婚房";break;
		case 4:$tmpstr = "无婚房但可解决";break;
		case 5:$tmpstr = "无婚房希望对方解决";break;
		case 6:$tmpstr = "无婚房希望双方解决";break;
		}
		return $tmpstr;
	}
	function getcar($str){
		switch ($str){ 
		case 1:$tmpstr = "汽车";break;
		case 2:$tmpstr = "中档汽车";break;
		case 3:$tmpstr = "高档汽车";break;
		case 4:$tmpstr = "有能力购汽车";break;
		}
		return $tmpstr;
	}
	function getedu($str){
		switch ($str){ 
		case 1:$tmpstr = "初中及以下";break;
		case 2:$tmpstr = "高中或中专及以上";break;
		case 3:$tmpstr = "大专及以上";break;
		case 4:$tmpstr = "本科及以上";break;
		case 5:$tmpstr = "硕士及以上";break;
		case 6:$tmpstr = "博士及以上";break;
		}
		return $tmpstr;
	}
	function getpay($str){
		switch ($str){ 
		case 1:$tmpstr = "600元以下";break;
		case 2:$tmpstr = "600-799元";break;
		case 3:$tmpstr = "800-999元";break;
		case 4:$tmpstr = "1000-1499元";break;
		case 5:$tmpstr = "1500-1999元";break;
		case 6:$tmpstr = "2000-2999元";break;
		case 7:$tmpstr = "3000-3999元";break;
		case 8:$tmpstr = "4000-4999元";break;
		case 9:$tmpstr = "5000-5999元";break;
		case 10:$tmpstr = "6000-6999元";break;
		case 11:$tmpstr = "7000-9999元";break;
		case 12:$tmpstr = "10000-19999元";break;
		case 13:$tmpstr = "20000元以上";break;
		}
		return $tmpstr;
	}
	function getjob($str){
		switch ($str){ 
		case 1:$tmpstr = "企业管理人员";break;
		case 2:$tmpstr = "专家/教授";break;
		case 3:$tmpstr = "工程/技术人员";break;
		case 4:$tmpstr = "市场/销售人员";break;
		case 5:$tmpstr = "行政人员/文职秘书";break;
		case 6:$tmpstr = "普通职员";break;
		case 7:$tmpstr = "机关干部/公务人员";break;
		case 8:$tmpstr = "艺术家/演员";break;
		case 9:$tmpstr = "教师";break;
		case 10:$tmpstr = "工人";break;
		case 11:$tmpstr = "农民";break;
		case 12:$tmpstr = "军人";break;
		case 13:$tmpstr = "学生";break;
		case 14:$tmpstr = "自由职业者";break;
		case 15:$tmpstr = "离/退休人员";break;
		case 16:$tmpstr = "失业/无业";break;
		case 17:$tmpstr = "其他";break;
		}
		return $tmpstr;
	}
}
?>