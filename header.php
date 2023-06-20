
<?php
require "conn.php";

?>
<!DOCTYPE html> <html> 
    
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <!-- Head -->
    <head> 


    <title>About Us | <?php echo $company_name ?></title> 
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link rel="apple-touch-icon" sizes="152x152" href="apple-touch-icon.html"> 
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.html"> 
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.html"> 
    <link rel="manifest" href="site.html"> 
    <link rel="mask-icon" href="safari-pinned-tab.html" color="#5bbad5"> 
    <meta name="msapplication-TileColor" content="#0f092e"> 
    <meta name="theme-color" content="#ffffff"> 
    <link rel="stylesheet" type="text/css" href="template/default/css/pages/bootstrap.min.css"> 
    <link rel="stylesheet" type="text/css" href="template/default/css/pages/index.css"> 
    <link rel="stylesheet" type="text/css" href="template/default/css/pages/animate.css"> 
    
   
    <script src="code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> 
    <script src="cdn.jsdelivr.net/npm/popper.js%401.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> 
    <script src="cdn.jsdelivr.net/npm/bootstrap%404.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script> 
    <script type="text/javascript" src="template/default/js/frontpage.js"></script> 
    <script type="text/javascript" src="template/default/js/menu.js"></script> 
    <script type="text/javascript" src="template/default/js/elements.js"></script> 
    <script type="text/javascript" src="template/default/js/calc.js"></script> 
    <script src='template/default/js/gt.js' async defer></script> 
    <script async defer>
    document.addEventListener('DOMContentLoaded', function(){

	    var handlerEmbed = function (captchaObj) {
	        $("#embed-submit").click(function (e) {
	            var validate = captchaObj.getValidate();
	            if (!validate) {
	                $("#notice")[0].className = "show";
	                setTimeout(function () {
	                    $("#notice")[0].className = "hide";
	                }, 2000);
	                e.preventDefault();
	            }
	        });
	        // 将验证码加到id为captcha的元素里，同时会有三个input的值：geetest_challenge, geetest_validate, geetest_seccode
	        captchaObj.appendTo("#embed-captcha");

	        captchaObj.onReady(function () {
	            $("#wait")[0].className = "hide";
	        });
	        window.captchaObj = captchaObj;
	    };
	    if($("div").is("#embed-captcha")){
		    $.ajax({
			    // 获取id，challenge，success（是否启用failback）
			    url: "/api/geetest/StartCaptchaServlet.php?t=" + (new Date()).getTime(), // 加随机数防止缓存
			    type: "get",
			    dataType: "json",
			    success: function (data) {
			        
			        // 使用initGeetest接口
			        // 参数1：配置参数
			        // 参数2：回调，回调的第一个参数验证码对象，之后可以使用它做appendTo之类的事件
			        initGeetest({
			            gt: data.gt,
			            challenge: data.challenge,
			            new_captcha: data.new_captcha,
			            lang: 'en',
			            product: "embed", // 产品形式，包括：float，embed，popup。注意只对PC版验证码有效
			            offline: !data.success // 表示用户后台检测极验服务器是否宕机，一般不需要关注
			        }, handlerEmbed);
			    }
			}); 
		}
	    // MODAL SECTION
		var handlerEmbedModal = function (captchaObj) {
	        // 将验证码加到id为captcha的元素里，同时会有三个input的值：geetest_challenge, geetest_validate, geetest_seccode
	        captchaObj.appendTo("#modal-embed-captcha");

	        captchaObj.onReady(function () {
	            // $("#wait")[0].className = "hide";
	        });
	    };

	    if($("div").is("#modal-embed-captcha")){
	    	$('#loginModalCenter').on('show.bs.modal', function (e) {
				$.ajax({
				    // 获取id，challenge，success（是否启用failback）
				    url: "/api/geetest/StartCaptchaServlet.php?t=" + (new Date()).getTime(), // 加随机数防止缓存
				    type: "get",
				    dataType: "json",
				    success: function (data) {
				        
				        // 使用initGeetest接口
				        // 参数1：配置参数
				        // 参数2：回调，回调的第一个参数验证码对象，之后可以使用它做appendTo之类的事件
				        initGeetest({
				            gt: data.gt,
				            challenge: data.challenge,
				            new_captcha: data.new_captcha,
				            lang: 'en',
				            product: "embed", // 产品形式，包括：float，embed，popup。注意只对PC版验证码有效
				            offline: !data.success // 表示用户后台检测极验服务器是否宕机，一般不需要关注
				        }, handlerEmbedModal);
				    }
				});
			})
	    	
	    }
	    // MODAL SECTION END

	})               
    </script> 
    <script src="template/default/js/form_validators_min.js"></script> 
<style>
            
            * {
  box-sizing: border-box;
}

#google_translate_element {
  z-index: 9999999;
  position: fixed;
  bottom: 25px;
  left: 15px;
}

.goog-te-gadget {
  font-family: Roboto, "Open Sans", sans-serif !important;
  text-transform: uppercase;
}

.goog-te-gadget-simple {
  background-color: rgba(0, 0, 0, 0.5) !important;
  border: 1px solid rgba(255, 255, 255, 0.5) !important;
  padding: 3px !important;
  border-radius: 4px !important;
  font-size: 0.8rem !important;
  line-height: 2rem !important;
  display: inline-block;
  cursor: pointer;
  zoom: 1;
  margin-bottom: 4px;
}

.goog-te-menu2 {
  max-width: 100%;
}

.goog-te-menu-value {
  color: #fff !important;
}
.goog-te-menu-value:before {
  font-family: 'Material Icons';
  content: "\E927";
  margin-right: 16px;
  font-size: 2rem;
  vertical-align: -10px;
}

.goog-te-menu-value span:nth-child(5) {
  display: none;
}

.goog-te-menu-value span:nth-child(3) {
  border: none !important;
  font-family: 'Material Icons';
}
.goog-te-menu-value span:nth-child(3):after {
  font-family: 'Material Icons';
  content: "\E5C5";
  font-size: 1.5rem;
  vertical-align: -6px;
}

.goog-te-gadget-icon {
  background-position: 0px 0px;
  height: 32px !important;
  width: 32px !important;
  margin-right: 8px !important;
  display: none;
}

.goog-te-banner-frame.skiptranslate {
  display: none !important;
}


body {
  top: 0px !important;
}

/* ================================== *\
    Mediaqueries
\* ================================== */
@media (max-width: 667px) {
  #google_translate_element {
  }
  #google_translate_element goog-te-gadget {
  }
  #google_translate_element .skiptranslate {
  }
  #google_translate_element .goog-te-gadget-simple {
    text-align: center;
  }
}
        </style>
</head>

    <!-- Head -->
 
<body class="page d-flex flex-column h-100"> 
    <main role="main" class="flex-shrink-0"> 
        <div class="container"> 
             
            <!-- Head -->
            <header> 
                <div class="navigation"> 
                    <a href="index.php" class="logo"> <img src="img/logo.png" alt=""> </a> 
                    <!--<div class="dropdown show languages"> 
                        <a class="dropdown-toggle languages__toggle languages__toggle_en" href="#" role="button" id="dropdownMenuLinkMob" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            
	English															</a> 
                        <div class="dropdown-menu languages__menu" aria-labelledby="dropdownMenuLink"> 
                            <div class="row"> 
                                <div class="col-md-6"> 
                                    <a class="languages__item languages__item_en languages__item_active" href="terms.html">English</a> 
                                    <a class="languages__item languages__item_es " href="terms.html">Español</a> 
                                    <a class="languages__item languages__item_fr " href="terms.html">Français</a> 
                                    <a class="languages__item languages__item_ar " href="terms.html">اللغة العربية</a> 
                                    <a class="languages__item languages__item_disabled languages__item_de " href="terms.html">Deutsch</a> 
                                    <a class="languages__item languages__item_disabled languages__item_vn " href="#">Tiếng Việt</a> 
                                    <a class="languages__item languages__item_disabled languages__item_ru " href="terms.html">Русский</a> 
                                    <a class="languages__item languages__item_disabled languages__item_cn " href="terms.html">中国人</a> 
                                </div> <div class="col-md-6"> 
                                    <a class="languages__item languages__item_disabled languages__item_pt " href="#">Português</a> 
                                    <a class="languages__item languages__item_disabled languages__item_ko" href="#">한국어, 조선말</a> 
                                    <a class="languages__item languages__item_disabled languages__item_ja" href="#">日本語</a> 
                                    <a class="languages__item languages__item_disabled languages__item_tr" href="#">Türkçe</a> 
                                    <a class="languages__item languages__item_disabled languages__item_pl" href="#">Polski</a> 
                                    <a class="languages__item languages__item_disabled languages__item_it" href="#">Italiano</a> 
                                    <a class="languages__item languages__item_disabled languages__item_hi" href="#">Hindi</a> 
                                    <a class="languages__item languages__item_disabled languages__item_th" href="#">ภาษาไทย</a> 
                                </div> </div> </div> </div> -->
                                <ul class="menu"> 
                                   <li class="menu__item menu__item_block"> <a href="about.html">About Us</a> </li> 
                                   <li class="menu__item menu__item_block"> <a href="service.php">Our Services</a> </li> 
                                                 <li class="menu__item menu__item_block"> <a href="legal.php">Legal Information</a> </li> 
                                                <li class="menu__item menu__item_block"> <a href="tutorial.html">User guides</a> </li> 
                                                <li class="menu__item menu__item_block"> <a href="contact.html">Help Center</a> </li> 
                                                <li class="menu__item menu__item_block"> <a href="terms.html">Terms of Use</a> </li> 
                                </ul> </div> <div class="navigation-mobile"> 
                                    <div class="navigation-mobile__row"> 
                                        <a href="index.php" class="logo navigation-mobile_logo"> 
                                            <img src="img/logo.png" alt=""> 
                                        </a> 
                                       <!-- <div class="dropdown languages languages_bottom"> 
                                            <a class="dropdown-toggle languages__toggle languages__toggle_en" href="#" role="button" id="dropdownMenuLinkMob" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">English</a>
                                            <div class="dropdown-menu languages__menu" aria-labelledby="dropdownMenuLink"> 
                                                <div class="row"> 
                                                    <div class="col-md-6"> 
                                                        <a class="languages__item languages__item_en languages__item_active" href="terms.html">English</a> 
                                                        <a class="languages__item languages__item_es " href="terms.html">Español</a> 
                                                        <a class="languages__item languages__item_fr " href="terms.html">Français</a> 
                                                        <a class="languages__item languages__item_ar " href="terms.html">اللغة العربية</a> 
                                                        <a class="languages__item languages__item_disabled languages__item_de " href="terms.html">Deutsch</a> 
                                                        <a class="languages__item languages__item_disabled languages__item_vn " href="#">Tiếng Việt</a> 
                                                        <a class="languages__item languages__item_disabled languages__item_ru " href="terms.html">Русский</a> 
                                                        <a class="languages__item languages__item_disabled languages__item_cn " href="terms.html">中国人</a> 
                                                    </div> 
                                                    <div class="col-md-6"> 
                                                        <a class="languages__item languages__item_disabled languages__item_pt " href="#">Português</a> 
                                                        <a class="languages__item languages__item_disabled languages__item_ko" href="#">한국어, 조선말</a> 
                                                        <a class="languages__item languages__item_disabled languages__item_ja" href="#">日本語</a> 
                                                        <a class="languages__item languages__item_disabled languages__item_tr" href="#">Türkçe</a> 
                                                        <a class="languages__item languages__item_disabled languages__item_pl" href="#">Polski</a> 
                                                        <a class="languages__item languages__item_disabled languages__item_it" href="#">Italiano</a> 
                                                        <a class="languages__item languages__item_disabled languages__item_hi" href="#">Hindi</a> 
                                                        <a class="languages__item languages__item_disabled languages__item_th" href="#">ภาษาไทย</a> 
                                                    </div> 
                                                </div> 
                                            </div> 
                                        </div> -->
                                        <div class="navigation-mobile__icon"> </div> 
                                    </div> 
                                    <div class="navigation-mobile__links"> 
                                        <div> 
                                            <a href="index.php" class="logo "> <img src="img/logo.png" alt=""> </a> 
                                            <ul class="menu auth"> 
                                                 <li class="menu__item menu__item_block"> <a href="about.html">About Us</a> </li> 
                                                 <li class="menu__item menu__item_block"> <a href="service.php">Our Service</a> </li> 
                                                 <li class="menu__item menu__item_block"> <a href="legal.php">Legal Information</a> </li> 
                                                <!--<li class="menu__item menu__item_block"> <a href="tutorial.php">User guides</a> </li> -->
                                                <li class="menu__item menu__item_block"> <a href="contact.html">Help Center</a> </li> 
                                                <li class="menu__item menu__item_block"> <a href="terms.html">Terms of Use</a> </li> 
                                                <li class="menu__item auth__item_login menu__item_block"> 
                                                    <a href="login.html"> <span class="auth__arrow"> 
                                                            <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg"> 
                                                            <path d="M10.6087 3.82765H0.521739C0.233738 3.82765 0 3.59391 0 3.30591C0 3.01791 0.233738 2.78418 0.521739 2.78418H10.6087C10.8967 2.78418 11.1304 3.01791 11.1304 3.30591C11.1304 3.59391 10.8967 3.82765 10.6087 3.82765Z" fill="#FFE145" /> <path d="M7.8263 6.60987C7.69268 6.60987 7.55919 6.55917 7.45754 6.45697C7.25374 6.25307 7.25374 5.92267 7.45754 5.71877L9.87147 3.30496L7.45754 0.891018C7.25374 0.687208 7.25374 0.356658 7.45754 0.152858C7.66147 -0.0509525 7.99189 -0.0509525 8.19569 0.152858L10.9783 2.93556C11.1821 3.13936 11.1821 3.46978 10.9783 3.67359L8.19569 6.45617C8.09341 6.55917 7.95992 6.60987 7.8263 6.60987Z" fill="#FFE145" /> </svg> </span>
							Login
						</a> 
                                                </li> 
                                                <li class="menu__item auth__item_register menu__item_block"> 
                                                    <a href="signup.html"> <span class="auth__check"> <svg class="animated-check" viewBox="0 0 24 24"> <path d="M4.1 12.7L9 17.6 20.3 6.3" fill="none" /> </svg> </span>
							Registration
						</a> 
                                                </li> 
                                            </ul> 
                                        </div> 
                                        <div> 
                                            <div class="copyrights navigation-mobile__copyrights"> 
                                               <div class="copyrights__item navigation-mobile__item"> 2015-2023 All Rights Reserved.</div> 
                                        </div> 
                                    </div> 
                                </div> 
         
        <ul class="auth"> 
            <li class="auth__item auth__item_login"> 
                <a href="login.html"> <span class="auth__arrow"> <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M10.6087 3.82765H0.521739C0.233738 3.82765 0 3.59391 0 3.30591C0 3.01791 0.233738 2.78418 0.521739 2.78418H10.6087C10.8967 2.78418 11.1304 3.01791 11.1304 3.30591C11.1304 3.59391 10.8967 3.82765 10.6087 3.82765Z" fill="#FFE145" /> <path d="M7.8263 6.60987C7.69268 6.60987 7.55919 6.55917 7.45754 6.45697C7.25374 6.25307 7.25374 5.92267 7.45754 5.71877L9.87147 3.30496L7.45754 0.891018C7.25374 0.687208 7.25374 0.356658 7.45754 0.152858C7.66147 -0.0509525 7.99189 -0.0509525 8.19569 0.152858L10.9783 2.93556C11.1821 3.13936 11.1821 3.46978 10.9783 3.67359L8.19569 6.45617C8.09341 6.55917 7.95992 6.60987 7.8263 6.60987Z" fill="#FFE145" /> </svg> </span>
						Login
					</a> 
            </li> 
            <li class="auth__item auth__item_register"> 
                <a href="signup.html"> <span class="auth__check"> <svg class="animated-check" viewBox="0 0 24 24"> <path d="M4.1 12.7L9 17.6 20.3 6.3" fill="none" /> </svg> </span>
						Registration
					</a> </li> 
        </ul> 
        
    </header>            <!-- Head -->