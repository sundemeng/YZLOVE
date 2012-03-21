<?php
/*
+--------------------------------+
+ 本后台程序版权属于本人所有
+ Author：PSY，wjxxw@vip.qq.com www.linxiaoxian.com，QQ：8437645
+ 本文件最后修改日期：2010年1月
+ 如有修改，请保留本段信息，对您站没有影响
+--------------------------------+
*/
require_once '../sub/init.php';
require_once '../sub/conn.php';
require_once '../sub/fun.php';
require_once 'session.php';
?>
<base target=testwinson><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title></title>
</head>
<script>name = "testwinson"</script>
<link href="main.css" rel="stylesheet" type="text/css">
<SCRIPT LANGUAGE="JavaScript" src="../sub/Editor/Editor.js"></SCRIPT> 
<SCRIPT LANGUAGE="JavaScript">
<!--
function CheckForm(obj){
obj.content.value = getContent();
oEditor.document.body.innerHTML=obj.content.value;
}
function checklength(theform){
var len=0;
var str=theform.content.value;
for(var i=0;i<str.length;i++){
char = str.charCodeAt(i);
if(!(char>255)){
len = len + 1;
}else{
len = len + 2;
}
}
alert("你的信息已有字节数：" + len + "\n系统限制最大字节数：30000");
}

//-->
</SCRIPT>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="2" marginwidth="0" marginheight="0"  bgcolor=#ffffff>
<?php
  if($_REQUEST['submitok']=="modupdate"){
     $classid=$_REQUEST['classid'];
	 $diaryopen=$_REQUEST['diaryopen'];
	 $content=$_REQUEST['content'];
	 $title=$_REQUEST['title'];
	/// exit;
     $db->query("update  ".__TBL_DIARY__."  set content='".$content."',diaryopen=".$diaryopen.",title='".$title."' where id=".$classid);
       header("Location: ?classid=".$classid);
	   exit();
  }
  $classid=$_REQUEST['classid'];
  $rs=$db->query("SELECT * FROM ".__TBL_DIARY__." WHERE id=".$classid);
  $rows = $db->fetch_array($rs);
?>
     <table width="750" height="42" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td align="center" bgcolor="EDF8FF" style="font-size:10.3pt;font-weight:bold;"><?php echo $rows['title']; ?> </td>
        </tr>
      </table>
      <br>
      <table width="750" border="0" align="center" cellpadding="5" cellspacing="0">
        <form action="" method="post" name="MYFORM" onClick="return CheckForm(this);" >
          <TEXTAREA NAME="content" ROWS="1" COLS="1" style="display:none;"><?php echo $rows['content']; ?></TEXTAREA>
          <tr>
            <td width="133" align="right"><font color="6699CC">标　　题：</font></td>
            <td width="597" valign="top"><input name="title" type="text" class=input value="<?php echo $rows['title']; ?>" size="60" maxlength="100">
              <font color="6699CC">
              　　　　　　　
              <input type="button" value="关闭窗口" onClick="javascript:window.close();" class="buttonx" />
            </font></td>
          </tr>
          <tr>
            <td width="133" align="right"><font color="6699CC">这篇日记：</font></td>
            <td valign="top"><input name="diaryopen" type="radio" value="1" <?php if ($rows['diaryopen']==1) echo "checked"; ?>>
              <font color="#666666">公开
              <input name="diaryopen" type="radio" value="0" <?php if ($rows['diaryopen']==0) echo "checked"; ?>>保密</font></td>
          </tr>
          <tr>
            <td align="right" valign="top"><font color="6699CC">内　　容↓</font></td>
            <td align="right" valign="top"  style="font-size:10.3pt;padding-right:20px"><a href="http://.huizhoulove.com/home/diary2.html" target="_blank"><b><font color="#FF0000"><img src="images/zoom.gif" width="13" height="13" hspace="3" border="0" align="texttop">预　览</font></b></a></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><TABLE width="98%" height="24" align="center" cellpadding="0" cellspacing="0" bgcolor="efefef" style="border-left:#dddddd 1px  solid;border-right:#dddddd 1px  solid;border-top:#dddddd 1px  solid;">
                <TR>
                  <TD align="right"><select name="font_name" id="select" onChange="FontName(this.options[this.selectedIndex].value)">
                      <option class="heading" selected>字体 
                      <option value="宋体">宋体 
                      <option value="黑体">黑体 
                      <option value="楷体_GB2312">楷体 
                      <option value="仿宋_GB2312">仿宋 
                      <option value="隶书">隶书 
                      <option value="幼圆">幼圆 
                      <option value="新宋体">新宋体 
                      <option value="Arial">Arial 
                      <option value="Arial Black">Arial Black
                      <option value="Courier">Courier 
                      <option value="System">System 
                      <option value="Times New Roman">Times
                      <option value="Verdana">Verdana 
                      <option value="Wingdings">Wingdings</option>
                    </select>                  </TD>
                  <TD><select name="font_size" id="select2" onChange="FontSize(this.options[this.selectedIndex].value)">
                      <option value="1">字号</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                    </select>                  </TD>
                  <TD width="22" align="center" OnClick="FontColor()" onmouseover=this.className='Hand_On'; onmouseout=this.className='Hand_Off'; this.className='Hand_Off'; onmousedown=this.className='Hand_Down';><IMG SRC="sub/Editor/images/fgcolor.gif" WIDTH="16" HEIGHT="16" BORDER="0" ALT="字体颜色" ></TD>
                  <TD width="22" align="center" OnClick="BackColor()" onmousedown=this.className='Hand_Down'; onmouseover=this.className='Hand_On'; onmouseout=this.className='Hand_Off'; this.className='Hand_Off';><IMG SRC="sub/Editor/images/fbcolor.gif" WIDTH="16" HEIGHT="16" BORDER="0" ALT="文字背景颜色"></TD>
                  <TD width="22" align="center" OnClick="bold()" onmousedown=this.className='Hand_Down'; onmouseover=this.className='Hand_On'; onmouseout=this.className='Hand_Off'; this.className='Hand_Off';><IMG SRC="sub/Editor/images/bold.gif" WIDTH="16" HEIGHT="16" BORDER="0" ALT="加粗"></TD>
                  <TD width="22" align="center" OnClick="italic()" onmousedown=this.className='Hand_Down'; onmouseover=this.className='Hand_On'; onmouseout=this.className='Hand_Off'; this.className='Hand_Off';><IMG SRC="sub/Editor/images/italic.gif" WIDTH="16" HEIGHT="16" BORDER="0" ALT="倾斜"></TD>
                  <TD width="22" align="center" OnClick="underline()" onmousedown=this.className='Hand_Down'; onmouseover=this.className='Hand_On'; onmouseout=this.className='Hand_Off'; this.className='Hand_Off';><IMG SRC="sub/Editor/images/underline.gif" WIDTH="16" HEIGHT="16" BORDER="0" ALT="下划线"></TD>
                  <TD width="22" align="center" OnClick="ralign('left')" onmousedown=this.className='Hand_Down'; onmouseover=this.className='Hand_On'; onmouseout=this.className='Hand_Off'; this.className='Hand_Off';><IMG SRC="sub/Editor/images/aleft.gif" WIDTH="16" HEIGHT="16" BORDER="0" ALT="左对齐"></TD>
                  <TD width="22" align="center" OnClick="ralign('center')" onmousedown=this.className='Hand_Down'; onmouseover=this.className='Hand_On'; onmouseout=this.className='Hand_Off'; this.className='Hand_Off';><IMG SRC="sub/Editor/images/center.gif" WIDTH="16" HEIGHT="16" BORDER="0" ALT="居中"></TD>
                  <TD width="22" height="26" align="center" OnClick="ralign('right')" onmousedown=this.className='Hand_Down'; onmouseover=this.className='Hand_On'; onmouseout=this.className='Hand_Off'; this.className='Hand_Off';><IMG SRC="sub/Editor/images/aright.gif" WIDTH="16" HEIGHT="16" BORDER="0" ALT="右对齐"></TD>
                  <TD width="22" align="center" OnClick="url()" onmousedown=this.className='Hand_Down'; onmouseover=this.className='Hand_On'; onmouseout=this.className='Hand_Off'; this.className='Hand_Off';><IMG SRC="sub/Editor/images/wlink.gif" WIDTH="16" HEIGHT="16" BORDER="0" ALT="超级链接"></TD>
                  <TD width="22" align="center" OnClick="unurl()" onmousedown=this.className='Hand_Down'; onmouseover=this.className='Hand_On'; onmouseout=this.className='Hand_Off'; this.className='Hand_Off';><IMG SRC="sub/Editor/images/unlink.gif" WIDTH="16" HEIGHT="16" BORDER="0" ALT="清除链接"></TD>
                  <TD width="22" align="center" OnClick="image()" onmousedown=this.className='Hand_Down'; onmouseover=this.className='Hand_On'; onmouseout=this.className='Hand_Off'; this.className='Hand_Off';><IMG SRC="sub/Editor/images/img.gif" WIDTH="16" HEIGHT="16" BORDER="0" ALT="插入图片"></TD>
                  <TD width="22" align="center" OnClick="flash()" onmousedown=this.className='Hand_Down'; onmouseover=this.className='Hand_On'; onmouseout=this.className='Hand_Off'; this.className='Hand_Off';><IMG SRC="sub/Editor/images/swf.gif" WIDTH="16" HEIGHT="16" BORDER="0" ALT="插入Flash"></TD>
                  <TD width="22" align="center" OnClick="wmv()" onmousedown=this.className='Hand_Down'; onmouseover=this.className='Hand_On'; onmouseout=this.className='Hand_Off'; this.className='Hand_Off';><IMG SRC="sub/Editor/images/wmv.gif" WIDTH="16" HEIGHT="16" BORDER="0" ALT="插入Windows Media"></TD>
                  <TD width="22" align="center" OnClick="rm()" onmousedown=this.className='Hand_Down'; onmouseover=this.className='Hand_On'; onmouseout=this.className='Hand_Off'; this.className='Hand_Off';><IMG SRC="sub/Editor/images/rm.gif" WIDTH="16" HEIGHT="16" BORDER="0" ALT="插入Real Media"></TD>
                  <TD width="24" align="center" onmousedown=this.className='Hand_Down'; onmouseover=this.className='Hand_On'; onmouseout=this.className='Hand_Off'; this.className='Hand_Off';ondrag='return false;'>&nbsp;</TD>
                  <TD width="30" align="center" OnClick="unformat()" onmousedown=this.className='Hand_Down'; onmouseover=this.className='Hand_On'; onmouseout=this.className='Hand_Off'; this.className='Hand_Off';ondrag='return false;'><IMG SRC="sub/Editor/images/cleancode.gif" WIDTH="16" HEIGHT="16" BORDER="0" ALT="清除格式"></TD>
                </TR>
              </TABLE>
                <table width="98%" height="500" border="0" align="center" cellpadding="0" cellspacing="1" id="oblog_Container" style="border:#dddddd 1px  solid;">
                  <tr>
                    <td><SCRIPT LANGUAGE="JavaScript">Editor(document.MYFORM.content.value);</SCRIPT></td>
                  </tr>
              </table></td>
          </tr>
          <tr>
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2" align="center"><input name="submitok" type="hidden" value="modupdate">
<input type="submit" name="Submit" value=" 提交 " class="button">
              　
              <a href="javascript:checklength(document.MYFORM);" style="text-decoration: none">[<b><font color="#FF6600"><u>查看内容长度</u></font></b>]</a></td>
          </tr>
        </form>
</table>
      <table width="500" height="89" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
          <td align="center">&nbsp;</td>
        </tr>
      </table>
</body>
</html>
