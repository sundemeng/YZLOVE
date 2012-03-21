function $(id) {
	return document.getElementById(id);
}
function getMovie(movie) {
    if (navigator.appName.indexOf("Microsoft") != -1) {
        return window[movie+"IE"]
    }
    else {
        return document[movie+"FF"]
    }
}

//wmppsUndefined = 0;//未知状态
//wmppsStopped = 1;//播放停止
//wmppsPaused = 2;//播放暂停
//wmppsPlaying = 3;//正在播放
//wmppsScanForward = 4;//向前搜索
//wmppsScanReverse = 5;//向后搜索
//wmppsBuffering = 6;//正在缓冲
//wmppsWaiting = 7;//正在等待流开始
//wmppsMediaEnded = 8;//播放流已结束
//wmppsTransitioning = 9;//准备新的媒体文件
//wmppsReady = 10;//播放准备就绪
//wmppsReconnecting = 11;//尝试重新连接流媒体数据
//wmppsLast = 12;//上一次状态,状态没有改变

function audioPlayer()
{
	var playState = 0;
	var volume = 50;
	var autoPlay = false;
	var mp;
	var cp;
	var nowplayer;
	this.src = '';
	mp = new mediaPlayer;
	mp.loop = -1;
	this.play = function(url)
	{
		this.src = url;
		if (this.src)
		{
			if (this.audioType())
			{
				cp = mp;
			}
			else
			{
				alert("不支持rm格式的音乐哦");
			}
			if (this.playState() == 3)
			{
				this.stop();
				return;
			}
			if (this.playState() == 2)
			{
				cp.playPause();
				return;
			}
			if (cp.src != this.src)
			{
				cp.src = this.src;
			}
			try
			{
				cp.play();
				nowplayer = cp;
			}
			catch (e){}
		}
		else{			
			cp.playPause();
			return;
		}
	}
	this.stop = function()
	{
		if (cp){
			cp.stop();
//			if (this.playState() ==3 || this.playState() == 2){cp.stop();}
		}
	}
	this.pause = function()
	{
		if (cp){
//			if (this.playState() == 3){cp.pause();}
			cp.pause();
		}
	}
	this.volumeAdd = function(v)
	{
		if (cp){
			cp.volumeAdd(v);
		}
	}
	this.volumeMinus = function(v)
	{
		if (cp){		
			cp.volumeMinus(v);
		}
	}
	this.volumeMute = function()
	{
		if (cp){
			cp.volumeMute();
		}
	}
	this.playState = function()
	{
		var r = 0;

		if (cp)
		{
			var s = cp.playState();
			if (!this.audioType())
			{
				switch (s)
				{
				case 0: r = 1;break;
				case 1: r = 6;break;
				case 2: r = 6;break;
				case 3: r = 3;break;
				case 4: r = 7;break;
				default:r = 0;
				}
			}
			else
			{
				r = s;
			}
		}

		return r;
	}
	this.audioType = function()
	{
		var u = this.src;
		var t = u.split('.');
//////////////////////////////////////名		
		if (t.length > 0 )
		{
			t = t[t.length-1].toLowerCase();
		}
		
		var rmAudio = 'rm,ra,rmvb';
		var wmAduio = 'wma,mp3,asf,wav';
		if (rmAudio.indexOf(t) >= 0)
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	this.position = function()
	{
		
		if (cp)
		{
			return cp.position();
		}else
		{
			return '00:00';
		}
	}
	this.length = function()
	{
		if (cp)
		{
			return cp.length();
		}
		else
		{
			return '00:00';
		}
	}
	this.duration = function()
	{
		if (cp)
		{
			return cp.duration();
		}
		else
		{
			return '00:00';
		}
		
	}
	this.seek = function(second)
	{
		if(cp)
		{
			cp.seek(second);
		}
		else
		{
			return;	
		}		
	}
	this.truePosition = function()
	{
		return cp.truePosition();
	}
	this.trueDuration = function()
	{
		return cp.trueDuration();
	}
}

function mediaPlayer()
{
	var mp;
	this.playState = 0;
	this.volume = 50;
	this.autoPlay = false;
	this.display = 'block';
	this.loop = -1;
	this.src = '';
	mp = document.createElement("object");
	$("MusicPlayer").appendChild(mp);
	mp.id = 'mediaPlayerObject';
	mp.classid = 'clsid:6BF52A52-394A-11D3-B153-00C04F79FAA6';
	
// backward compability to wmp 6.4
//	mp.classid = 'clsid:22D6F312-B0F6-11D0-94AB-0080C74C7E95';

	mp.style.display = this.display;
	mp.settings.autoStart = this.autoPlay;
	mp.settings.volume = this.volume;
	mp.settings.playCount = this.loop;
	mp.windowlessVideo = true;
	mp.attachEvent("PlayStateChange",PlayStateChangeHandler);
	function PlayStateChangeHandler(v)
	{
		checkPlayState(v);
		this.playState = v;
	}
	this.play = function()
	{
		mp.URL = this.src;
		if (mp.controls.isAvailable('play'))
		{
			mp.controls.play();
		}
	}
	this.stop = function()
	{
		if (mp.controls.isAvailable('stop'))
		{
			mp.controls.stop();
		}
	}
	this.pause = function()
	{
		if (mp.controls.isAvailable('pause'))
		{
			mp.controls.pause();
		}
	}

	this.playStop = function()
	{
		if (this.playState == 3)
		{
			mp.controls.stop();
		}
		else
		{
			mp.controls.play();
		}		
	}
	this.playPause = function()
	{
		if (this.playState == 3)
		{
			mp.controls.pause();
		}
		else
		{
			mp.controls.play();

		}
	}
	this.volumeAdd = function (v)
	{
		this.volume = v
		mp.settings.volume = this.volume;
	}
	this.volumeMinus = function (v)
	{
		this.volume = v;
		mp.settings.volume = this.volume;
	}
	this.volumeMute = function()
	{
		mp.settings.mute = (!mp.settings.mute);
	}
	
	this.position = function()	{return mp.controls.currentPositionString}
	this.duration = function(){return mp.currentMedia.durationString }
	this.length = function(){return mp.currentMedia.durationString}
	this.playState = function(){return mp.playState};
	this.truePosition =function(){return mp.controls.currentPosition};
	this.trueDuration =function(){return mp.currentMedia.duration};
	this.seek = function(second)
	{
		mp.controls.CurrentPosition = second;
	}
}