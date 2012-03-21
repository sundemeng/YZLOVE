<?php
/*
+--------------------------------+
+ 本后台程序版权属于本人所有
+ Author：林小先，lyixian@126.com www.linxiaoxian.com，QQ：6154041
+ 本文件最后修改日期：2010年1月
+ 如有修改，请保留本段信息，对您站没有影响
+--------------------------------+
*/
/**
* 生成验证码的类
*
*/
class code{
var $str;     //随机生成的字符串
var $width = 85;   //验证码图片的宽度
var $height = 20;  //验证码图片的高度
/**
  * 构造函数
  *
  * @param String $width    验证码图片的宽度
  * @param String $height   验证码图片的高度
  * @param String $size     字符个数
  */
function code($width = 50,$height = 25,$size = 4){
  $this->str = $this->random($size);
  $this->width = $width;
  $this->height = $height;
  //session_register("code");
  $_SESSION["code"] = $this->str;
}
/**
  * 随即生成字符的函数
  *
  * @param int $len    要生成的字符的个数
  * @return 生成的字符串
  */
function random($len){ 
  $srcstr="abcdefghijklmnopqrstuvwxyz0123456789"; 
  mt_srand(); 
  $strs=""; 
  for($i=0;$i<$len;$i++){ 
   $strs.=$srcstr[mt_rand(0,35)]; 
  } 
  return $strs; 
} 

/**
  * 生成验证码并输出
  *
  */#7CD3E7
function genimg(){ 
  //@header("Content-Type:image/png"); 
  $im=imagecreate($this->width,$this->height); 
  
  //背景色 
  $back=imagecolorallocate($im,0xFF,0xFF,0xFF); 
  //模糊点颜色 
  $pix=imagecolorallocate($im,187,230,247); 
  //字体色 
  $font=imagecolorallocate($im,41,163,238); 
  
  //绘模糊作用的点 
  mt_srand(); 
  for($i=0;$i<1000;$i++){ 
   imagesetpixel($im,mt_rand(0,$this->width),mt_rand(0,$this->height),$pix); 
  } 
  
  
  //写字,选择ComicSansMS字体 
  //imagettftext($im,20,0,3,25,$font,"comic.ttf",$this->str);
  //$x = mt_rand(1,20);
  //$y = mt_rand(0,18); 
  imagestring($im, 8, 10, 5,$this->str, $font);
  imagerectangle($im,0,0,$this->width-1,$this->height-1,$font); 
  
  
  imagepng($im,"imcode.png"); 
  imagedestroy($im);
} 
}
?>
