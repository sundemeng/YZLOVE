<?php 
require_once "../sub/init.php";
if ( ereg("^[0-9]{1,9}$",$cook_userid) && !empty($cook_userid) && ereg("^[0-9]{1,2}$",$cook_grade) && !empty($cook_grade) && $cook_grade>1 ){
	require_once YZLOVE.'sub/conn.php';
	$cook_password = trim($cook_password);
	$rt = $db->query("SELECT id,grade,logintime,ifonline FROM ".__TBL_MAIN__." WHERE id=".$cook_userid." AND password='$cook_password' AND flag=1");
	if ($db->num_rows($rt) > 0){
		$row = $db->fetch_array($rt);
		$date_id = $row[0];
		$date_grade = $row[1];
		$date_logintime = $row[2];
		$date_ifonline = $row[3];
	} else {
		exit;
	}
	$d1 = strtotime($date_logintime);
	$d2 = strtotime("now");
	$tmpsecond = ($d2-$d1);
	$tmpalltime = round( $tmpsecond/60 );
	switch ($date_grade){ 
		case 2:
			if ($date_ifonline == 1) {
				$addloveb  = $tmpalltime*2;
				if ($tmpsecond >= 1200){
					$addtime = date("Y-m-d H:i:s");
					$db->query("UPDATE ".__TBL_MAIN__." SET loveb=loveb+$addloveb,alltime=alltime+$tmpalltime,logintime='$addtime' WHERE id=".$date_id);
					$db->query("INSERT INTO ".__TBL_LOVEBHISTORY__."  (userid,username,content,num,addtime) VALUES ($date_id,'$cook_username','自动泡币结算(2倍)','$addloveb','$addtime')");
				}
			}
		break;
		case 3:
  			if ($date_ifonline == 1){
				$addloveb  = $tmpalltime*10;
				if ($tmpsecond >= 1200){
					$addtime = date("Y-m-d H:i:s");
					$db->query("UPDATE ".__TBL_MAIN__." SET loveb=loveb+$addloveb,alltime=alltime+$tmpalltime,logintime='$addtime' WHERE id=".$date_id);
					$db->query("INSERT INTO ".__TBL_LOVEBHISTORY__."  (userid,username,content,num,addtime) VALUES ($date_id,'$cook_username','自动泡币结算(10倍)','$addloveb','$addtime')");
				}
			}
		break;
		case 10:
			if ($date_ifonline == 1){
				$addloveb  = $tmpalltime*10;
				if ($tmpsecond >= 1200){
					$addtime = date("Y-m-d H:i:s");
					$db->query("UPDATE ".__TBL_MAIN__." SET loveb=loveb+$addloveb,alltime=alltime+$tmpalltime,logintime='$addtime' WHERE id=".$date_id);
					$db->query("INSERT INTO ".__TBL_LOVEBHISTORY__."  (userid,username,content,num,addtime) VALUES ($date_id,'$cook_username','自动泡币结算(10倍)','$addloveb','$addtime')");
				}
			}
		break;
	}
}else{
	echo 'Dsqy 泡 币 系 统 ! d s q y . w j x x w . c o m';
}
?>