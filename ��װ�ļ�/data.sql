SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for oklist
-- ----------------------------
DROP TABLE IF EXISTS `oklist`;
CREATE TABLE `oklist` (
  `id` int(11) NOT NULL auto_increment,
  `okName` varchar(50) default NULL,
  `movie1` varchar(250) default NULL,
  `Singer` varchar(20) default NULL,
  `IsGood` tinyint(1) NOT NULL default '0',
  `geci` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for yzlove_315
-- ----------------------------
DROP TABLE IF EXISTS `yzlove_315`;
CREATE TABLE `yzlove_315` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `userid` int(10) unsigned NOT NULL default '0',
  `usernamenickname` varchar(45) NOT NULL,
  `url` varchar(200) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `addtime` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for yzlove_admin
-- ----------------------------
DROP TABLE IF EXISTS `yzlove_admin`;
CREATE TABLE `yzlove_admin` (
  `id` smallint(4) unsigned NOT NULL auto_increment,
  `username` varchar(15) NOT NULL,
  `password` varchar(32) NOT NULL,
  `grade` tinyint(2) unsigned NOT NULL default '1',
  `endtime` datetime default NULL,
  `endip` varchar(15) default NULL,
  `addtime` datetime NOT NULL,
  `logincount` smallint(5) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for yzlove_ask
-- ----------------------------
DROP TABLE IF EXISTS `yzlove_ask`;
CREATE TABLE `yzlove_ask` (
  `id` int(9) unsigned NOT NULL auto_increment,
  `userid` int(9) unsigned NOT NULL default '0',
  `title` varchar(80) default NULL,
  `content` text NOT NULL,
  `content2` varchar(4000) default NULL,
  `xsloveb` smallint(4) unsigned NOT NULL default '0',
  `addtime` datetime NOT NULL,
  `click` int(10) unsigned NOT NULL default '0',
  `hfnum` smallint(5) unsigned NOT NULL default '0',
  `flag` tinyint(1) unsigned NOT NULL default '0',
  `ifopen` tinyint(1) unsigned NOT NULL default '1',
  `ifjh` tinyint(3) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for yzlove_ask_bbs
-- ----------------------------
DROP TABLE IF EXISTS `yzlove_ask_bbs`;
CREATE TABLE `yzlove_ask_bbs` (
  `id` int(8) unsigned NOT NULL auto_increment,
  `fid` int(8) NOT NULL,
  `content` varchar(4000) NOT NULL,
  `userid` int(8) NOT NULL,
  `addtime` datetime NOT NULL,
  `ifbest` tinyint(1) unsigned NOT NULL default '0',
  `flag` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`id`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for yzlove_attestation
-- ----------------------------
DROP TABLE IF EXISTS `yzlove_attestation`;
CREATE TABLE `yzlove_attestation` (
  `id` int(9) unsigned NOT NULL auto_increment,
  `rzid` tinyint(1) NOT NULL,
  `flag` tinyint(1) NOT NULL default '0',
  `userid` int(9) unsigned NOT NULL,
  `addtime` int(10) unsigned NOT NULL default '0',
  `path_b` varchar(50) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for yzlove_chatif
-- ----------------------------
DROP TABLE IF EXISTS `yzlove_chatif`;
CREATE TABLE `yzlove_chatif` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `userid` int(10) unsigned NOT NULL default '0',
  `senduserid` int(10) unsigned NOT NULL default '0',
  `ifagree` tinyint(1) unsigned NOT NULL default '0',
  `addtime` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `userid` (`userid`,`senduserid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for yzlove_chatmain
-- ----------------------------
DROP TABLE IF EXISTS `yzlove_chatmain`;
CREATE TABLE `yzlove_chatmain` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `userid` int(10) unsigned NOT NULL default '0',
  `senduserid` int(10) unsigned NOT NULL default '0',
  `content` text,
  `addtime` int(10) unsigned NOT NULL default '0',
  `ifme` tinyint(1) NOT NULL default '0',
  `ifhe` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `senduserid` (`senduserid`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for yzlove_clickhistory
-- ----------------------------
DROP TABLE IF EXISTS `yzlove_clickhistory`;
CREATE TABLE `yzlove_clickhistory` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `userid` int(8) unsigned NOT NULL,
  `senduserid` int(8) unsigned NOT NULL,
  `sendnickname` varchar(20) default NULL,
  `sex` tinyint(1) NOT NULL default '0',
  `grade` tinyint(2) NOT NULL default '0',
  `photo_s` varchar(50) default NULL,
  `addtime` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `senduserid` (`senduserid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for yzlove_dating
-- ----------------------------
DROP TABLE IF EXISTS `yzlove_dating`;
CREATE TABLE `yzlove_dating` (
  `id` int(11) NOT NULL auto_increment,
  `userid` int(11) NOT NULL default '0',
  `kind` tinyint(4) NOT NULL default '0',
  `title` varchar(100) default NULL,
  `area1` varchar(50) default NULL,
  `area2` varchar(50) default NULL,
  `price` tinyint(4) NOT NULL default '0',
  `yhtime` int(10) unsigned NOT NULL default '0',
  `maidian` tinyint(4) NOT NULL default '0',
  `contact` varchar(100) default NULL,
  `content` text,
  `sex` tinyint(4) NOT NULL default '0',
  `birthday1` tinyint(1) NOT NULL default '0',
  `birthday2` tinyint(4) NOT NULL default '0',
  `heigh1` smallint(6) NOT NULL default '0',
  `heigh2` smallint(6) NOT NULL default '0',
  `love` tinyint(4) NOT NULL default '0',
  `edu` tinyint(4) NOT NULL default '0',
  `area3` varchar(50) default NULL,
  `area4` varchar(50) default NULL,
  `addtime` int(10) unsigned NOT NULL default '0',
  `bmnum` int(10) unsigned NOT NULL default '0',
  `click` int(10) unsigned NOT NULL default '0',
  `flag` tinyint(2) NOT NULL default '0',
  `jjloveb` smallint(5) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for yzlove_dating_user
-- ----------------------------
DROP TABLE IF EXISTS `yzlove_dating_user`;
CREATE TABLE `yzlove_dating_user` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `fid` smallint(5) unsigned NOT NULL default '0',
  `userid` int(10) unsigned NOT NULL default '0',
  `content` text,
  `addtime` int(10) unsigned NOT NULL default '0',
  `flag` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for yzlove_diary
-- ----------------------------
DROP TABLE IF EXISTS `yzlove_diary`;
CREATE TABLE `yzlove_diary` (
  `id` int(8) unsigned NOT NULL auto_increment,
  `userid` int(8) unsigned NOT NULL,
  `weather` tinyint(1) NOT NULL,
  `feel` tinyint(2) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `diaryopen` tinyint(1) unsigned NOT NULL default '1',
  `ifjh` tinyint(1) unsigned NOT NULL default '0',
  `click` int(8) unsigned NOT NULL default '0',
  `hfnum` smallint(4) unsigned NOT NULL default '0',
  `flag` tinyint(1) NOT NULL default '0',
  `stime` datetime NOT NULL,
  `addtime` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `userid` (`userid`),
  KEY `userid_2` (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for yzlove_diary_bbs
-- ----------------------------
DROP TABLE IF EXISTS `yzlove_diary_bbs`;
CREATE TABLE `yzlove_diary_bbs` (
  `id` int(8) unsigned NOT NULL auto_increment,
  `fid` int(8) NOT NULL,
  `content` varchar(4000) NOT NULL,
  `userid` int(8) NOT NULL,
  `addtime` datetime NOT NULL,
  `flag` tinyint(1) unsigned NOT NULL default '1',
  PRIMARY KEY  (`id`),
  KEY `userid` (`userid`),
  KEY `userid_2` (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for yzlove_favorite
-- ----------------------------
DROP TABLE IF EXISTS `yzlove_favorite`;
CREATE TABLE `yzlove_favorite` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `userid` int(10) unsigned NOT NULL,
  `kind` tinyint(2) unsigned NOT NULL,
  `title` varchar(100) NOT NULL,
  `url` varchar(255) NOT NULL,
  `addtime` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for yzlove_friend
-- ----------------------------
DROP TABLE IF EXISTS `yzlove_friend`;
CREATE TABLE `yzlove_friend` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `userid` int(10) unsigned NOT NULL,
  `senduserid` int(10) unsigned NOT NULL,
  `new` tinyint(1) unsigned NOT NULL default '1',
  `ifhmd` tinyint(1) unsigned NOT NULL default '0',
  `ifagree` tinyint(1) unsigned NOT NULL default '0',
  `addtime` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `senduserid` (`senduserid`),
  KEY `userid` (`userid`),
  KEY `senduserid_2` (`senduserid`),
  KEY `userid_2` (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for yzlove_friend_news
-- ----------------------------
DROP TABLE IF EXISTS `yzlove_friend_news`;
CREATE TABLE `yzlove_friend_news` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `userid` int(10) unsigned NOT NULL default '0',
  `senduserid` int(10) unsigned NOT NULL default '0',
  `content` varchar(250) default NULL,
  `addtime` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for yzlove_gbook
-- ----------------------------
DROP TABLE IF EXISTS `yzlove_gbook`;
CREATE TABLE `yzlove_gbook` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `userid` int(10) unsigned NOT NULL,
  `nickname` varchar(45) NOT NULL,
  `senduserid` int(10) unsigned NOT NULL,
  `sendnickname` varchar(45) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` varchar(3000) default NULL,
  `new` tinyint(3) unsigned NOT NULL default '1',
  `addtime` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `senduserid` (`senduserid`),
  KEY `senduserid_2` (`senduserid`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for yzlove_group_bk
-- ----------------------------
DROP TABLE IF EXISTS `yzlove_group_bk`;
CREATE TABLE `yzlove_group_bk` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `mainid` smallint(5) unsigned default '0',
  `maintitle` varchar(50) default NULL,
  `title` varchar(50) default NULL,
  `content` varchar(400) default NULL,
  `px` int(10) unsigned default '0',
  `addtime` datetime default NULL,
  `userid` int(10) unsigned default '0',
  `nicknamesexgradephoto_s` varchar(60) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for yzlove_group_club
-- ----------------------------
DROP TABLE IF EXISTS `yzlove_group_club`;
CREATE TABLE `yzlove_group_club` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `mainid` smallint(5) unsigned default NULL,
  `maintitle` varchar(100) default NULL,
  `title` varchar(100) default NULL,
  `kind` varchar(100) default NULL,
  `hdtime` varchar(100) default NULL,
  `address` varchar(100) default NULL,
  `jtlx` varchar(100) default NULL,
  `num_n` smallint(5) unsigned default '0',
  `num_r` smallint(5) unsigned default '0',
  `rmb_n` smallint(5) unsigned default '0',
  `rmb_r` smallint(5) unsigned default '0',
  `tbsm` varchar(500) default NULL,
  `content` text,
  `flag` tinyint(3) unsigned default '0',
  `jzbmtime` datetime default NULL,
  `click` int(10) unsigned default '0',
  `addtime` datetime default NULL,
  `bmnum` smallint(5) unsigned default '0',
  `gbooknum` smallint(5) unsigned default '0',
  `ifjh` tinyint(1) unsigned default '0',
  `picurl_s` varchar(50) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for yzlove_group_club_bbs
-- ----------------------------
DROP TABLE IF EXISTS `yzlove_group_club_bbs`;
CREATE TABLE `yzlove_group_club_bbs` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `mainid` smallint(5) unsigned NOT NULL,
  `clubid` smallint(5) unsigned NOT NULL,
  `content` text NOT NULL,
  `addtime` datetime NOT NULL,
  `userid` int(8) unsigned NOT NULL,
  `nicknamesexgradephoto_s` varchar(80) NOT NULL,
  `flag` varchar(45) NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for yzlove_group_club_photo
-- ----------------------------
DROP TABLE IF EXISTS `yzlove_group_club_photo`;
CREATE TABLE `yzlove_group_club_photo` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `mainid` smallint(5) unsigned NOT NULL,
  `clubid` smallint(5) unsigned NOT NULL,
  `title` varchar(50) NOT NULL,
  `path_s` varchar(50) NOT NULL,
  `path_b` varchar(50) NOT NULL,
  `ifmain` tinyint(1) unsigned NOT NULL default '0',
  `addtime` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for yzlove_group_club_user
-- ----------------------------
DROP TABLE IF EXISTS `yzlove_group_club_user`;
CREATE TABLE `yzlove_group_club_user` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `mainid` smallint(5) unsigned NOT NULL,
  `clubid` smallint(5) unsigned NOT NULL,
  `flag` tinyint(3) unsigned NOT NULL default '0',
  `addtime` datetime NOT NULL,
  `userid` int(8) unsigned NOT NULL,
  `nicknamesexgradephoto_s` varchar(80) NOT NULL,
  `tel` varchar(200) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for yzlove_group_main
-- ----------------------------
DROP TABLE IF EXISTS `yzlove_group_main`;
CREATE TABLE `yzlove_group_main` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `mbkind` tinyint(2) unsigned NOT NULL default '1',
  `totalid` smallint(5) unsigned NOT NULL,
  `totaltitle` varchar(45) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` varchar(400) NOT NULL,
  `qgrade` tinyint(1) unsigned NOT NULL default '1',
  `qloveb` int(10) unsigned NOT NULL default '0',
  `ifopen` tinyint(1) unsigned NOT NULL default '1',
  `flag` tinyint(2) NOT NULL default '1',
  `ifsh` tinyint(1) unsigned NOT NULL default '0',
  `useropen` tinyint(1) unsigned NOT NULL default '1',
  `ifin` tinyint(1) unsigned NOT NULL default '1',
  `ifin2` tinyint(3) unsigned NOT NULL default '1',
  `area1` varchar(45) NOT NULL,
  `area2` varchar(45) NOT NULL,
  `allusrnum` smallint(5) unsigned NOT NULL default '0',
  `wznum` int(8) unsigned NOT NULL default '0',
  `bbsnum` int(8) unsigned NOT NULL default '0',
  `photonum` smallint(5) unsigned NOT NULL default '0',
  `picurl_s` varchar(45) default NULL,
  `picurl_b` varchar(45) default NULL,
  `click` int(8) unsigned NOT NULL default '0',
  `px` int(8) unsigned NOT NULL default '0',
  `jjpmprice` int(10) unsigned NOT NULL default '0',
  `addtime` datetime NOT NULL,
  `userid` int(10) unsigned NOT NULL default '0',
  `nicknamesexgradephoto_s` varchar(60) NOT NULL,
  `userid1` int(10) unsigned NOT NULL default '0',
  `nicknamesexgradephoto_s1` varchar(60) default NULL,
  `userid2` int(10) unsigned NOT NULL default '0',
  `nicknamesexgradephoto_s2` varchar(60) default NULL,
  `userid3` int(10) unsigned NOT NULL default '0',
  `nicknamesexgradephoto_s3` varchar(60) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for yzlove_group_photo
-- ----------------------------
DROP TABLE IF EXISTS `yzlove_group_photo`;
CREATE TABLE `yzlove_group_photo` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `kind` smallint(5) unsigned NOT NULL,
  `mainid` smallint(5) unsigned NOT NULL,
  `title` varchar(50) default NULL,
  `path_s` varchar(50) NOT NULL,
  `path_b` varchar(50) NOT NULL,
  `ifmain` tinyint(3) unsigned NOT NULL default '0',
  `addtime` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for yzlove_group_photo_kind
-- ----------------------------
DROP TABLE IF EXISTS `yzlove_group_photo_kind`;
CREATE TABLE `yzlove_group_photo_kind` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `mainid` int(10) unsigned NOT NULL default '0',
  `title` varchar(50) NOT NULL,
  `px` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for yzlove_group_total
-- ----------------------------
DROP TABLE IF EXISTS `yzlove_group_total`;
CREATE TABLE `yzlove_group_total` (
  `id` smallint(5) unsigned NOT NULL auto_increment,
  `title` varchar(50) NOT NULL,
  `bknum` smallint(5) unsigned NOT NULL default '0',
  `flag` tinyint(4) NOT NULL default '0',
  `px` smallint(6) NOT NULL default '0',
  `addtime` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for yzlove_group_user
-- ----------------------------
DROP TABLE IF EXISTS `yzlove_group_user`;
CREATE TABLE `yzlove_group_user` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `mainid` int(8) unsigned NOT NULL,
  `flag` tinyint(4) NOT NULL default '0',
  `addtime` datetime NOT NULL,
  `userid` int(8) unsigned NOT NULL default '0',
  `nicknamesexgradephoto_s` varchar(60) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for yzlove_group_wz
-- ----------------------------
DROP TABLE IF EXISTS `yzlove_group_wz`;
CREATE TABLE `yzlove_group_wz` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `mainid` smallint(5) unsigned NOT NULL,
  `maintitle` varchar(50) NOT NULL,
  `bkid` int(10) unsigned NOT NULL,
  `bktitle` varchar(50) NOT NULL,
  `title` varchar(80) NOT NULL,
  `content` text NOT NULL,
  `bbsnum` smallint(5) unsigned NOT NULL default '0',
  `click` int(10) unsigned NOT NULL default '0',
  `iftop` tinyint(3) unsigned NOT NULL default '0',
  `ifjh` tinyint(3) unsigned NOT NULL default '0',
  `flag` tinyint(3) unsigned NOT NULL default '1',
  `endtime` datetime NOT NULL,
  `enduserid` int(10) unsigned NOT NULL,
  `endnicknamesexgradephoto_s` varchar(60) NOT NULL,
  `addtime` datetime NOT NULL,
  `userid` int(10) unsigned NOT NULL,
  `nicknamesexgradephoto_s` varchar(60) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `mainid` (`mainid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for yzlove_group_wz_bbs
-- ----------------------------
DROP TABLE IF EXISTS `yzlove_group_wz_bbs`;
CREATE TABLE `yzlove_group_wz_bbs` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `mainid` smallint(5) unsigned NOT NULL,
  `fid` int(10) unsigned NOT NULL,
  `content` text NOT NULL,
  `addtime` datetime NOT NULL,
  `userid` int(8) unsigned NOT NULL,
  `nicknamesexgradephoto_s` varchar(60) NOT NULL,
  `flag` tinyint(1) unsigned NOT NULL default '1',
  PRIMARY KEY  (`id`),
  KEY `fid` (`fid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for yzlove_ip
-- ----------------------------
DROP TABLE IF EXISTS `yzlove_ip`;
CREATE TABLE `yzlove_ip` (
  `id` int(11) NOT NULL auto_increment,
  `ipurl` varchar(20) NOT NULL,
  `content` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for yzlove_lovebhistory
-- ----------------------------
DROP TABLE IF EXISTS `yzlove_lovebhistory`;
CREATE TABLE `yzlove_lovebhistory` (
  `id` int(8) unsigned NOT NULL auto_increment,
  `userid` int(8) NOT NULL,
  `username` varchar(12) NOT NULL,
  `content` varchar(255) NOT NULL,
  `num` mediumint(8) NOT NULL,
  `addtime` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for yzlove_main
-- ----------------------------
DROP TABLE IF EXISTS `yzlove_main`;
CREATE TABLE `yzlove_main` (
  `id` int(9) unsigned NOT NULL auto_increment,
  `username` varchar(20) NOT NULL,
  `nickname` varchar(20) default NULL,
  `password` char(32) NOT NULL,
  `grade` tinyint(2) NOT NULL default '1',
  `loveb` mediumint(8) unsigned NOT NULL default '0',
  `regtime` datetime NOT NULL,
  `regip` varchar(15) NOT NULL,
  `logintime` datetime NOT NULL,
  `alltime` int(10) unsigned NOT NULL default '0',
  `loginip` varchar(15) default NULL,
  `logincount` int(6) unsigned NOT NULL default '0',
  `flag` tinyint(2) NOT NULL default '1',
  `eb` smallint(6) unsigned NOT NULL default '0',
  `mbkind` tinyint(2) NOT NULL default '1',
  `magic` tinyint(2) NOT NULL default '0',
  `bgpic` varchar(200) default NULL,
  `bgmusic` varchar(200) default NULL,
  `mbtitle` varchar(200) default NULL,
  `admintel` varchar(50) default NULL,
  `ifopencontact` tinyint(1) NOT NULL default '1',
  `ifmod` tinyint(1) NOT NULL default '0',
  `sjtime` datetime default NULL,
  `if2` tinyint(1) NOT NULL default '0',
  `sex` tinyint(1) NOT NULL default '0',
  `birthday` date NOT NULL,
  `love` tinyint(1) unsigned NOT NULL default '0',
  `kind` tinyint(1) unsigned NOT NULL default '1',
  `area1` varchar(6) NOT NULL,
  `area2` varchar(30) NOT NULL,
  `area3` varchar(10) default NULL,
  `area4` varchar(50) default NULL,
  `email` varchar(50) default NULL,
  `photo_s` varchar(40) default NULL,
  `video_s` varchar(40) default NULL,
  `click` int(8) unsigned NOT NULL default '0',
  `heigh` smallint(3) unsigned default NULL,
  `weigh` smallint(3) unsigned default NULL,
  `tx` tinyint(1) unsigned default NULL,
  `star` tinyint(1) unsigned default NULL,
  `blood` tinyint(1) unsigned default NULL,
  `zhongjiao` tinyint(1) unsigned default NULL,
  `house` tinyint(1) unsigned default NULL,
  `car` tinyint(1) unsigned default NULL,
  `clothing` tinyint(1) unsigned default NULL,
  `edu` tinyint(1) unsigned default NULL,
  `school` varchar(50) default NULL,
  `field` tinyint(2) unsigned default NULL,
  `job` tinyint(2) unsigned default NULL,
  `pay` tinyint(2) unsigned default NULL,
  `nianwang` varchar(240) default NULL,
  `xinyuan` varchar(240) default NULL,
  `smoking` tinyint(1) unsigned default NULL,
  `drink` tinyint(1) unsigned default NULL,
  `gexin` varchar(240) default NULL,
  `xinrong` varchar(240) default NULL,
  `youshi` varchar(240) default NULL,
  `xinqu` varchar(240) default NULL,
  `huoban` varchar(240) default NULL,
  `truename` varchar(8) default NULL,
  `address` varchar(50) default NULL,
  `post` varchar(6) default NULL,
  `tel` varchar(50) default NULL,
  `qq` varchar(50) default NULL,
  `msn` varchar(50) default NULL,
  `popo` varchar(50) default NULL,
  `homepage` varchar(100) default NULL,
  `aboutus` varchar(2000) default NULL,
  `ifphoto` tinyint(1) unsigned NOT NULL default '0',
  `ifbirthday` tinyint(1) unsigned NOT NULL default '0',
  `ifheigh` tinyint(1) unsigned NOT NULL default '0',
  `ifedu` tinyint(1) unsigned NOT NULL default '0',
  `iflove` tinyint(1) unsigned NOT NULL default '0',
  `ifpay` tinyint(1) unsigned NOT NULL default '0',
  `ifhouse` tinyint(1) unsigned NOT NULL default '0',
  `ifcar` tinyint(1) unsigned NOT NULL default '0',
  `diaryxieshoupx` int(10) unsigned NOT NULL default '0',
  `ifonline` tinyint(1) unsigned NOT NULL default '0',
  `zhenghun_jingjia` int(5) unsigned default '0',
  `yctel` varchar(200) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for yzlove_main_data
-- ----------------------------
DROP TABLE IF EXISTS `yzlove_main_data`;
CREATE TABLE `yzlove_main_data` (
  `userid` int(10) unsigned NOT NULL default '0',
  `ifmod` tinyint(1) NOT NULL default '0',
  `a1` tinyint(1) NOT NULL default '0',
  `a2` tinyint(1) NOT NULL default '0',
  `a3` varchar(255) default NULL,
  `a4` varchar(255) default NULL,
  `a5` varchar(255) default NULL,
  `a6` varchar(255) default NULL,
  `a7` varchar(255) default NULL,
  `b1` tinyint(2) NOT NULL default '0',
  `b2` tinyint(2) NOT NULL default '0',
  `b3` tinyint(2) NOT NULL default '0',
  `b4` tinyint(2) NOT NULL default '0',
  `b5` tinyint(2) NOT NULL default '0',
  `b6` tinyint(2) NOT NULL default '0',
  `b7` tinyint(2) NOT NULL default '0',
  `b8` tinyint(2) NOT NULL default '0',
  `b9` tinyint(2) NOT NULL default '0',
  `b10` tinyint(2) NOT NULL default '0',
  `b11` tinyint(2) NOT NULL default '0',
  `b12` tinyint(2) NOT NULL default '0',
  `b13` tinyint(2) NOT NULL default '0',
  `b14` tinyint(2) NOT NULL default '0',
  `b15` tinyint(2) NOT NULL default '0',
  `b16` varchar(255) default NULL,
  `b17` varchar(255) default NULL,
  `b18` varchar(255) default NULL,
  `b19` varchar(255) default NULL,
  `c1` tinyint(1) NOT NULL default '0',
  `c2` tinyint(1) NOT NULL default '0',
  `c3` tinyint(1) NOT NULL default '0',
  `c4` tinyint(1) NOT NULL default '0',
  `c5` tinyint(1) NOT NULL default '0',
  `c6` tinyint(1) NOT NULL default '0',
  `c7` tinyint(1) NOT NULL default '0',
  `c8` varchar(255) default NULL,
  `c9` varchar(255) default NULL,
  `c10` varchar(255) default NULL,
  `c11` varchar(255) default NULL,
  `d1` varchar(255) default NULL,
  `d2` varchar(100) default NULL,
  `d3` tinyint(4) NOT NULL default '0',
  `d4` tinyint(4) NOT NULL default '0',
  `d5` varchar(100) default NULL,
  `d6` tinyint(4) NOT NULL default '0',
  `d7` varchar(100) default NULL,
  `d8` varchar(100) default NULL,
  `d9` varchar(100) default NULL,
  `d10` varchar(100) default NULL,
  `d11` text,
  PRIMARY KEY  (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for yzlove_news
-- ----------------------------
DROP TABLE IF EXISTS `yzlove_news`;
CREATE TABLE `yzlove_news` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `kind` tinyint(1) NOT NULL default '1',
  `title` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `addtime` int(11) NOT NULL default '0',
  `click` int(11) NOT NULL default '200',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for yzlove_online
-- ----------------------------
DROP TABLE IF EXISTS `yzlove_online`;
CREATE TABLE `yzlove_online` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `userid` int(8) unsigned default '0',
  `actiontime` int(11) default '0',
  `stealth` tinyint(1) NOT NULL default '0',
  `rnd` int(11) unsigned NOT NULL default '0',
  `p` tinyint(1) NOT NULL default '0',
  `g` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `actiontime` (`actiontime`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for yzlove_photo
-- ----------------------------
DROP TABLE IF EXISTS `yzlove_photo`;
CREATE TABLE `yzlove_photo` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `userid` int(8) unsigned NOT NULL,
  `path_s` varchar(100) NOT NULL,
  `path_b` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `flag` tinyint(1) unsigned NOT NULL default '0',
  `ifmain` tinyint(1) unsigned NOT NULL default '0',
  `addtime` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `userid` (`userid`),
  KEY `userid_2` (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for yzlove_present
-- ----------------------------
DROP TABLE IF EXISTS `yzlove_present`;
CREATE TABLE `yzlove_present` (
  `id` int(11) NOT NULL auto_increment,
  `kind` tinyint(3) unsigned NOT NULL,
  `price` int(10) unsigned NOT NULL default '0',
  `picurl` varchar(100) default NULL,
  `px` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for yzlove_present_user
-- ----------------------------
DROP TABLE IF EXISTS `yzlove_present_user`;
CREATE TABLE `yzlove_present_user` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `kid` int(10) unsigned NOT NULL,
  `userid` int(10) unsigned NOT NULL,
  `senduserid` int(10) unsigned NOT NULL,
  `content` varchar(250) default NULL,
  `new` tinyint(1) NOT NULL default '1',
  `addtime` int(11) unsigned NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `kid` (`kid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for yzlove_request
-- ----------------------------
DROP TABLE IF EXISTS `yzlove_request`;
CREATE TABLE `yzlove_request` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `userid` int(10) unsigned default NULL,
  `sex` varchar(10) default NULL,
  `photo_s` varchar(10) default '0',
  `video_s` varchar(10) default '0',
  `ifphoto` varchar(10) default '0',
  `ifbirthday` tinyint(1) default '0',
  `ifheigh` tinyint(1) default '0',
  `ifedu` varchar(10) default '0',
  `iflove` varchar(10) default '0',
  `ifpay` varchar(10) default '0',
  `ifhouse` varchar(10) default '0',
  `ifcar` varchar(10) default '0',
  `birthday1` varchar(10) default NULL,
  `birthday2` varchar(10) default NULL,
  `kind` varchar(10) default NULL,
  `area1` varchar(10) default NULL,
  `area2` varchar(40) default NULL,
  `area3` varchar(10) default NULL,
  `area4` varchar(40) default NULL,
  `love` varchar(10) default NULL,
  `heigh1` varchar(10) default NULL,
  `heigh2` varchar(10) default NULL,
  `weigh1` varchar(10) default NULL,
  `weigh2` varchar(10) default NULL,
  `house` varchar(10) default NULL,
  `car` varchar(10) default NULL,
  `edu` varchar(10) default NULL,
  `pay` varchar(10) default NULL,
  `field` varchar(10) default NULL,
  `job` varchar(10) default NULL,
  `smoking` varchar(10) default NULL,
  `drink` varchar(10) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for yzlove_story
-- ----------------------------
DROP TABLE IF EXISTS `yzlove_story`;
CREATE TABLE `yzlove_story` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `userid` int(10) unsigned NOT NULL,
  `nicknamesexgradephoto_s` varchar(60) NOT NULL,
  `userid2` int(10) unsigned NOT NULL,
  `nicknamesexgradephoto_s2` varchar(60) NOT NULL,
  `sussflag` tinyint(1) unsigned NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `addtime` datetime NOT NULL,
  `click` int(10) unsigned NOT NULL default '0',
  `bbsnum` int(10) unsigned NOT NULL default '0',
  `flag` tinyint(1) unsigned NOT NULL default '0',
  `ifjh` tinyint(1) unsigned NOT NULL default '0',
  `picurl_s` varchar(80) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for yzlove_story_bbs
-- ----------------------------
DROP TABLE IF EXISTS `yzlove_story_bbs`;
CREATE TABLE `yzlove_story_bbs` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `fid` int(10) unsigned NOT NULL,
  `content` varchar(500) NOT NULL,
  `userid` int(10) unsigned NOT NULL,
  `nicknamesexgradephoto_s` varchar(60) NOT NULL,
  `addtime` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for yzlove_story_photo
-- ----------------------------
DROP TABLE IF EXISTS `yzlove_story_photo`;
CREATE TABLE `yzlove_story_photo` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `fid` int(10) unsigned NOT NULL,
  `title` varchar(100) NOT NULL,
  `path_s` varchar(60) NOT NULL,
  `path_b` varchar(60) NOT NULL,
  `ifmain` tinyint(1) unsigned NOT NULL default '0',
  `addtime` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for yzlove_supphoto
-- ----------------------------
DROP TABLE IF EXISTS `yzlove_supphoto`;
CREATE TABLE `yzlove_supphoto` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `userid` int(10) unsigned NOT NULL default '0',
  `path_b` varchar(50) default NULL,
  `addtime` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for yzlove_video
-- ----------------------------
DROP TABLE IF EXISTS `yzlove_video`;
CREATE TABLE `yzlove_video` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `userid` int(8) unsigned NOT NULL,
  `path_s` varchar(40) NOT NULL,
  `path_b` varchar(40) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` varchar(2000) default NULL,
  `flag` tinyint(2) NOT NULL default '0',
  `ifmain` tinyint(1) unsigned NOT NULL default '0',
  `addtime` datetime NOT NULL,
  `click` int(10) unsigned NOT NULL default '0',
  `ifjh` tinyint(3) unsigned NOT NULL default '0',
  `effectid` int(11) default '0',
  `frameid` int(11) default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `yzlove_admin` VALUES ('1', 'admin', '96e79218965eb72c92a549dd5a330112', '10', '2009-11-04 02:46:50', '192.168.1.117', '2009-05-20 12:47:02', '4');
INSERT INTO `yzlove_main` VALUES ('1', 'test', 'test', '96e79218965eb72c92a549dd5a330112', '3', '7070', '2009-11-03 12:03:34', '192.168.1.117', '2009-11-04 09:31:19', '547', '192.168.1.117', '1', '1', '0', '1', '0', null, null, null, null, '1', '1', '2009-11-03 12:03:50', '1', '1', '1981-01-15', '1', '3', '', '', '', '', 'test@163.com', 'm/200911/1.jpg', null, '14', '190', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '', null, null, null, null, null, null, null, null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '13800138000');
INSERT INTO `yzlove_online` VALUES ('7', '1', '1257327377', '0', '0', '1', '3');