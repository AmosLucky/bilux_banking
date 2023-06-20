
<?php

session_start();
include '../conn.php';
if(!isset($_SESSION['user'])){
   echo " <script>
        window.location.href='../login.php';
        </script>";

}
$bitcoin_address = "";
$etherum_address =  "";
$pendding_balance =  0.00;
$approved_balance = 0.00;
$total_withdrawn = 0.00;
$running_invest = 0.00;
$referral_balance = 0.00;
$profit = 0.00;
$blocked_reward = 0.00;
$is_suspended = false;
$msg_title = "";
$msg = "";
$is_compounded = false;
$compounded_duration = 0;

 $user_id = $_SESSION['id'];

        $id = $_SESSION['id'];
       $balance =  $_SESSION['balance'];
        $user = $_SESSION['user'];
        $email = $_SESSION['email'];
        $_SESSION['phonenumber'];
        $_SESSION['state'];
       $is_comounded;
        
        $firstname =  $_SESSION['firstname'];
          $_SESSION['referree'] ;

//////////////////NOTIFICATION AND MESSAGES//////////////////
          $notification_count = 0;   
$notifications = $model->selectFromTable("notifications","type='general'");
$notifications = $notifications['msg'];


//////////////////////MESSAGES////////////////////////
   $message_count = 0;   
$messages = $model->selectFromTable("notifications","type='personal' && user_id = $user_id");
$messages = $messages['msg'];

$mquery = "SELECT * from notifications where type='personal' && status = 'not-seen' &&  user_id = '$user_id'";
$mresult = mysqli_query($con,$mquery);
$message_count = mysqli_num_rows($mresult);


          //////////////////////////////////////

$sql = "SELECT * FROM members WHERE id =  '$user_id'";
    $result = mysqli_query($con,$sql) or die("Cant get balance ".mysqli_error($con));
    

    while ($row = mysqli_fetch_array($result)) {
      $balance = $row['balance'];
      $bitcoin_address = $row['bitcoin_wallet'];
      $etherum_address = $row['etherum_wallet'];
      $referral_balance = $row['referral_balance'];
      $pending_ref_balance = $row['pending_ref_balance'];
      $running_invest  = $row['running_invest'];
      $pendding_invest = $row['pendding_investment'];
      $pending_days = $row['pendding_days'];
      $num_of_days = $row['num_of_days'];
      $pending_profit = $row['pendding_profit'];
      $profit = $row['profit'];
      $completed_investment = $row['completed_investment'];
      $is_comounded = $row['isCompounded'];
      $blocked_reward = $row['blocked_balance'];
      $is_suspended = $row['is_suspended'];

      $firstname = $row['firstname'];
      $lastname = $row['lastname'];
      $email = $row['email'];
      $phone = $row['phonenumber'];
        $seen = $row['seen'];
        $msg_title = $row['msg_title'];
        $msg = $row['msg'];
         $is_compounded = $row['isCompounded']; 
        $compounded_duration = $row['compounded_period'];
      if(!$seen){
        $notification_count = 1;  



      }


      # code...
    }

    

    $pendding_balance = 0;

    $sql = "Select * from transactions where user_id = '$user_id' && status = 'pending'";
    $result = mysqli_query($con,$sql) or die("Cant get balance ".mysqli_error($con));
    while ($row = mysqli_fetch_array($result)) {
       $pendding_balance += floatval($row['amount']);
    }

    $sql = "Select * from transactions where user_id = '$user_id' && status = 'successful' && transaction_type = 'withdrawal'";

    $result = mysqli_query($con,$sql) or die("Cant get balance ".mysqli_error($con));
    while ($row = mysqli_fetch_array($result)) {
       $total_withdrawn += floatval($row['amount']);
    }


    ///////////////SELECT RUNNING INVESTMENT AND PROFIT////////////////////

   // $investment de
    
 

// for ($i=0; $i < count($notifications) ; $i++) { 
//  $seen_users = json_decode(unserialize($notifications[$i]['seen_users']));
//print_r($seen_users);
// if(in_array($user_id,$seen_users)){
//  //echo "true";
// }else{
//  //$notification_count++;

//  //echo "false";
// }


    // code...
//}

//die();

// print_r($notifications);
// die();
// echo $notifications["title"];
// die();

?>


<!DOCTYPE html>
<html lang="en">
    <head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard | tesabe </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/font-awesome/css/all.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <meta name="theme-color" content="#09BE8B">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.html">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/horizontal-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/logo-icon-color.png" />
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
</head>    <style>
        .popular-item {
    width: 264px;
    height: 96px;
    margin: 0 12px;
    margin-bottom: 24px;
    background: #f6f8fb;
    -webkit-border-radius: 16px;
    border-radius: 16px;
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -webkit-align-items: center;
    -ms-flex-align: center;
    align-items: center;
    padding: 16px;
}

.popular-item span {
    font-weight: 500;
    font-size: 18px;
    line-height: 24px;
    color: #07132e;
}
        
    </style>
  <body >
    

    <div class="container-scroller">
        
        <div class="horizontal-menu">
      <nav class="navbar top-navbar col-lg-12 col-12 p-0">
        <div class="container">
          <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
              <a class="navbar-brand brand-logo" href="index.php"><img src="../images/logo.png" alt="logo"/></a>
              <a class="navbar-brand brand-logo-mini" href="index.php"><img style="width: 100px; height: auto;" src="../images/logo.png"/></a>
          </div>
          <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            
            <ul class="navbar-nav navbar-nav-right">
              
              
              <li class="nav-item nav-profile dropdown">
                <a class="nav-link" href="#" data-toggle="dropdown" id="profileDropdown">
                    <ion-icon name="person-circle-outline"></ion-icon>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                  <a href="profile.php" class="dropdown-item">
                    <ion-icon name="settings-outline"></ion-icon>
                    Settings
                  </a>
                  <a href="?logout=1" class="dropdown-item">
                    <ion-icon name="log-in-outline"></ion-icon>
                    Logout
                  </a>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
              <span class="fa fa-bars"></span>
            </button>
          </div>
        </div>
      </nav>
      <nav class="bottom-navbar">
        <div class="container">
          <ul class="nav page-navigation">
            <li class="nav-item">
              <a class="nav-link" href="index.php">
                <ion-icon name="home-outline"></ion-icon>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="deposit.php">
                <ion-icon name="arrow-up-circle-outline"></ion-icon>
                <span class="menu-title">Fund wallet</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="invest.php">
                <ion-icon name="add-circle-outline"></ion-icon>
                <span class="menu-title">Invest</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="withdraw.php">
                <ion-icon name="arrow-down-circle-outline"></ion-icon>
                <span class="menu-title">Withdraw</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="transfer.php">
                <ion-icon name="swap-horizontal-outline"></ion-icon>
                <span class="menu-title">Transfer</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <ion-icon name="swap-horizontal-outline"></ion-icon>
                <span class="menu-title">Transactions</span>
                <i class="menu-arrow"></i></a>
              <div class="submenu">
                <ul class="submenu-item">
                <li class="nav-item"><a class="nav-link" href="transaction.php">All Transaction</a></li>
                <li class="nav-item"><a class="nav-link" href="transaction.php?d=1">Deposits</a></li>
                <li class="nav-item"><a class="nav-link" href="transaction.php?w=1">Withdrawals</a></li>
                <li class="nav-item"><a class="nav-link" href="transaction.php?t=1">Transfer</a></li>
                <li class="nav-item"><a class="nav-link" href="transaction.php?b=1">Bonuses</a></li>
                </ul>
              </div>
            </li>
            
            <li class="nav-item">
              <a href="#" class="nav-link">
                <ion-icon name="person-circle-outline"></ion-icon>
                <span class="menu-title">Account</span>
                <i class="menu-arrow"></i></a>
              <div class="submenu">
                <ul class="submenu-item">
                <li class="nav-item"><a class="nav-link" href="profile.php">My Profile</a></li>
                <li class="nav-item"><a class="nav-link" href="wallet.php">My Wallet</a></li>
                <li class="nav-item"><a class="nav-link" href="ref.php?w=1">My Referral</a></li>
                <li class="nav-item"><a class="nav-link" href="?logout=1">Sign Out</a></li>
                </ul>
              </div>
            </li>
          </ul>
        </div>
      </nav>
    </div>          <!-- particles -->
    <div id="particles-js"></div>
       <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        
        <div class="content-wrapper" style="padding-top: 0;">
          
    <div class="row py-3">
            
    <div class="col-sm-6 " style="width: 50%; padding-top: 0px; margin-top: -5px;">
                
            </div>
          </div>