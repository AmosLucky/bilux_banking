<?php
session_start();

require 'conn.php';


$error = "";



// if(isset( $_SESSION['user'])){

//         echo " <script>
//         window.location.href='dashboard/index.php';
//         </script>";
//         }




        if(isset($_POST['login'])){

    $username = $_POST['email'];
    $password = $_POST['password'];

    $usernamev = mysqli_real_escape_string($con,$username);
    $passwordv = mysqli_real_escape_string($con,$password);

    $sql = "select * from members where email = '$usernamev'  && password = '$passwordv' || username = '$usernamev'  && password = '$passwordv' ";
    $result = mysqli_query($con,$sql) or die("cant select ".mysqli_error($con));
    $checkuser = mysqli_num_rows($result);
    if($checkuser == 1){
        while ($row = mysqli_fetch_array($result)) {
            $id = $row['id'];
            $isAdmin = $row['is_admin'];
             $is_suspended = $row['is_suspended'];
              $suspension_reason = $row['suspension_reason'];
               $is_deleted = $row['deleted'];

           if($is_deleted){
              $error = '<div class="alert alert-danger text-center">
              No User found with this username and password
              </div>';

           }else{
            /////////////////////////////NORMAL LOGIN//////////

              if($isAdmin == 2){
                $_SESSION['admin_id'] = $row['id'];
             $_SESSION['admin2'] =$row['username'];
              $id = $_SESSION['admin_id'];
                $_SESSION['admin2'];
        


          //insert into transaction


       echo " <script>
        window.location.href='super';
        </script>";



    }else if($isAdmin == 1){
          $_SESSION['admin_id'] = $row['id'];
             $_SESSION['admin'] =$row['username'];
              $id = $_SESSION['admin_id'];
                $_SESSION['admin'];
        


          //insert into transaction


       echo " <script>
        window.location.href='admin';
        </script>";
    }else{
             
             $_SESSION['id'] = $row['id'];
             $_SESSION['user'] =$row['username'];
            // $_SESSION['balance'] =  $row['balance'];
              $_SESSION['email'] =$row['email'];
             $_SESSION['phonenumber'] =  $row['phonenumber'];
            $_SESSION['balance'] = $row['balance'];
             $_SESSION['state'] =$row['state'];
              $_SESSION['gender'] =$row['gender'];
               $is_comounded = $row['isCompounded'];
            
              $_SESSION['referree'] =  $row['referree'];
               $_SESSION['firstname'] =  $row['firstname'];
                $_SESSION['password'] =  $row['password'];
             $_SESSION['is_admin'] =  $row['is_admin'];
              $_SESSION['isCompounded'] =  $row['isCompounded'];
        echo " <script>
        window.location.href='user/';
        </script>";

    }
           }
            
        }

        // $id = $_SESSION['id'];
        // $_SESSION['balance'];
        // $user = $_SESSION['user'];
        // $_SESSION['email'];
        // $_SESSION['phonenumber'];
        // $_SESSION['state'];
        
        //   $_SESSION['firstname'];
        //   $_SESSION['referree'] ;
        //   $isAdmin = $_SESSION['is_admin'];


          //insert into transaction
         


       



        

    }
    //user more than two
    else{

        $error = '<div class="alert alert-danger text-center">We cant find your account please check your username or password</div>';

    }


}


// if(isset($_POST['login'])){
//   $login_name = $_POST['username'];
//   $login_psw = $_POST['password'];
// }
// else if(isset($_POST['signup'])){
//   $fname = $_POST['fname'];
//   $lname = $_POST['lname'];
//   $email = $_POST['email'];
//   $uname = $_POST['uname'];
//   $pass = $_POST['psw'];
//   $phone = $_POST['phone'];
// }

?>



<!DOCTYPE html> <html class="h-100" lang="en"> 

<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head> <base  /> 
    <title>Login</title> 
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link rel="apple-touch-icon" sizes="76x76" href="apple-touch-icon.html">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.html"> 
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.html"> 
    <link rel="manifest" href="site.html"> 
    <link rel="mask-icon" href="safari-pinned-tab.html" color="#5bbad5"> 
    <meta name="msapplication-TileColor" content="#da532c"> 
    <meta name="theme-color" content="#ffffff"> 
    <link rel="stylesheet" type="text/css" href="template/default/css/pages/bootstrap.min.css"> 
    <link rel="stylesheet" type="text/css" href="template/default/css/pages/index-auth.css"> 
    <link rel="stylesheet" type="text/css" href="template/default/css/pages/animate.css"> 
    <script src="code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> 
    <script src="cdn.jsdelivr.net/npm/popper.js%401.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> 
    <script src="cdn.jsdelivr.net/npm/bootstrap%404.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script> 
    <script type="text/javascript" src="template/default/js/auth.js"></script> 
    <script type="text/javascript" src="template/default/js/elements.js"></script> 
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
</head> 
<body class="page d-flex flex-column h-100 auth-wrap"> 
    <main role="main" class="flex-shrink-0 main_auth"> 
        <div class="container signin-page"> 
            <div class="row"> <div class="col-xl-6"> 
                    <div class="auth-container"> 
                        <header> 
                            <div class="navigation"> 
                                <a href="index.php" class="logo"> 
                                    <img src="img/logo.png" alt="Liquidity"> 
                                </a> </div> 
                        </header> 
                        <div class="auth-content"> 
                            <div class="auth-content__title auth-content__title_form">Login</div> 
<form action="" method="post" class="form validator auth_form"> 
                        <div class="notifications"> </div> 
                                <div class="field"> 
                                	<?php echo $error ?>
                                    <label class="field__label field__label_login">Username</label> 
                                    <input class="field__input" type="text" name="email" value="" required> 
                                </div> 
                                <div class="field"> 
                                    <label class="field__label field__label_password">Password</label> 
                                    <div class="field__wrap"> 
                                        <input class="field__input" type="password" name="password" value="" required> 
                                        <a href="#" class="field__showpass"></a> 
                                    </div> 
                                </div> 
                                <div class="buttons-row"> 
                                    <button type="submit" name="login" class="auth-content__button auth-content__button_md">Login</button> 
                                    <a class="resend-link underlined-link" href="signup">
                                        <span class="underlined-link__wrap">Registration</span></a>  
                                </div> 
                            </form> 
                        </div> 
                        <footer class="footer footer-auth"> 
                            <ul class="auth-navigation"> 
                                <li class="auth-navigation__item">
                                    <a class="auth-navigation__link" href="index">Home</a>
                                </li> 
                                <li class="auth-navigation__item">
                                    <a class="auth-navigation__link" href="#">User guides</a>
                                </li> 
                                <li class="auth-navigation__item">
                                    <a class="auth-navigation__link" href="contact">Help Center</a>
                                </li> 
                            </ul> 
                        </footer> 
                    </div> 
                </div>  
            </div> 
        </div> 
    </main> 
    <footer class="footer footer-auth footer-auth-mobile"> 
        <ul class="auth-navigation"> 
            <li class="auth-navigation__item"><a class="auth-navigation__link" href="index">Home</a></li> 
            <li class="auth-navigation__item"><a class="auth-navigation__link" href="tutorial">User guides</a>
            </li> <li class="auth-navigation__item">
                <a class="auth-navigation__link" href="contact">Help Center</a>
            </li> 
        </ul> 
    </footer> 
    <div class="notifications"> 
        <div class="notifications__item notifications__item_success" style="display: none;"> 
            <div class="notifications__icon notifications__icon_success"></div> 
            <div class="notifications__text"></div> 
            <button class="notifications__close close"> <span></span> </button> 
        </div> 
        <div class="notifications__item notifications__item_error" style="display: none;"> 
            <div class="notifications__icon notifications__icon_error"></div> 
            <div class="notifications__text"></div> 
            <button class="notifications__close close"> <span></span> </button> 
        </div> 
    </div> 
    
</body> 

</html>