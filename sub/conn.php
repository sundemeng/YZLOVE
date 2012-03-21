<?php
/*
+--------------------------------+
+ 本程序原版权属于原作者
+ 修改人：林小先，lyixian@126.com www.linxiaoxian.com
+ 修改日期：2010年1月
+ 如有修改，请保留本段信息，对您站没有影响
+--------------------------------+
*/
!function_exists('cdstr') && exit('Forbidden');
$Global['m_dbserver'] = 'localhost'; 
$Global['m_dbuser'] = 'root'; #数据库用户名
$Global['m_dbpass'] = 'root'; #数据库密码
$Global['m_dbname'] = 'yzlove'; #库名
class www_zeai_cn_www_yzlove_com{
function connect($host,$user,$psw){if(!$db=@mysql_connect($host,$user,$psw))$this->halt("连接数据库失败");}
function select_db($dbname)	{if(!mysql_select_db($dbname))$this->halt("您所选的数据库不存在");}
function query($query) {mysql_query("set names 'gbk'");$res=mysql_query($query);if(!$res)$this->halt("<font color=333399>SQL语句无效,可能数据库被破坏。</font><br><br><font style='font-size:12px;color:#ffffff'>".$query);return $res;}
function num_rows($query) {$res = mysql_num_rows($query);return $res;}
function fetch_array($query) {return mysql_fetch_array($query);}
function insert_id() {return mysql_insert_id();}
function halt($msg){echo $msg;exit;}}
$Global['m_dbvar'] = 'yzlove_';
define('__TBL_MAIN__',$Global['m_dbvar'].'main');
define('__TBL_PHOTO__',$Global['m_dbvar'].'photo');
define('__TBL_VIDEO__',$Global['m_dbvar'].'video');
define('__TBL_DATING__',$Global['m_dbvar'].'dating');
define('__TBL_DATING_USER__',$Global['m_dbvar'].'dating_user');
define('__TBL_ASK__',$Global['m_dbvar'].'ask');
define('__TBL_ASK_BBS__',$Global['m_dbvar'].'ask_bbs');
define('__TBL_GBOOK__',$Global['m_dbvar'].'gbook');
define('__TBL_FRIEND__',$Global['m_dbvar'].'friend');
define('__TBL_DIARY__',$Global['m_dbvar'].'diary');
define('__TBL_DIARY_BBS__',$Global['m_dbvar'].'diary_bbs');
define('__TBL_LOVEBHISTORY__',$Global['m_dbvar'].'lovebhistory');
define('__TBL_FAVORITE__',$Global['m_dbvar'].'favorite');
define('__TBL_GROUP_TOTAL__',$Global['m_dbvar'].'group_total');
define('__TBL_GROUP_MAIN__',$Global['m_dbvar'].'group_main');
define('__TBL_GROUP_USER__',$Global['m_dbvar'].'group_user');
define('__TBL_GROUP_BK__',$Global['m_dbvar'].'group_bk');
define('__TBL_GROUP_WZ__',$Global['m_dbvar'].'group_wz');
define('__TBL_GROUP_WZ_BBS__',$Global['m_dbvar'].'group_wz_bbs');
define('__TBL_GROUP_PHOTO__',$Global['m_dbvar'].'group_photo');
define('__TBL_GROUP_PHOTO_KIND__',$Global['m_dbvar'].'group_photo_kind');
define('__TBL_GROUP_CLUB__',$Global['m_dbvar'].'group_club');
define('__TBL_GROUP_CLUB_USER__',$Global['m_dbvar'].'group_club_user');
define('__TBL_GROUP_CLUB_BBS__',$Global['m_dbvar'].'group_club_bbs');
define('__TBL_GROUP_CLUB_PHOTO__',$Global['m_dbvar'].'group_club_photo');
define('__TBL_REQUEST__',$Global['m_dbvar'].'request');
define('__TBL_ATTESTATION__',$Global['m_dbvar'].'attestation');
define('__TBL_CLICKHISTORY__',$Global['m_dbvar'].'clickhistory');
define('__TBL_ONLINE__',$Global['m_dbvar'].'online');
define('__TBL_STORY__',$Global['m_dbvar'].'story');
define('__TBL_STORY_PHOTO__',$Global['m_dbvar'].'story_photo');
define('__TBL_STORY_BBS__',$Global['m_dbvar'].'story_bbs');
define('__TBL_315__',$Global['m_dbvar'].'315');
define('__TBL_MAIN_DATA__',$Global['m_dbvar'].'main_data');
define('__TBL_SUPPHOTO__',$Global['m_dbvar'].'supphoto');
define('__TBL_ADMIN__',$Global['m_dbvar'].'admin');
define('__TBL_CHATIF__',$Global['m_dbvar'].'chatif');
define('__TBL_CHATMAIN__',$Global['m_dbvar'].'chatmain');
define('__TBL_FRIEND_NEWS__',$Global['m_dbvar'].'friend_news');
define('__TBL_NEWS__',$Global['m_dbvar'].'news');
define('__TBL_PRESENT__',$Global['m_dbvar'].'present');
define('__TBL_PRESENT_USER__',$Global['m_dbvar'].'present_user');
define('__TBL_IP__',$Global['m_dbvar'].'ip');
$db = new www_zeai_cn_www_yzlove_com;
$db->connect($Global['m_dbserver'],$Global['m_dbuser'],$Global['m_dbpass']);
$db->select_db($Global['m_dbname']);
?>