var tag_data = {};
tag_data["gexin"] = "冒险/疯狂,稳重,浪漫/脱俗,好斗,幽默/机智,敏感,自由,聪明,认真/负责,爽快,简单,艺术气质,武断/霸道,冲动,世故/圆滑,保守,深沉,精神至上/理想主义,踏实/实际,滑稽,自然/本能,随意/随和,懒散,自信,古怪/反叛,安静/害羞,健谈,精力充沛";
tag_data["xinrong"] = "文质彬彬型,西部牛仔型,阳光帅气型,风度翩翩型,成熟魅力型,健壮高大型,朴实无华型,内敛酷男型,追求刺激/冒险分子,电脑专家,自由的思想者,一个好听众,享乐主义者,现实主义者,活跃分子,八面玲珑/左右逢源,人精,管家婆,大肚宽容,爱收拾的人,百科全书,小丑,冒险分子,沉默寡言的人,精于世故,神秘人士,害羞,善于保护自己,固执倔强,好心人,富有激情,温柔贤惠,悲观主义者,乐观主义者,玩世不恭/愤世嫉俗,有点色";

tag_data["youshi"] = "相貌,身材,学识,事业成就,经济条件,个性脾气,家庭背景,前途,真诚,外表/长像,幽默感,性能力";

tag_data["xinqu"] = "汽车,唱歌,跳舞,影视,音乐,聊天,电脑及网络,旅游,购物,游戏,绘画书法,读书,写作,体育运动,烹饪,政治,八卦,宗教,摄影,动物,展览,戏剧,手工艺,其他";

tag_data["huoban"] = "追求刺激,电脑专家,自由的思想者,一个好听众,八面玲珑/左右逢源,人精,管家婆,大肚宽容,爱收拾的人,百科全书,冒险分子,害羞,好心人,富有激情,温柔贤惠,有点色";

var oPopup;
oPopup = window.createPopup();
function popw(ctl,content)
{
	content = "<div id='co' style='height:200px;overflow-y:hidden;overflow-y:auto;'>"+content+"</div>";
	content += "<style>a:link{color:#01297E;text-decoration:underline;}a:visited{color:#01297E;text-decoration:underline;}a:hover{color:red;text-decoration:none;}</style>";
	//ctl = document.getElementById(ctl);
	if (typeof(content)!="string")
	{
		content = content.toString();
	}
	if (oPopup==null)
	{
		oPopup = window.createPopup();
	}
	var oPopBody = oPopup.document.body;
	var bc,gc;
	gc = "";
	bc = "#ccc";

	oPopBody.style.fontFamily = "Tahoma";
	oPopBody.style.fontSize = "12px";
	oPopBody.style.margin = "4px";
	oPopBody.style.backgroundColor = gc;
	oPopBody.style.border = "solid "+bc+" 1px";

	//*
	oPopBody.innerHTML = content; //" 测试内容.Test";
	with(ctl)
	{
		/*
		var h = oPopup.document.body.scrollHeight;
		oPopup.show(findPosX(ctl)+1,findPosY(ctl)+offsetHeight+2, offsetWidth+1, h, document.body);
		h = oPopup.document.body.scrollHeight;
		if (h >200) h=200;
		//*/
		oPopup.show(findPosX(ctl)+1,findPosY(ctl)+offsetHeight+2, offsetWidth+1, 200, document.body);
	}
	//*/
}

//生成选项html
function makeSelection(ns,flag)
{
	var t_html = "";
	if (typeof(tag_data[flag])!="undefined")
	{
		var al = tag_data[flag].split(",");
		for(i=0;i<al.length;i++)
		{
			if (al[i]!="|")
			{
				t_html += "<a href='#' onclick='return setTag(\""+ns+"\", this.innerText);' class=u6699CC>"+al[i]+"</a>　";
			}
			else
			{
				t_html +="<br/>";
			}
		}
	}
	else
	{
		t_html = "";
	}
	//return "<div id='co' style='height:200px;overflow-y:hidden;overflow-y:auto;'>"+t_html+"</div>";
	return t_html;
}

//设置tag值
function setTag(ns,tag)
{
	try
	{
		var o = document.all[ns];
		var s = o.value;
		if (s == "") {
			o.value = tag;
		}
		else {
			switch(s.indexOf(tag)){
				case -1:
				o.value += " " + tag;
				break;

				case 0:
				if (s.replace(tag,"")!="") o.value = s.replace(tag+" ","") + " "+ tag;
				break;

				default:
				o.value = s.replace(" "+tag,"") + " "+ tag;
				break;
			}
		}
		return false;
	}
	catch(e)
	{
		alert(e.description);
	}
}

function closeTip()
{
	for(i=1;i<=5;i++)
	{
		document.getElementById('tipinfo'+i).style.display = "none";
	}
}

//指定需要特效的控件
function setTagBehavior(obj,ns,div_id)
{
	if (obj==null) return;
	if (typeof(tag_data[ns])=="undefined") return;
	var tip_obj = document.getElementById(div_id);
	if (tip_obj==null) return;
	obj.onblur = function() { this.style.backgroundColor = "#ffffff"; }
	closeTip();
	obj.style.backgroundColor = "#FFFBD1";
	tip_obj.innerHTML = makeSelection(obj.name,ns);
	tip_obj.style.display = "block";
	//popw(obj,makeSelection(obj.name,flag));
}
