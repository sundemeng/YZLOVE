<?php 
/**************************************************
Copyright (C) 2009 　扬 州交友 网  择交友友 2.0
作  者: supdes　
**************************************************/
class online_yzlove{
	function chk () {
		global $db,$Global;
		extract($_COOKIE);
		$actiontime = strtotime("now");
		if ( !isset($cook_rnd) || !preg_match("^[0-9]{1,9}$",$cook_rnd) || empty($cook_rnd) ){
			setcookie("cook_rnd",0,null,"/",$Global['m_cookdomain']);
			$cook_rnd = 0;}
		if ( !isset($cook_userid) || empty($cook_userid) || !preg_match("^[0-9]{1,9}$",$cook_userid) ) {
			$rt = $db->query("SELECT id FROM ".__TBL_ONLINE__." WHERE rnd=".$cook_rnd." AND userid=0 LIMIT 1");
			if($db->num_rows($rt)){$db->query("UPDATE ".__TBL_ONLINE__." SET actiontime=".$actiontime." WHERE rnd=".$cook_rnd);
			} else {
				$rnd = $this->getrnd(9);
				setcookie("cook_rnd",$rnd,null,"/",$Global['m_cookdomain']);
				$db->query("INSERT INTO ".__TBL_ONLINE__." (rnd,actiontime) VALUES ($rnd,$actiontime)");}
		} else {
			if ( ($cook_if2 == 2 || $cook_if2 == 3 || $cook_if2 == 4) && $cook_grade >= 3 ){
				$stealth = ( empty($cook_stealth) || !isset($cook_stealth) )?0:$cook_stealth;
			} else {
				$stealth = 0;
			}
			$rt = $db->query("SELECT id FROM ".__TBL_ONLINE__." WHERE userid=".$cook_userid." LIMIT 1");
			if($db->num_rows($rt)){
				$db->query("UPDATE ".__TBL_ONLINE__." SET actiontime=".$actiontime." WHERE userid=".$cook_userid);
			} else {
				$pp = !empty($cook_photo_s)?1:0;
				$db->query("INSERT INTO ".__TBL_ONLINE__." (userid,actiontime,stealth,p,g) VALUES ($cook_userid,$actiontime,$stealth,$pp,$cook_grade)");
			}
		}
		$difftime = $Global['m_onlinetime']*60;
		$db->query("DELETE FROM ".__TBL_ONLINE__." WHERE (unix_timestamp() - actiontime) > $difftime");
	}
	function num ($str) {
		global $db,$Global;
		$Tmpsql = ( preg_match("^[1-2]{1}$",$str) && !empty($str))?" WHERE sex=$str":"";
		$rt = $db->query("SELECT COUNT(*) FROM ".__TBL_ONLINE__.$Tmpsql);
		$row = $db->fetch_array($rt);
		$tmpcount = $row[0];
		echo $tmpcount;
	}
	function getrnd($length) {
		$possible = "0123456789";
		$str = "";
		while(strlen($str) < $length) $str .= substr($possible, (rand() % strlen($possible)), 1);
		return($str);
	}
}
?>