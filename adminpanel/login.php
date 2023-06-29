<?php
session_start();

require '../conn.php';


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

                $error = '<div class="alert alert-danger text-center">
                No User found with this username and password
                </div>';
      //           $_SESSION['admin_id'] = $row['id'];
      //        $_SESSION['admin2'] =$row['username'];
      //         $id = $_SESSION['admin_id'];
      //           $_SESSION['admin2'];
        


      //     //insert into transaction


      //  echo " <script>
      //   window.location.href='super';
      //   </script>";



    }else if($isAdmin == 1){
          $_SESSION['admin_id'] = $row['id'];
             $_SESSION['admin'] =$row['username'];
              $id = $_SESSION['admin_id'];
                $_SESSION['admin'];
        


          //insert into transaction


       echo " <script>
        window.location.href='index.php';
        </script>";
    }else{
             
        //      $_SESSION['id'] = $row['id'];
        //      $_SESSION['user'] =$row['username'];
        //     // $_SESSION['balance'] =  $row['balance'];
        //       $_SESSION['email'] =$row['email'];
        //      $_SESSION['phonenumber'] =  $row['phonenumber'];
        //     $_SESSION['balance'] = $row['balance'];
        //      $_SESSION['state'] =$row['state'];
        //       $_SESSION['gender'] =$row['gender'];
        //        $is_comounded = $row['isCompounded'];
            
        //       $_SESSION['referree'] =  $row['referree'];
        //        $_SESSION['firstname'] =  $row['firstname'];
        //         $_SESSION['password'] =  $row['password'];
        //      $_SESSION['is_admin'] =  $row['is_admin'];
        //       $_SESSION['isCompounded'] =  $row['isCompounded'];
        // echo " <script>
        // window.location.href='user/';
        // </script>";
        $error = '<div class="alert alert-danger text-center">
        No User found with this username and password
        </div>';

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

if(isset($_GET['msg'])){
  $msg = $_GET['msg'];
  $error = '<div class="alert alert-primary text-center">
           Please login
            </div>';

}


?>




<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from uxliner.net/xtreamer/demo/main/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Jun 2023 17:12:43 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Admin</title>
<!-- Tell the browser to be responsive to screen width -->

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Xtreamer is a Multipurpose bootstrap 4 Based Dashboard & Admin Site Responsive Template by uxliner." />
<meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Xtreamer, Xtreameradmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
<meta name="author" content="uxliner"/>
<!-- v4.1.3 -->
<link rel="stylesheet" href="dist/bootstrap/css/bootstrap.min.css">

<!-- Favicon -->
<link rel="icon" type="image/png" sizes="16x16" href="dist/img/favicon-16x16.png">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

<!-- Theme style -->
<link rel="stylesheet" href="dist/css/style.css">
<link rel="stylesheet" href="dist/css/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="dist/css/et-line-font/et-line-font.css">
<link rel="stylesheet" href="dist/css/themify-icons/themify-icons.css">
<link rel="stylesheet" href="dist/css/simple-lineicon/simple-line-icons.css">
<link rel="stylesheet" href="dist/css/flag/css/flag-icon.css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body class="login-page">
<div class="login-box">
  <div class="login-box-body">
    <h3 class="login-box-msg">Sign In</h3>
    <?php echo $error ?>
   
    <form action="" method="post">
      <div class="form-group has-feedback ">
        <input type="text" name="email" class="form-control sty1" placeholder="Admin username">
      </div>
      <div class="form-group has-feedback mb-5">
        <input type="password" name="password" class="form-control sty1" placeholder="Password">
      </div>
      <div>
        <!-- <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox">
              Remember Me </label>
            <a href="pages-recover-password.html" class="pull-right"><i class="fa fa-lock"></i> Forgot pwd?</a> </div>
        </div> -->
        <!-- /.col -->
        <div class="col-xs-4 m-t-1 mb-5">
          <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col --> 
      </div>
    </form>
   
    <!-- /.social-auth-links -->
    
  </div>
  <!-- /.login-box-body --> 
</div>
<!-- ./wrapper -->

<!-- jQuery --> 
<script src="dist/js/jquery.min.js"></script> 
<script src="dist/bootstrap/js/popper.min.js"></script> 
<script src="dist/bootstrap/js/bootstrap.min.js"></script> 
<script src="dist/js/tempapp.js"></script>

<!-- Mirrored from uxliner.net/xtreamer/demo/main/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Jun 2023 17:12:43 GMT -->
</html>
