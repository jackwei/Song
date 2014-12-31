WeixinApi.ready(function(Api) {
    var appId = '';
    var shareUrl = 'http://call.socialjia.com/Wxapp/weixin_common/oauth2.0/link.php?entid=37&url=http%3A%2F%2Fbluescfg.sinaapp.com%2FLoveSong';
    var imgUrl = 'http://bluescfg.sinaapp.com/LoveSong/img/share.png';
    var rand = Math.round(Math.random()*2);
    var wxData = {
            "appId": appId,
            "imgUrl" : imgUrl,
            "link": shareUrl,
            "title": "这是一张神秘礼物卡，我已经领取到了属于我的那一份，快来领取你的新年礼物吧！",
            "desc": ''
        };
    
    var wxCallbacks = {
	    favorite: false,
    	confirm: function(resp) {
    		if(mySwiper.activeIndex ==5){
    			randomPrize();
    		}
	    }
    };

	Api.shareToFriend(wxData, wxCallbacks);
	Api.shareToTimeline(wxData, wxCallbacks);
	Api.shareToWeibo(wxData, wxCallbacks);
	Api.generalShare(wxData,wxCallbacks);
});

/* 加载图片 */
var loadingImages = [
'img/bg-1.jpg',
'img/bg-2.jpg',
'img/bg-3.jpg',
'img/bg-4.jpg',
'img/bg-5.jpg',
'img/bg-6.jpg',
'img/bg-9.jpg',
'img/prize.jpg',
'img/noprize.jpg',
'img/8-1.png',
'img/8-2.png',
'img/8-3.png',
'img/8-4.png',
'img/8-5.png',
'img/8-6.png',
'img/8-1.png',
'img/phone.png',
'img/info.png'
]
resourceDir="";
function loadResources(urls, progress) {
    var loadedCount = 0;
    var loaded = function () {
        ++loadedCount;
        if (progress) progress(urls.length, loadedCount, this);
    };
    for (var i = 0; i < urls.length; ++i) {
        if (!urls[i]) {
            loaded();
            return;
        }
        var img = new Image();
        //resourceMap[urls[i]] = img;
        img.onload = loaded;
        img.onabort = loaded;
        img.onerror = loaded;
        img.src = resourceDir + urls[i];//+ "?ver=" + j_version;
    }
}
loadResources(loadingImages,function (n, i, img) {
    $("#loading").html("loading&nbsp;&nbsp;" + Math.round(i * 100 / n) + "%");
    if (i != n) return;
    $("#loading").hide();
    $(".swiper-container").show();
})

/*播放背景音乐*/
function play_single_sound() {
    var audioEle = document.getElementById('musicBox');
    audioEle.play();
}

$("html").on("click",function(){
	play_single_sound();
})

$("html").on("touchstart",function(){
	play_single_sound();
})

/*setTimeout(function(){
    $(".notice-swipe-up").addClass("swipeMove");
},500);
*/
$(function(){
	
	/*判断是电脑还是手机端*/
	/*var is_iPd = navigator.userAgent.match(/(iPad|iPod|iPhone)/i) != null;
	var is_mobi = navigator.userAgent.toLowerCase().match(/(ipod|iphone|android|coolpad|mmp|smartphone|midp|wap|xoom|symbian|j2me|blackberry|win ce)/i) != null;
	if(is_mobi && window.location.search.indexOf("mv=fp")<0){
		$(".swiper-container").width($(window).width());
		$(".swiper-container").height($(window).height());
	}else{
		$(".swiper-container").width("380px");
		$(".swiper-container").height("670px");
	}*/
	
	$(".swiper-container").width($(window).width());
	$(".swiper-container").height($(window).height());
	
	mySwiper.addCallback('SlideChangeEnd', function(swiper){
		 if(mySwiper.activeIndex ==1 ){
			 $("#ico-2").removeClass('swing animated').addClass('swing animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
			      $(this).removeClass('swing animated');
			    });
			 $(".desc-2").css("display", "inline-block");
			 $(".desc-2").removeClass('fadeIn animated').addClass('fadeIn animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
			      $(this).removeClass('fadeIn animated');
			    });
		 }else if(mySwiper.activeIndex ==2){
			 $(".desc-2").css("display", "none");
			 $("#ico-3").removeClass('swing animated').addClass('swing animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
			      $(this).removeClass('swing animated');
			    });
			 $(".desc-3").css("display", "inline-block");
			 $(".desc-3").removeClass('fadeIn animated').addClass('fadeIn animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
			      $(this).removeClass('fadeIn animated');
			    });
		 }else if(mySwiper.activeIndex ==3){
			 $(".desc-3").css("display", "none");
			 $("#ico-4").removeClass('swing animated').addClass('swing animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
			      $(this).removeClass('swing animated');
			    });
			 $(".desc-4").css("display", "inline-block");
			 $(".desc-4").removeClass('fadeIn animated').addClass('fadeIn animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
			      $(this).removeClass('fadeIn animated');
			    });
		 }else if(mySwiper.activeIndex ==4){
			 $(".desc-4").css("display", "none");
			 $("#ico-5").removeClass('swing animated').addClass('swing animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
			      $(this).removeClass('swing animated');
			    });
			 $(".desc-5").css("display", "inline-block");
			 $(".desc-5").removeClass('fadeIn animated').addClass('fadeIn animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
			      $(this).removeClass('fadeIn animated');
			    });
		 }else if(mySwiper.activeIndex ==5){
			 $(".desc-5").css("display", "none");
			 $("#ico-6").removeClass('swing animated').addClass('swing animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
			      $(this).removeClass('swing animated');
			    });
		 }else if(mySwiper.activeIndex ==6){
			 $(".hand").addClass('shake handshake');
			 
		 }else{
			 play_single_sound();
		 }
		 
	})
	
	
})


$(".liwu").on("click",function(){
	/*mySwiper.swipeNext()*/
	/*show_prize(".yuan_10");*/
	/*show_noprize(".notice5");*/
	/*play_single_sound();*/
})

$(".lp1").on("click",function(){
	$(".screen-last").show();
})

$(".lp2").on("click",function(){
	$(".screen-last").show();
})

$(".lp3").on("click",function(){
	$(".screen-last").show();
})

/*$(".share").on("click",function(){
	randomPrize();
})*/

/*获取奖品*/
var lflag = false;
function randomPrize(){
	if (lflag) return;
	lflag = true;
	$.get('lottery.php', {a:'lucky', openid:openid}, function(rst) {
		if (rst.code == 0 && rst.level == 1) {
			show_prize(".yuan_10");
		}else if (rst.code == 0 && rst.level == 2) {
			show_prize(".yuan_5");
		}else if (rst.code == 0 && rst.level == 3) {
			show_prize(".yuan_50");
		}else if (rst.code == 0 && rst.level == 4) {
			show_prize(".icebox");
		}else if (rst.code == 0 && rst.level == 5) {
			show_prize(".washer");
		}else if (rst.code == 0 && rst.level == 6) {
			show_prize(".cup");
		}else if(rst.code == 201){
			location.href="./index.php";
		}else if(rst.code == 202){
			location.href="./index.php";
		}else {
			var rand = Math.ceil(Math.random()*(5-1)+1);
			if(rand == 1){
				show_noprize(".notice1");
			}else if(rand ==2){
				show_noprize(".notice2");
			}else if(rand ==3){
				show_noprize(".notice3");
			}else if(rand ==4){
				show_noprize(".notice4");
			}else if(rand ==5){
				show_noprize(".notice5");
			}
		}
	}, 'json');
}


function show_prize(cls){
	$(".prize").show();
	$(cls).show(600);
}

function show_noprize(cls){
	$(".noprize").show();
	$(cls).show(600,function(){
		setTimeout(function(){
			close();
			mySwiper.swipeNext();
		},1000);
	});
}

function close(){
	$(".yuan_10").hide();
	$(".yuan_5").hide();
	$(".yuan_50").hide();
	$(".cup").hide();
	$(".washer").hide();
	$(".icebox").hide();
	$(".info").hide();
	$(".phone").hide();
	$(".prize").hide();
	$(".noprize").hide();
	$(".screen-last").hide();
}

$(".yuan_5").on("click",function(){
	close();
	show_prize(".phone");
})

$(".yuan_10").on("click",function(){
	close();
	show_prize(".phone");
})

$(".yuan_50").on("click",function(){
	close();
	show_prize(".phone");
})

$(".cup").on("click",function(){
	show_prize(".info");
})

$(".icebox").on("click",function(){
	show_prize(".info");
})

$(".washer").on("click",function(){
	show_prize(".info");
})

/*提交联系人信息*/
$(".sub_info").on("click",function(){
	var name = $("#name").val();
	var phone = $("#phone1").val();
	var addr = $("#addr").val();
	
	if (name == '') {
		alert('请输入姓名');
		return;
	}
	if(!(/^1[3|4|5|7|8|9][0-9]\d{4,8}$/.test(phone))) {
		alert('请输入手机号码');
		return;
	}
	if (addr == '') {
		alert('请输入地址');
		return;
	}

	$.get("lottery.php", {a:'addInfo',openid:openid, name:name, phone:phone, address:addr}, function(data) {
		close();
		alert("信息提交成功");
		mySwiper.swipeNext();
	}, 'json');
	
})

/*提交联系人电话*/
$(".sub_phone").on("click",function(){
	var phone = $("#phone2").val();
	
	if(!(/^1[3|4|5|7|8|9][0-9]\d{4,8}$/.test(phone))) {
		alert('请输入手机号码');
		return;
	}

	$.get("lottery.php", {a:'addPhone',openid:openid,phone:phone}, function(data) {
		close();
		alert("信息提交成功");
		mySwiper.swipeNext()
	}, 'json');
})













