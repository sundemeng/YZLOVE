var lastname = "";
var tmpimg = "<img src=images/error.gif align=absmiddle>";
var msg=new Array(
tmpimg+"用户名必须由3~12位小写英文字母或小写英文字母加数字组合而成，且以字母开头；注册之后不可以修改。<br><br>　注册中文用户名请 <a href=help/ class=u000>联系客服</a><br><br>",
tmpimg+"此用户名包含不可接受字符或被管理员屏蔽,请选择其它用户名",
tmpimg+"为了避免交友网用户名混乱,用户名中禁止使用大写字母,请使用小写字母",
tmpimg+"该用户名已经被注册，请选用其他用户名。",
"<img src=images/ok.gif align=absmiddle><font color=\"green\"> 恭喜您，该用户名还未被注册，您可以使用这个用户名！</font>"
);
function ReloadCode(){
	var dt = new Date().getTime();
	document.getElementById('gylverify' ).src='sub/authcode.php?dt='+dt;
}
function namecheck() {
	a = document.getElementById('warn');
	a.className="warn1";
	var username = document.getElementById("form_username").value;
	if (username == "") {
		alert('请输入用户名！');
		document.FORM.form_username.focus();
		return false;
	}
	if (username == lastname) {
		return false;
	}
	lastname = username;
	document.checkForm.username.value = username;
	document.getElementById("check_info").innerHTML = "检测中，请稍等...";
	document.checkForm.submit();
	return true;
}
function retmsg(id,str){
	document.getElementById("check_info").innerHTML = msg[id]+str;
	if (id == 1){
		a = document.getElementById('warn');
		a.className="warn2";
	}
}
function chkform(){
	if(document.FORM.form_username.value==""){
	alert('请输入用户名！');
	document.FORM.form_username.focus();
	return false;}
	

	if(document.FORM.form_password1.value==""){
	alert('请输入密码！');
	document.FORM.form_password1.focus();
	return false;}
	if(document.FORM.form_password1.value.length>20 || document.FORM.form_password1.value.length<6)	{
	alert('密码请控制在6~20个字节内！');
	document.FORM.form_password1.focus();
	return false;
	}
	if(document.FORM.form_password2.value==""){
	alert('请输入确认密码！');
	document.FORM.form_password2.focus();
	return false;
	}
	if(document.FORM.form_password2.value.length>20 || document.FORM.form_password2.value.length<6)	{
	alert('确认密码请控制在6~20个字节内！');
	document.FORM.form_password2.focus();
	return false;
	}
	if(document.FORM.form_password1.value!=document.FORM.form_password2.value) {
	alert("两次密码不一致");
	document.FORM.form_password2.focus();
	return false;		
	}
	var resualt=false;
	for(var i=0;i<document.FORM.form_sex.length;i++){
		if(document.FORM.form_sex[i].checked){
		  resualt=true;
		}
	}
	if(!resualt){
		alert("请选择性别");
		return false;
	}
	if(document.FORM.form_love.value==""){
	alert('请选择婚姻状况！');
	document.FORM.form_love.focus();
	return false;
	}
	if(document.FORM.province.value==""){
	alert('请选择所在地区的“省份”！');
	document.FORM.province.focus();
	return false;
	}
	if(document.FORM.city.value==""){
	alert('请选择所在地区的“城市”！');
	document.FORM.city.focus();
	return false;
	}
	var strm = document.FORM.form_email.value;
	if(strm!=""){
		var regm = /^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/;
		if (!strm.match(regm)){
		alert("邮箱地址格式错误或含有非法字符!\n请检查！");
		document.FORM.form_email.focus();   
		return false;
		} 
	}
	if(document.FORM.yctel.value==""){
	alert('请输入“联系电话”！');
	document.FORM.yctel.focus();
	return false;
	}
	if(document.FORM.regverify.value==""){
	alert('请输入验证码！');
	document.FORM.regverify.focus();
	return false;
	}
	var b= /^[\u4e00-\u9fa5\_]+$/; 
	if(!b.test(document.FORM.regverify.value)){ 
		alert('请把右边的4位汉字填入此框！');
		document.FORM.regverify.focus();
		return false; 
	}
	if(document.FORM.agree.checked == false){
	alert('不同意本站条款将不能注册》');
	document.FORM.agree.focus();
	return false;
	}
}