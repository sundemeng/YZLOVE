<?php
session_start();
Header("Content-type: image/PNG");
$str = "的一是在了不和有大这主中人上为们地个用工时要动国产以我到他会作来分生对于学下级就年阶义发成部民可出能方进同行面说种过命度而多后自社加小机也经力线本电高量长所有的人都认为我已经忘那段未开始曾经都为我附加了不想去证的标都以为从你开始做出让我措手不及的时早已将我们的回忆至九云不知我没有忘过去的每个片段我都没有我也好恨现在的自己我还期待着什么还等待着什么曾经我将所有的信任交托于你没有想到自己总是闷闷不语换来了出乎意料的结局还记得刚开始认识你时你的冷漠你的高傲你对他人的无视惹人生气那时与你的交谈也只不过是陌生人之间的问候真的想要于你更进一步可是你总是将人门于千里之外上一道加密的锁而我手中却没有获取密码的权利是进是退无从选择我承认很自私我的自私将你一步一步逼至边上所谓的个性让你的性磨到了极致肮脏的行为没有让我得到丝毫的快乐最终自己布下的自己却的最深记得我们聊天到深夜我不停从你口探听他的消而你却并不在记得你为我做着你并不擅长的手工作业最后还被我一番而你却并不在意记得自己刚刚上任就接到一项手的活动而你却主动替我解决了所有的准备工作与后续工作记得舍友遇到困难我只是轻轻地问了你几句第二天你便替我解决了你可知道我的感激感动有多少吗记得因为我的过失让你生气郁闷不肯吃饭我怎么劝你都不肯而最终我投降第一次给男生买饭不知道在我转身之后你到底是什么神情或记得对你讲起身边同学的新鲜你冷漠的回答像一泼凉水冷而你却还要故弄果是我有什么改变就一定告诉我无语不知怎么却不厌恶这句话而我现在改变了却不在原地不知道从何时开始自己对你无理取闹慢慢显现出女生的本性脱掉了那层虚伪的外";
$imgWidth = 110;
$imgHeight = 24;
$authimg = imagecreate($imgWidth,$imgHeight);
$bgColor = ImageColorAllocate($authimg,255,255,255);
$fontfile = "zeai.ttf";
$white=imagecolorallocate($authimg,234,185,95);
imagearc($authimg, 150, 8, 20, 20, 75, 170, $white);
imagearc($authimg, 100, 7,50, 22, 75, 175, $white);
imageline($authimg,20,20,180,30,$white);
imageline($authimg,20,18,170,50,$white);
imageline($authimg,25,50,80,50,$white);
$noise_num = 100;
$line_num = 5;
imagecolorallocate($authimg,0xff,0xff,0xff);
$rectangle_color=imagecolorallocate($authimg,0xAA,0xAA,0xAA);
$noise_color=imagecolorallocate($authimg,0x33,0x33,0x33);
$font_color=imagecolorallocate($authimg,0x00,0x00,0x00);
$line_color=imagecolorallocate($authimg,0x00,0x00,0x00);
for($i=0;$i<$noise_num;$i++){
	imagesetpixel($authimg,mt_rand(0,$imgWidth),mt_rand(0,$imgHeight),$noise_color);
}
for($i=0;$i<$line_num;$i++){
	imageline($authimg,mt_rand(0,$imgWidth),mt_rand(0,$imgHeight),mt_rand(0,$imgWidth),mt_rand(0,$imgHeight),$line_color);
}
$randnum=rand(0,strlen($str)-4);
if($randnum%2)$randnum+=1;
$str = substr($str,$randnum,8);
$_SESSION['supdesverify'] = $str;
$str = iconv("GB2312","UTF-8",$str);
ImageTTFText($authimg, 20, 0, 0, 21, $font_color, $fontfile, $str);
ImagePNG($authimg);
ImageDestroy($authimg);
?>