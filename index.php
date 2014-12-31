<?php
include("./config.php");
include("./util.php");

$apiKey = @$_GET['apiKey'];
$openid = @$_GET['openid'];
$sig = @$_GET['sig'];
$timestamp = @$_GET['timestamp'];

if (!empty($openid)) {
	echo '<script>window.location.href="http://call.socialjia.com/Wxapp/weixin_common/oauth2.0/link.php?entid=37&url=http%3A%2F%2Fbluescfg.sinaapp.com%2FLoveSong"</script>';
	exit;
}

?>

<!doctype html>
<html lang="zh-cn" class="no-js">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta name="format-detection" content="telephone=no">
  <meta name="format-detection" content="email=no">
  <title>这是一首简单的小情歌</title>
  <link rel="stylesheet" href="./css/idangerous.swiper.css">
  <link rel="stylesheet" href="./css/index.css">
  <link rel="stylesheet" href="./css/animate.min.css">
  <link rel="stylesheet" href="./css/p0.css">
  <script>var openid='<?php echo $openid; ?>';</script>
	<script>
        window.onload = function(){
            var _loading = document.getElementById('loading');
            _loading.style.display = "none";
        };
        document.write('<div id="loading">Loading...</div>');
    </script>
    <style>
        #loading{ position: absolute; left:35%; top:45%; font-size:25px; color:#fff;}
        .swiper-container {display:none;}
    </style>  
</head>
<body>
  <div class="swiper-container">
    <div class="swiper-wrapper">
      <div class="swiper-slide slide1">
      	 <!-- <a class="liwu" href="javascript:void(0)"></a> -->
      	 <div class="notice-swipe-up swipeMove"></div>
      </div>
      <div class="swiper-slide slide2">
      	 <img id="ico-2" class="ico" src="./img/2-1.png">
      	 <img class="desc-2" src="./img/2-2.png">
      	  <div class="notice-swipe-up swipeMove"></div>
      </div>
      <div class="swiper-slide slide3">
         <img id="ico-3" class="ico" src="./img/3-1.png">
      	 <img class="desc-3" src="./img/3-2.png">
      	  <div class="notice-swipe-up swipeMove"></div>
      </div>
      <div class="swiper-slide slide4">
        <img id="ico-4" class="ico" src="./img/4-1.png">
      	<img class="desc-4" src="./img/4-2.png">
      	<div class="notice-swipe-up swipeMove"></div>
      </div>
      <div class="swiper-slide slide5">
        <img id="ico-5" class="ico" src="./img/5-1.png">
      	<img class="desc-5" src="./img/5-2.png">
      	<div class="notice-swipe-up swipeMove"></div>
      </div>
      <div class="swiper-slide slide6 swiper-no-swiping">
        <img id="ico-6" class="ico" src="./img/6-1.png">
      	<img class="desc-6" src="./img/6-2.png">
      	<a class="lp1" href="javascript:void(0)"></a>
      	<a class="lp2" href="javascript:void(0)"></a>
      	<a class="lp3" href="javascript:void(0)"></a>
      </div>
      
      <div class="swiper-slide slide7 swiper-no-swiping">
      	<a class="jump" href="http://m.rrs.com/mrrs/hd/unzip/index/141223/index.html"></a>
      	<img class="hand" src="./img/hand.png">
      </div>
     
    </div>
    
    <!-- 弹出提示分享 -->
  	<div class="screen-last">
  		<div class="share">
  			<img class="share_1" src="./img/7-2.png" width="23%">
  			<img class="share_2" src="./img/7-1.png" width="90%">
  		</div>
  	</div>
  	
  	<!-- 中奖展示页面 -->
  	<div class="prize">
  		<img class="yuan_10" src="./img/8-1.png" width="70%">
  		<img class="yuan_5" src="./img/8-2.png" width="70%">
  		<img class="yuan_50" src="./img/8-3.png" width="70%">
  		<img class="icebox" src="./img/8-4.png" width="70%">
  		<img class="washer " src="./img/8-5.png" width="70%">
  		<img class="cup" src="./img/8-6.png" width="70%">
  		
  		<!-- 联系人信息 -->
  		<div class="info">
  			<img src="./img/info.png" width="80%">
  			<div class="form">
				<ul>
					<li><input type="text" id="name" value="" placeholder="姓名"> </li>
					<li><input type="text" id="phone1" value="" placeholder="手机号"></li>
					<li><input type="text" id="addr" value="" placeholder="地址"></li>
				</ul>
				<a class="sub_info" ></a>
			</div>
  		</div>
  		<!-- 联系人电话 -->
  		<div class="phone">
  			<img src="./img/phone.png" width="80%">
  			<div class="form">
				<ul>
					<li><input type="text" id="phone2" value=""></li>
				</ul>
				<a class="sub_phone" ></a>
			</div>
  		</div>
  		
  	</div>
  	
	<!--未中奖展示页面 -->
  	<div class="noprize">
		 <img class="notice1" src="./img/notice1.png" width="70%">
		 <img class="notice2" src="./img/notice2.png" width="70%">
		 <img class="notice3" src="./img/notice3.png" width="70%">
		 <img class="notice4" src="./img/notice4.png" width="70%">
		 <img class="notice5" src="./img/notice5.png" width="70%">
  	</div>
  	
  <div class="pagination"></div>
  </div>
  
  <audio id="musicBox" loop="" preload="auto" autoplay="true" src="./sound/bg-sound.lite.mp3"></audio>
  
  <script src="./js/jquery-1.10.1.min.js"></script>
  <script src="./js/idangerous.swiper.min.js"></script>
  <script src="./js/WeixinApi.js"></script>
  <script src="./js/index.js"></script>
  <script>
  var mySwiper = new Swiper('.swiper-container',{
    pagination: '.pagination',
    paginationClickable: false,
    mode: 'vertical',
    speed:'500',
    noSwiping: true,
    swipeToPrev: true,
    onTouchEnd:function(){
		//alert(22);
        },
    onSlideNext:function(){
        //alert(33);
        },
    
  })
  </script>
</body>
</html>