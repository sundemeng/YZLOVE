<?php require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if (!$db->num_rows($rt)) {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
if ( !ereg("^[0-9]{1,9}$",$mainid) || empty($mainid) )callmsg("Forbidden!","-1");
$rt = $db->query("SELECT title,qloveb FROM ".__TBL_GROUP_MAIN__." WHERE id=".$mainid." AND flag=1 AND userid=".$cook_userid);
if($db->num_rows($rt)){
	$row = $db->fetch_array($rt);
	$maintitle = stripslashes($row[0]);
	$qloveb = $row[1];
	if ($qloveb <5000)callmsg("圈子财富已不足5000，无法进行群发！","i_group_loveb.php?mainid=".$mainid);
} else {
	callmsg("请求错误，没有操作权限!","-1");
}
if ($submitok == "addupdate"){
	if (strlen($title)<2 || strlen($title)>50 )callmsg("标题请控制在50字节以内","-1");
	if (strlen($content)<2 || strlen($content)>10000 )callmsg("内容请控制在10000字节以内","-1");
	$rt=$db->query("SELECT userid,nicknamesexgradephoto_s FROM ".__TBL_GROUP_USER__." WHERE mainid=".$mainid." ORDER BY id DESC");
	$total = $db->num_rows($rt);
	if($total>0){
		for($j=1;$j<=$total;$j++) {
			$rows = $db->fetch_array($rt);
			if(!$rows) break;
			$tmpusr = explode("|",$rows[1]);
			$userid = $rows[0];
			$nickname = $tmpusr[0];
			$addtime = date("Y-m-d H:i:s");
			$db->query("INSERT INTO ".__TBL_GBOOK__."  (userid,nickname,senduserid,sendnickname,title,content,addtime) VALUES ('$userid','$nickname','$cook_userid','$cook_nickname','$title','$content','$addtime')");
		}
	} else {
		echo "暂无会员";
		exit;
	}
	$db->query("UPDATE ".__TBL_GROUP_MAIN__." SET qloveb=qloveb-5000 WHERE id=".$mainid);
	callmsg("发送成功！","i_group_gbookgf.php?mainid=".$mainid);
	//header("Location: i_group_invite.php?mainid=".$mainid);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $Global['m_titile']; ?></title>
<link href="my.css" rel="stylesheet" type="text/css">
<style type="text/css"> 
ul {width:754px;height:28px;margin-left:28px;margin-top:15px;background-image:url(images/sontgg.gif);padding-left:16px;display:block;}
ul li {float:left;border:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;}
ul li a:link,li a:active,li a:visited{width:84px;height:26px;display:block;text-decoration:none;color:#333;background:#fff;}
ul li a:hover{width:84px;height:26px;display:block;text-decoration:none;color:#6F9F00;background:#F0FAE9;}
ul .liselect {float:left;width:84px;height:26px;background:#F0FAE9;border-left:#CCE1B5 1px solid;border-top:#CCE1B5 1px solid;border-bottom:#F0FAE9 1px solid;border-right:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;color:#6F9F00;}
ul .liselect a:link,.liselect a:active,.liselect a:visited{width:84px;display:block;text-decoration:none;color:#6F9F00;background:#F0FAE9;}
ul .liselect a:hover{width:84px;display:block;text-decoration:none;color:#DF2C91;background:#F0FAE9;}
/* main2 */
.main2 {width:754px;background:#F0FAE9;margin-left:28px;border-left:#CCE1B5 1px solid;border-bottom:#CCE1B5 1px solid;border-right:#CCE1B5 1px solid;padding:7px;}
.main2_frame {width:752px;background:#fff;border:#D8EAC4 1px solid;text-align:center}
table{text-align:left;color:#666;}
.img {
max-width: 150px;max-height: 150px;
/*
width: expression(this.width > 150 && this.width > this.height ? 150 : auto);
height: expression(this.height > 150 ? 150 : auto);
*/
}
</style>
</head>
<body>
<ul>
<li class="liselect"><a href="i_group.php">我的圈子</a></li>
<li><a href="i_group_add.php">创建圈子</a></li>
<li><a href="i_group_mylogin.php">加入的圈子</a></li>
<li><a href="i_group_myblog.php">我的帖子 </a></li>
<li><a href="i_group_favorite.php">帖子收藏 </a></li>
</ul>
<div class="main2">
<div class="main2_frame"><br>
<table width="670" height="40" border="0" cellpadding="0" cellspacing="0" bgcolor="F3FAFE" >
    <tr>
      <td width="489" bgcolor="FDEEF8" style="color:#333;font-size:10.3pt;"><img src="images/qzlist.gif" width="21" height="18" hspace="5" />“<b><a href="i_group_bk.php?mainid=<?php echo $mainid;?>"><?php echo $maintitle; ?></a></b>”向圈内所有成员群发留言</td>
      <td width="181" bgcolor="FDEEF8" style="color:#333;font-size:10.3pt;">&nbsp;</td>
    </tr>
  </table>
<br />
<table width="520" height="53" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="images/tips.gif" width="23" height="21" hspace="5" align="absmiddle">群发一次将扣除圈子财富<b><font color="#FF0000">-5000</font></b>个Love币，当前财富：<b><font color="#FF0000"><?php echo $qloveb; ?></font></b>Love币。</td>
        </tr>
    </table>
      <table width="520" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#f8f8f8" style="border:#dddddd 1px solid;">
        <form method=post action="i_group_gbookgf.php">
          <tr>
            <td width="111" height="3" align="right"><br>
              <br>
            标　　题：</td>
            <td width="387" height="0"><br>
                <br>
              <input name="title" type="text" class="input" id="title" size="50" maxlength="100"></td>
          </tr>
          <tr>
            <td width="111" height="0" align="right">详细内容：</td>
            <td height="0"><textarea name="content" cols="50" rows="6" id="content"></textarea></td>
          </tr>

          <tr>
            <td height="13" align="center"><input type=hidden value="<?php echo $mainid; ?>" name="mainid">
                <input type=hidden value="addupdate" name="submitok"></td>
            <td width="387" height="13"><input type="submit" class="buttonx" value="开始群发" >
            <br>
            <br></td>
          </tr>
        </form>
      </table>
<br />
<br />
<br /><br />
</div></div>
<?php require_once YZLOVE.'my/bottommy.php';?>