<?php require_once '../sub/init.php';
//
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trim($cook_password);$rt = $db->query("SELECT * FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if ($db->num_rows($rt)) {$row = $db->fetch_array($rt);} else {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
//
if ($submitok=="modupdate") {
	if ( !ereg("^[0-9]{1,3}$",$weigh) && !empty($weigh) )callmsg("体重(请选输入三位数字)","-1");
	if ( !ereg("^[0-9]{1,2}$",$tx) && !empty($tx) )callmsg("请选择体形！","-1");
	if ( !ereg("^[0-9]{1,2}$",$star) && !empty($star) )callmsg("请选择星座！","-1");
	if ( !ereg("^[0-9]{1,2}$",$blood) && !empty($blood) )callmsg("请选择血型！","-1");
	if ( !ereg("^[1-9]{1}$",$zhongjiao) && !empty($zhongjiao) )callmsg("请选择宗教信仰！","-1");
	if ( !ereg("^[1-9]{1}$",$house) && !empty($house) )callmsg("请选择住房状况！","-1");
	if ( !ereg("^[1-9]{1}$",$car) && !empty($car) )callmsg("请选择交通工具！","-1");
	if ( !ereg("^[1-9]{1}$",$clothing) && !empty($clothing) )callmsg("请选择着装！","-1");
	if ( !ereg("^[1-9]{1}$",$edu) && !empty($edu) )callmsg("请选择教育程度！","-1");
	if ( !ereg("^[0-9]{1,2}$",$field) && !empty($field) )callmsg("请选择行业！","-1");
	if ( !ereg("^[0-9]{1,2}$",$job) && !empty($job) )callmsg("请选择职业！","-1");
	if ( !ereg("^[0-9]{1,2}$",$pay) && !empty($pay) )callmsg("请选择月收入！","-1");
	if ( strlen($school) > 50 )callmsg("毕业院校(长度限50字节25汉字以内)","-1");
	if ( strlen($nianwang) > 240 )callmsg("最难忘的事(长度限240字节或120汉字以内)","-1");
	if ( strlen($xinyuan) > 240 )callmsg("近期的心愿(长度限240字节或120汉字以内)","-1");
	if ( !ereg("^[1-9]{1}$",$smoking) && !empty($smoking) )callmsg("请选择吸烟习惯！","-1");
	if ( !ereg("^[1-9]{1}$",$drink) && !empty($drink) )callmsg("请选择饮酒习惯！","-1");
	if ( strlen($gexin) > 240 )callmsg("我的个性(长度限240字节或120汉字以内)","-1");
	if ( strlen($xinrong) > 240 )callmsg("朋友形容我(长度限240字节或120汉字以内)","-1");
	if ( strlen($youshi) > 240 )callmsg("我的优势(长度限240字节或120汉字以内)","-1");
	if ( strlen($xinqu) > 240 )callmsg("兴趣爱好(长度限240字节或120汉字以内)","-1");
	if ( strlen($huoban) > 240 )callmsg("希望寻找的伙伴(长度限240字节或120汉字以内)","-1");
	$weigh  = empty($weigh)?0:$weigh;
	$tx  = empty($tx)?0:$tx;
	$star  = empty($star)?0:$star;
	$blood  = empty($blood)?0:$blood;
	$zhongjiao  = empty($zhongjiao)?0:$zhongjiao;
	$house  = empty($house)?0:$house;
	$car  = empty($car)?0:$car;
	$clothing  = empty($clothing)?0:$clothing;
	$edu  = empty($edu)?0:$edu;
	$field  = empty($field)?0:$field;
	$job  = empty($job)?0:$job;
	$pay  = empty($pay)?0:$pay;
	$smoking  = empty($smoking)?0:$smoking;	
	$drink  = empty($drink)?0:$drink;	
	
	
	$db->query("UPDATE ".__TBL_MAIN__." SET weigh='$weigh',tx='$tx',star='$star',blood='$blood',zhongjiao='$zhongjiao',house='$house',car='$car',clothing='$clothing',edu='$edu',field='$field',job='$job',pay='$pay',school='$school',nianwang='$nianwang',xinyuan='$xinyuan',smoking='$smoking',drink='$drink',gexin='$gexin',xinrong='$xinrong',youshi='$youshi',xinqu='$xinqu',huoban='$huoban',ifmod=0 WHERE id='$cook_userid'");
	callmsg("修改成功！","a3.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $Global['m_titile']; ?></title>
<link href="my.css" rel="stylesheet" type="text/css">
<style type="text/css"> 
<!--
.main1 {width:754px;height:28px;margin-left:28px;overflow:hidden;margin-top:15px;background-image:url(images/sontgg.gif);padding-left:16px;z-index: 100;}
.main1_tselect {float:left;width:70px;height:27px;background:#F0FAE9;border-left:#CCE1B5 1px solid;border-top:#CCE1B5 1px solid;border-right:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;color:#6F9F00;}
.main1_t {float:left;width:70px;height:26px;border:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;}
.main2 {width:754px;background:#F0FAE9;margin-left:28px;border-left:#CCE1B5 1px solid;border-bottom:#CCE1B5 1px solid;border-right:#CCE1B5 1px solid;padding:7px;}
.main2_frame {width:752px;background:#fff;border:#D8EAC4 1px solid;overflow:hidden;}
--> 
</style>
</head>
<script language="JavaScript" type="text/javascript" src="a2.js"></script>
<body>
<div class="main1">
	<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="a1.php" class="a333">基本资料</a></div>
	<div class="main1_tselect" >详细资料</div>
	<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="a3.php" class="a333">内心独白</a></div>
	<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="a4.php" class="a333">联系方法</a></div>
	<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="a5.php" class="a333">约会交友</a></div>
	<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="a6.php" class="a333">婚姻恋爱</a></div>
	<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="a7.php" class="a333">红尘知己</a></div>
	<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="a8.php" class="a333">以商会友</a></div>
	<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="a9.php" class="a333">修改密码 </a></div>

</div>

<div class="main2">
  <div class="main2_frame"><br />
<table width="564" border="0" align="center" cellpadding="2" cellspacing="0" style="color:#666666">
<script language="JavaScript" type="text/javascript">
function chkform(){
	if(document.YZLOVEFORM.weigh.value.length>12 || document.YZLOVEFORM.weigh.value.length<1){
	alert('请输入正确的体重');
	document.YZLOVEFORM.weigh.focus();
	return false;}
	if(document.YZLOVEFORM.tx.value==""){
	alert('请选择“体形”！');
	document.YZLOVEFORM.tx.focus();
	return false;
	}
	if(document.YZLOVEFORM.clothing.value==""){
	alert('请选择“着装”！');
	document.YZLOVEFORM.clothing.focus();
	return false;
	}
	if(document.YZLOVEFORM.star.value==""){
	alert('请选择“星座”！');
	document.YZLOVEFORM.star.focus();
	return false;
	}
	if(document.YZLOVEFORM.blood.value==""){
	alert('请选择“血型”！');
	document.YZLOVEFORM.blood.focus();
	return false;
	}

	if(document.YZLOVEFORM.zhongjiao.value==""){
	alert('请选择“宗教信仰”！');
	document.YZLOVEFORM.zhongjiao.focus();
	return false;
	}
<?php if ($row['ifhouse'] == 0 ){?>
	if(document.YZLOVEFORM.house.value==""){
	alert('请选择“住房”！');
	document.YZLOVEFORM.house.focus();
	return false;
	}
<?php }?>
<?php if ($row['ifcar'] == 0 ){?>
	if(document.YZLOVEFORM.car.value==""){
	alert('请选择“交通工具”！');
	document.YZLOVEFORM.car.focus();
	return false;
	}
<?php }?>
<?php if ($row['ifedu'] == 0 ){?>
	if(document.YZLOVEFORM.edu.value==""){
	alert('请选择“学历”！');
	document.YZLOVEFORM.edu.focus();
	return false;
	}
<?php }?>
<?php if ($row['ifedu'] == 0 ){?>
	if(document.YZLOVEFORM.edu.value==""){
	alert('请选择“学历”！');
	document.YZLOVEFORM.edu.focus();
	return false;
	}
<?php }?>
	if(document.YZLOVEFORM.field.value==""){
	alert('请选择“工作行业”！');
	document.YZLOVEFORM.field.focus();
	return false;
	}
	if(document.YZLOVEFORM.job.value==""){
	alert('请选择“职业”！');
	document.YZLOVEFORM.job.focus();
	return false;
	}	
<?php if ($row['ifpay'] == 0 ){?>
	if(document.YZLOVEFORM.pay.value==""){
	alert('请选择“月收入”！');
	document.YZLOVEFORM.pay.focus();
	return false;
	}
<?php }?>








}
</script>
        <form action="" method="post" name=YZLOVEFORM onSubmit="return chkform()">
          <tr>
            <td width="164" height="35" align="right">体重 / 体形 / 着装：</td>
            <td width="392" style="color:#999999;"><input name="weigh" type="text"  class=input id="weigh" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php echo $row['weigh'];?>" size="3" maxlength="3">
公斤(kg) /
  <select name="tx">
    <option value="">请选择</option>
    <option value="1" <?php if ($row['tx']==1)echo "selected"; ?>>清瘦</option>
    <option value="2" <?php if ($row['tx']==2)echo "selected"; ?>>苗条</option>
    <option value="3" <?php if ($row['tx']==3)echo "selected"; ?>>中等</option>
    <option value="4" <?php if ($row['tx']==4)echo "selected"; ?>>健壮</option>
    <option value="5" <?php if ($row['tx']==5)echo "selected"; ?>>略胖</option>
    <option value="6" <?php if ($row['tx']==6)echo "selected"; ?>>匀称</option>
    <option value="7" <?php if ($row['tx']==7)echo "selected"; ?>>瘦小</option>
    <option value="8" <?php if ($row['tx']==8)echo "selected"; ?>>矮胖</option>
    <option value="9" <?php if ($row['tx']==9)echo "selected"; ?>>大个</option>
    <option value="10" <?php if ($row['tx']==10)echo "selected"; ?>>肥胖</option>
    <option value="11" <?php if ($row['tx']==11)echo "selected"; ?>>性感</option>
  </select>
/ 
<select name="clothing">
  <option value="">请选择</option>
  <option value="1" <?php if ($row['clothing']==1)echo "selected"; ?>>休闲</option>
  <option value="2" <?php if ($row['clothing']==2)echo "selected"; ?>>正统</option>
  <option value="3" <?php if ($row['clothing']==3)echo "selected"; ?>>前卫</option>
  <option value="4" <?php if ($row['clothing']==4)echo "selected"; ?>>随便</option>
</select></td>
          </tr>
          <tr>
            <td height="35" align="right">星座 / 血型 / 宗教信仰：</td>
            <td style="color:#999999;"><select name="star" size="1" id="select5"  >
                <option value="">请选择</option>
                <option value="1" <?php if ($row['star']==1)echo "selected"; ?>>魔羯座(12/22-01/19)</option>
                <option value="2" <?php if ($row['star']==2)echo "selected"; ?>>水瓶座(01/20-02/18)</option>
                <option value="3" <?php if ($row['star']==3)echo "selected"; ?>>双鱼座(02/19-03/20)</option>
                <option value="4" <?php if ($row['star']==4)echo "selected"; ?>>白羊座(03/21-04/19)</option>
                <option value="5" <?php if ($row['star']==5)echo "selected"; ?>>金牛座(04/20-05/20)</option>
                <option value="6" <?php if ($row['star']==6)echo "selected"; ?>>双子座(05/21-06/21)</option>
                <option value="7" <?php if ($row['star']==7)echo "selected"; ?>>巨蟹座(06/22-07/22)</option>
                <option value="8" <?php if ($row['star']==8)echo "selected"; ?>>狮子座(07/23-08/22)</option>
                <option value="9" <?php if ($row['star']==9)echo "selected"; ?>>处女座(08/23-09/22)</option>
                <option value="10" <?php if ($row['star']==10)echo "selected"; ?>>天秤座(09/23-10/23)</option>
                <option value="11" <?php if ($row['star']==11)echo "selected"; ?>>天蝎座(10/24-11/22)</option>
                <option value="12" <?php if ($row['star']==12)echo "selected"; ?>>射手座(11/23-12/21)</option>
              </select>
              /
              <select name="blood" id="blood">
                <option value="">请选择</option>
                <option value="1" <?php if ($row['blood']==1)echo "selected"; ?>>A</option>
                <option value="2" <?php if ($row['blood']==2)echo "selected"; ?>>B</option>
                <option value="3" <?php if ($row['blood']==3)echo "selected"; ?>>AB</option>
                <option value="4" <?php if ($row['blood']==4)echo "selected"; ?>>O</option>
                <option value="5" <?php if ($row['blood']==5)echo "selected"; ?>>其他或未知</option>
              </select>
              /
              <select name="zhongjiao" class="tf43" id="zhongjiao" >
                <option value="">请选择</option>
                <option value="1" <?php if ($row['zhongjiao']==1)echo "selected"; ?>>无神论者</option>
                <option value="2" <?php if ($row['zhongjiao']==2)echo "selected"; ?>>佛教</option>
                <option value="3" <?php if ($row['zhongjiao']==3)echo "selected"; ?>>基督教</option>
                <option value="4" <?php if ($row['zhongjiao']==4)echo "selected"; ?>>道教</option>
                <option value="5" <?php if ($row['zhongjiao']==5)echo "selected"; ?>>伊斯兰教</option>
                <option value="6" <?php if ($row['zhongjiao']==6)echo "selected"; ?>>天主教</option>
                <option value="7" <?php if ($row['zhongjiao']==7)echo "selected"; ?>>有神论者</option>
                <option value="8" <?php if ($row['zhongjiao']==8)echo "selected"; ?>>其他</option>
              </select></td>
          </tr>
          <tr>
            <td height="35" align="right"><img src="images/sfz_x.gif" width="9" height="9" />住　　房： </td>
            <td style="color:#999999;"><?php if ($row['ifhouse'] == 0 ){?><select name=house>
                <option value="">请选择</option>
                <option value="1" <?php if ($row['house']==1)echo "selected"; ?>>有婚房</option>
                <option value="2" <?php if ($row['house']==2)echo "selected"; ?>>有能力购房</option>
                <option value="3" <?php if ($row['house']==3)echo "selected"; ?>>无婚房</option>
                <option value="4" <?php if ($row['house']==4)echo "selected"; ?>>无婚房但可解决</option>
                <option value="5" <?php if ($row['house']==5)echo "selected"; ?>>无婚房希望对方解决</option>
                <option value="6" <?php if ($row['house']==6)echo "selected"; ?>>无婚房希望双方解决</option>
              </select>
              <font color="#FF0000"><img src="images/delx.gif" width="10" height="10" hspace="3">未认证</font>
              <?php }else{ ?>
              <input name="house" type="hidden" value="<?php echo $row['house'];?>">
              <font color="#333333"><?php
switch ($row['house']){ 
case 1:echo "有住房";break;
case 2:echo "有能力购房";break;
case 3:echo "无住房";break;
case 4:echo "无住房但可解决";break;
case 5:echo "无住房希望对方解决";break;
case 6:echo "无住房希望双方解决";break;
}
?></font>　<font color="#009900"><img src="images/ok.gif" hspace="3" align="absmiddle">已认证</font>
              <?php }?></td>
          </tr>
          <tr>
            <td height="35" align="right"> <img src="images/sfz_x.gif" width="9" height="9" />交通工具：</td>
            <td style="color:#999999;"><?php if ($row['ifcar'] == 0 ){?><select name=car>
              <option value="">请选择</option>
              <option value="1" <?php if ($row['car']==1)echo "selected"; ?>>汽车</option>
              <option value="2" <?php if ($row['car']==2)echo "selected"; ?>>中档汽车</option>
              <option value="3" <?php if ($row['car']==3)echo "selected"; ?>>高档汽车</option>
              <option value="4" <?php if ($row['car']==4)echo "selected"; ?>>有能力购汽车</option>
              <option value="5" <?php if ($row['car']==5)echo "selected"; ?>>其他</option>
            </select>
              <font color="#FF0000"><img src="images/delx.gif" width="10" height="10" hspace="3">未认证</font>
              <?php }else{ ?>
              <input name="car" type="hidden" value="<?php echo $row['car'];?>">
              <font color="#333333">
<?php
switch ($row['car']){ 
case 1:echo "汽车";break;
case 2:echo "中档汽车";break;
case 3:echo "高档汽车";break;
case 4:echo "有能力购汽车";break;
case 5:echo "其他";break;
}
?>
              </font>　<font color="#009900"><img src="images/ok.gif" hspace="3" align="absmiddle">已认证</font>
              <?php }?></td>
          </tr>
          <tr>
            <td height="35" align="right"><img src="images/sfz_x.gif" width="9" height="9" />学　　历：</td>
            <td style="color:#999999;"><?php if ($row['ifedu'] == 0 ){?><select name="edu">
                <option value="">请选择</option>
                <option value="1" <?php if ($row['edu']==1)echo "selected"; ?>>初中及以下</option>
                <option value="2" <?php if ($row['edu']==2)echo "selected"; ?>>高中或中专及以上</option>
                <option value="3" <?php if ($row['edu']==3)echo "selected"; ?>>大专及以上</option>
                <option value="4" <?php if ($row['edu']==4)echo "selected"; ?>>本科及以上</option>
                <option value="5" <?php if ($row['edu']==5)echo "selected"; ?>>硕士及以上</option>
                <option value="6" <?php if ($row['edu']==6)echo "selected"; ?>>博士及以上</option>
              </select>
              <font color="#FF0000"><img src="images/delx.gif" width="10" height="10" hspace="3">未认证</font>
              <?php }else{ ?>
              <input name="edu" type="hidden" value="<?php echo $row['edu'];?>">
              <font color="#333333">
<?php
switch ($row['edu']){ 
case 1:echo "初中及以下";break;
case 2:echo "高中或中专及以上";break;
case 3:echo "大专及以上";break;
case 4:echo "本科及以上";break;
case 5:echo "硕士及以上";break;
case 6:echo "博士及以上";break;
}
?>
              </font>　<font color="#009900"><img src="images/ok.gif" hspace="3" align="absmiddle">已认证</font>
              <?php }?></td>
          </tr>
          <tr>
            <td height="35" align="right">毕业院校：</td>
            <td style="color:#999999;"><input name="school" type="text"  class=input id="school" value="<?php echo stripslashes($row['school']);?>" size="41" maxlength="40" /></td>
          </tr>
          <tr>
            <td height="35" align="right">工作行业 / 你的职业：</td>
            <td style="color:#999999;"><select name="field">
                <option value="">您所从事的行业</option>
                <option value="1" <?php if ($row['field']==1)echo "selected"; ?>>计算机/互联网</option>
                <option value="2" <?php if ($row['field']==2)echo "selected"; ?>>邮电/通讯</option>
                <option value="3" <?php if ($row['field']==3)echo "selected"; ?>>银行/金融/保险/证券</option>
                <option value="4" <?php if ($row['field']==4)echo "selected"; ?>>建筑/房地产</option>
                <option value="5" <?php if ($row['field']==5)echo "selected"; ?>>商业/零售/批发</option>
                <option value="6" <?php if ($row['field']==6)echo "selected"; ?>>影视/娱乐/体育</option>
                <option value="7" <?php if ($row['field']==7)echo "selected"; ?>>艺术/音乐/舞蹈</option>
                <option value="8" <?php if ($row['field']==8)echo "selected"; ?>>广告/媒体/出版</option>
                <option value="9" <?php if ($row['field']==9)echo "selected"; ?>>美容/服装</option>
                <option value="10" <?php if ($row['field']==10)echo "selected"; ?>>旅游/运输</option>
                <option value="11" <?php if ($row['field']==11)echo "selected"; ?>>教育/培训/科研</option>
                <option value="12" <?php if ($row['field']==12)echo "selected"; ?>>制造/化工/能源</option>
                <option value="13" <?php if ($row['field']==13)echo "selected"; ?>>服务/宾馆/餐饮</option>
                <option value="14" <?php if ($row['field']==14)echo "selected"; ?>>医疗/保健</option>
                <option value="15" <?php if ($row['field']==15)echo "selected"; ?>>司法/律师/咨询</option>
                <option value="16" <?php if ($row['field']==16)echo "selected"; ?>>宠物/公益组织</option>
                <option value="17" <?php if ($row['field']==17)echo "selected"; ?>>警察/军人</option>
                <option value="18" <?php if ($row['field']==18)echo "selected"; ?>>国家机构/机关</option>
                <option value="19" <?php if ($row['field']==19)echo "selected"; ?>>农业</option>
                <option value="20" <?php if ($row['field']==20)echo "selected"; ?>>在校学生</option>
                <option value="21" <?php if ($row['field']==21)echo "selected"; ?>>其他</option>
              </select>
              /
              <select name="job">
                <option value="">您的职业</option>
                <option value="1" <?php if ($row['job']==1)echo "selected"; ?>>企业管理人员</option>
                <option value="2" <?php if ($row['job']==2)echo "selected"; ?>>专家/教授</option>
                <option value="3" <?php if ($row['job']==3)echo "selected"; ?>>工程/技术人员</option>
                <option value="4" <?php if ($row['job']==4)echo "selected"; ?>>市场/销售人员</option>
                <option value="5" <?php if ($row['job']==5)echo "selected"; ?>>行政人员/文职秘书</option>
                <option value="6" <?php if ($row['job']==6)echo "selected"; ?>>普通职员</option>
                <option value="7" <?php if ($row['job']==7)echo "selected"; ?>>机关干部/公务人员</option>
                <option value="8" <?php if ($row['job']==8)echo "selected"; ?>>艺术家/演员</option>
                <option value="9" <?php if ($row['job']==9)echo "selected"; ?>>教师</option>
                <option value="10" <?php if ($row['job']==10)echo "selected"; ?>>工人</option>
                <option value="11" <?php if ($row['job']==11)echo "selected"; ?>>农民</option>
                <option value="12" <?php if ($row['job']==12)echo "selected"; ?>>军人</option>
                <option value="13" <?php if ($row['job']==13)echo "selected"; ?>>学生</option>
                <option value="14" <?php if ($row['job']==14)echo "selected"; ?>>自由职业者</option>
                <option value="15" <?php if ($row['job']==15)echo "selected"; ?>>离/退休人员</option>
                <option value="16" <?php if ($row['job']==16)echo "selected"; ?>>失业/无业</option>
                <option value="17" <?php if ($row['job']==17)echo "selected"; ?>>其他</option>
          </select>          </tr>
          <tr>
            <td height="35" align="right"><img src="images/sfz_x.gif" width="9" height="9" />月 收 入：</td>
            <td style="color:#999999;"><?php if ($row['ifpay'] == 0 ){?>
              <select name="pay">
              <option value="">月收入</option>
              <option value="1" <?php if ($row['pay']==1)echo "selected"; ?>>600元以下</option>
              <option value="2" <?php if ($row['pay']==2)echo "selected"; ?>>600-799元</option>
              <option value="3" <?php if ($row['pay']==3)echo "selected"; ?>>800-999元</option>
              <option value="4" <?php if ($row['pay']==4)echo "selected"; ?>>1000-1499元</option>
              <option value="5" <?php if ($row['pay']==5)echo "selected"; ?>>1500-1999元</option>
              <option value="6" <?php if ($row['pay']==6)echo "selected"; ?>>2000-2999元</option>
              <option value="7" <?php if ($row['pay']==7)echo "selected"; ?>>3000-3999元</option>
              <option value="8" <?php if ($row['pay']==8)echo "selected"; ?>>4000-4999元</option>
              <option value="9" <?php if ($row['pay']==9)echo "selected"; ?>>5000-5999元</option>
              <option value="10" <?php if ($row['pay']==10)echo "selected"; ?>>6000-6999元</option>
              <option value="11" <?php if ($row['pay']==11)echo "selected"; ?>>7000-9999元</option>
              <option value="12" <?php if ($row['pay']==12)echo "selected"; ?>>10000-19999元</option>
              <option value="13" <?php if ($row['pay']==13)echo "selected"; ?>>20000元以上</option>
            </select>
              <font color="#FF0000"><img src="images/delx.gif" width="10" height="10" hspace="3">未认证</font>
              <?php }else{ ?>
              <input name="pay" type="hidden" value="<?php echo $row['pay'];?>">
              <font color="#333333">
<?php
switch ($row['pay']){ 
case 1:echo "600元以下";break;
case 2:echo "600-799元";break;
case 3:echo "800-999元";break;
case 4:echo "1000-1499元";break;
case 5:echo "1500-1999元";break;
case 6:echo "2000-2999元";break;
case 7:echo "3000-3999元";break;
case 8:echo "4000-4999元";break;
case 9:echo "5000-5999元";break;
case 10:echo "6000-6999元";break;
case 11:echo "7000-9999元";break;
case 12:echo "10000-19999元";break;
case 13:echo "20000元以上";break;
}
?>
              </font>　<font color="#009900"><img src="images/ok.gif" hspace="3" align="absmiddle">已认证</font>
              <?php }?>            </tr>
          <tr>
            <td height="35" align="right">最难忘的事：</td>
            <td><input name="nianwang" type="text"  class=input id="nianwang" value="<?php echo htmlout(stripslashes($row['nianwang']));?>" size="60" maxlength="240" /></td>
          </tr>
          <tr>
            <td height="35" align="right">近期的心愿：</td>
            <td><font color="#666666">
              <input name="xinyuan" type="text"  class=input id="xinyuan" value="<?php echo htmlout(stripslashes($row['xinyuan']));?>" size="60" maxlength="240" />
            </font></td>
          </tr>
          <tr>
            <td height="35" align="right">是否 吸烟 / 喝酒：</td>
            <td style="color:#999999;"><select name=smoking>
                <option value="">请选择</option>
                <option value="1" <?php if ($row['smoking']==1)echo "selected"; ?>>不吸</option>
                <option value="2" <?php if ($row['smoking']==2)echo "selected"; ?>>偶尔吸</option>
                <option value="3" <?php if ($row['smoking']==3)echo "selected"; ?>>一天一包</option>
                <option value="4" <?php if ($row['smoking']==4)echo "selected"; ?>>有烟就吸</option>
                <option value="5" <?php if ($row['smoking']==5)echo "selected"; ?>>正在戒烟</option>
                <option value="6" <?php if ($row['smoking']==6)echo "selected"; ?>>已经戒了</option>
              </select>
              /
              <select name=drink>
                <option value="">请选择</option>
                <option value="1" <?php if ($row['drink']==1)echo "selected"; ?>>滴酒不沾</option>
                <option value="2" <?php if ($row['drink']==2)echo "selected"; ?>>有时喝一些</option>
                <option value="3" <?php if ($row['drink']==3)echo "selected"; ?>>喜欢来两杯</option>
                <option value="4" <?php if ($row['drink']==4)echo "selected"; ?>>好酒量，天天喝</option>
                <option value="5" <?php if ($row['drink']==5)echo "selected"; ?>>正在戒酒</option>
                <option value="6" <?php if ($row['drink']==6)echo "selected"; ?>>已经戒了</option>
              </select></td>
          </tr>
          <tr>
            <td height="35" align="right">我的个性：</td>
            <td><input name="gexin" type="text"  class=input id="gexin" onFocus="setTagBehavior(this,'gexin','tipinfo1');" value="<?php echo htmlout(stripslashes($row['gexin']));?>" size="60" maxlength="240" >
                <div id="tipinfo1" style="display:none;width:320px;background:#F8FCF5;height:150px;margin:5px;line-height:200%;;overflow:scroll;overflow-x:hidden;"></div></td>
          </tr>
          <tr>
            <td height="35" align="right">朋友形容我：</td>
            <td><input name="xinrong" type="text"  class=input id="xinrong" onFocus="setTagBehavior(this,'xinrong','tipinfo2');" value="<?php echo htmlout(stripslashes($row['xinrong']));?>" size="60" maxlength="240" >
                <div id="tipinfo2" style="display:none;width:320px;background:#F8FCF5;height:150px;margin:5px;line-height:200%;overflow:scroll;overflow-x:hidden;"></div></td>
          </tr>
          <tr>
            <td height="35" align="right">我的优势：</td>
            <td><input name="youshi" type="text"  class=input id="youshi" onFocus="setTagBehavior(this,'youshi','tipinfo3');" value="<?php echo htmlout(stripslashes($row['youshi']));?>" size="60" maxlength="240" >
                <div id="tipinfo3" style="display:none;width:320px;background:#F8FCF5;height:150px;margin:5px;line-height:200%;overflow:scroll;overflow-x:hidden;"></div></td>
          </tr>
          <tr>
            <td height="35" align="right">兴趣爱好：</td>
            <td><input name="xinqu" type="text"  class=input id="a14" onFocus="setTagBehavior(this,'xinqu','tipinfo4');" value="<?php echo htmlout(stripslashes($row['xinqu']));?>" size="60" maxlength="240" >
                <div id="tipinfo4" style="display:none;width:320px;background:#F8FCF5;height:150px;margin:5px;line-height:200%;overflow:scroll;overflow-x:hidden;"></div></td>
          </tr>
          <tr>
            <td height="35" align="right">希望寻找的伙伴：</td>
            <td><input name="huoban" type="text"  class=input id="a14" onFocus="setTagBehavior(this,'huoban','tipinfo5');" value="<?php echo htmlout(stripslashes($row['huoban']));?>" size="60" maxlength="240" >
                <div id="tipinfo5" style="display:none;width:320px;background:#F8FCF5;height:150px;margin:5px;line-height:200%;overflow:scroll;overflow-x:hidden;"></div></td>
          </tr>
          <tr>
            <td height="55" colspan="2" align="center"><input type=hidden name=submitok value="modupdate">
                <input type="submit" name="Submit" value=" 修 改 " class="button"></td>
          </tr>
        </form>
    </table>
    <br />
  </div></div>



<?php require_once YZLOVE.'my/bottommy.php';?>