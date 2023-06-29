

<?php

session_start();


if(!isset($_SESSION['admin'])){
   echo " <script>
        window.location.href='./login.php';
        </script>";

}
include '../conn.php';

$admin_id =  $_SESSION['admin_id'];

$sql = "SELECT * FROM members where id = '$admin_id'";





?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from uxliner.net/xtreamer/demo/main/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Jun 2023 17:06:57 GMT -->
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
<body class="sidebar-mini">
<div class="wrapper boxed-wrapper">
  <header class="main-header"> 
    <!-- Logo --><a href="#" class="logo"> 
    <!-- mini logo for sidebar mini 50x50 pixels --> 
    <span class="logo-mini">Admin<img src="#" alt=""></span> 
    <!-- logo for regular state and mobile devices --> 
    <span class="logo-lg">Admin<img src="#" alt=""></span> </a> 
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top"> 
      <!-- Sidebar toggle button-->
      <ul class="nav navbar-nav pull-left">
        <li><a class="sidebar-toggle" data-toggle="push-menu" href="#"></a></li>
      </ul>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages -->
          <li class="dropdown messages-menu"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope-o"></i>
            <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Messages</li>
              <li>
                <ul class="menu">
                 
                </ul>
              </li>
              <li class="footer"><a href="#">View All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications  -->
          <li class="dropdown messages-menu"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell-o"></i>
            <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Notifications </li>
              <li>
                <ul class="menu">
                  
                   
                </ul>
              </li>
              <li class="footer"><a href="#">Check all Notifications</a></li>
            </ul>
          </li>
          <!-- languages  -->
         
          <!-- User Account  -->
          <li class="dropdown user user-menu p-ph-res"> 
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
              <img src="../img/logo.png" class="user-image" alt="User Image"> 
              <span class="hidden-xs">Admin</span> </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <div class="pull-left user-img">
                  <img src="../img/logo.png" class="img-responsive img-circle" alt="User"></div>
                <p class="text-left">Admin</p>
              </li>
        
              <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar"> 
    <!-- sidebar -->
    <div class="sidebar"> 
      <!-- sidebar menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="active"><a href="index.php"><i class="icon-screen-desktop"></i>
         <span>Dashboard</span>
          <!-- <span class="label label-pink pull-right">5</span> -->
        </a></li>
        <li class="header">Menue</li>
        <li class="treeview"><a href="#"><i class="icon-people"></i> 
        <span>Members</span>
         <span class="pull-right-container">
          <i class=" ti-plus"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="members.php?type=all">
              <i class="fa fa-angle-right"></i> All Accounts</a></li>
            <li><a href="members.php?type=active">
              <i class="fa fa-angle-right"></i> Active Accounts</a></li>
            <li><a href="members.php?type=deactive">
              <i class="fa fa-angle-right"></i> Deactive Accounts</a></li>
           
          </ul>
        </li>
        <li class="treeview"><a href="#"><i class=" icon-credit-card"></i> 
        <span>Deposits</span>
         <span class="pull-right-container">
          <i class=" ti-plus"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="deposits.php?type=all">
              <i class="fa fa-angle-right"></i> All Deposit</a></li>
            <li><a href="deposits.php?type=completed">
              <i class="fa fa-angle-right"></i> Approved Deposit</a></li>
            <li><a href="deposits.php?type=pending">
              <i class="fa fa-angle-right"></i> Pending Deposit</a></li>
           
          </ul>
        </li>
        <li class="treeview"><a href="#"><i class=" icon-credit-card"></i> 
        <span>Withdrawals</span>
         <span class="pull-right-container">
          <i class=" ti-plus"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="withdrawals.php?type=all">
              <i class="fa fa-angle-right"></i> All withdrawals</a></li>
            <li><a href="withdrawals.php?type=pending">
              <i class="fa fa-angle-right"></i> Active withdrawals</a></li>
            <li><a href="withdrawals.php?type=approved">
              <i class="fa fa-angle-right"></i> Completed withdrawals</a></li>
           
          </ul>
        </li>


        <li class="treeview"><a href="#"><i class=" icon-credit-card"></i> 
        <span>Transactions</span>
         <span class="pull-right-container">
          <i class=" ti-plus"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="transactions.php">
              <i class="fa fa-angle-right"></i> All Transaction</a></li>
            <!-- <li><a href="#">
              <i class="fa fa-angle-right"></i> Transactions</a></li>
            <li><a href="#">
              <i class="fa fa-angle-right"></i> Completed Transaction</a></li> -->
           
          </ul>
        </li>


        <li class="treeview"><a href="#"><i class=" icon-credit-card"></i> 
        <span>Settings</span>
         <span class="pull-right-container">
          <i class=" ti-plus"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="payment_methods.php">
              <i class="fa fa-angle-right"></i> All Payment method</a></li>
            <li><a href="add_payment_methods.php">
              <i class="fa fa-angle-right"></i> Add Paymenth method</a></li>
           <!--  <li><a href="#">
              <i class="fa fa-angle-right"></i> Completed Transaction</a></li> -->
           
          </ul>
        </li>
        <li class="treeview"><a href="#"><i class=" icon-credit-card"></i> 
        <span>Rewards</span>
         <span class="pull-right-container">
          <i class=" ti-plus"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="bonuses.php">
              <i class="fa fa-angle-right"></i> All Bonuses</a></li>
            <!-- <li><a href="#">
              <i class="fa fa-angle-right"></i> Transactions</a></li>
            <li><a href="#">
              <i class="fa fa-angle-right"></i> Completed Transaction</a></li> -->
           
          </ul>
        </li>

        <li class="treeview"><a href="#"><i class=" icon-credit-card"></i> 
        <span>Logout</span>
         <span class="pull-right-container">
          <i class=" ti-plus"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="logout.php">
              <i class="fa fa-angle-right"></i> Logout</a></li>
            <!-- <li><a href="#">
              <i class="fa fa-angle-right"></i> Transactions</a></li>
            <li><a href="#">
              <i class="fa fa-angle-right"></i> Completed Transaction</a></li>
            -->
          </ul>
        </li>
       
        
        
        
       
     
       
        
        </li>
      </ul>
    </div>
    <!-- /.sidebar --> 
  </aside>