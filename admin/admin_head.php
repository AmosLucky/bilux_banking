<?php

session_start();


if(!isset($_SESSION['admin'])){
   echo " <script>
        window.location.href='../login.php';
        </script>";

}
include '../conn.php';





?>
<!DOCTYPE html>
<html lang="en">

<head>

  <!--< meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="../img/logo1.png"> -->


  <title>Dashboard</title>
<!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
   <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
   <!-- Custom styles for this template-->
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!-- Custom styles for this page -->

<!-- richtext -->
<!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/site.css">
        <link rel="stylesheet" href="src/richtext.min.css">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="src/jquery.richtext.js"></script> -->

<!-- richtext -->
 
  <style type="text/css">
      .form{
     
       margin-bottom: 1rem; 
    }
  </style>
  <!-- Smartsupp Live Chat script -->
<!-- Smartsupp Live Chat script -->
<!-- Smartsupp Live Chat script -->

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">


    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient sidebar sidebar-dark accordion toggled" id="accordionSidebar" style="background-color: black">



<li class="nav-item active">
        <a class="nav-link" href="index.php">
         <!--  <i class="fa fa-user-circle" aria-hidden="true"></i> -->

          <!-- <span>Users</span></a> -->
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
         <!--  <i class="fa fa-user-circle" aria-hidden="true"></i> -->

          <span>Users</span></a>
      </li>

       <hr class="sidebar-divider my-0">

      
      <!-- Divider -->
      <hr class="sidebar-divider">
      <li class="nav-item ">
        <a class="nav-link" href="create_user.php">
         <!--  <i class="fa fa-users" aria-hidden="true"></i> -->

          <span>Create Users</span></a>
      </li>

      


      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      
      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="investors.php">
          <!-- <i class="fa fa-users" aria-hidden="true"></i> -->
          <span>Investors</span></a>
      </li>

      <hr class="sidebar-divider">
      <li class="nav-item ">
        <a class="nav-link" href="deposit_request.php">
        <!--   <i class="fa fa-users" aria-hidden="true"></i> -->

          <span>Deposit Request</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

       <!-- Nav Item - Tables -->
      <li class="nav-item ">
        <a class="nav-link" href="investment_request.php">
          <!-- <i class="fa fa-bell" aria-hidden="true"></i> -->
          <span>Investment Requests</span></a>
      </li>
       <hr class="sidebar-divider d-none d-md-block">


      <!-- Nav Item - Tables -->
      <li class="nav-item ">
        <a class="nav-link" href="withdrawal_requests.php">
       <!-- <i class="fa fa-credit-card" aria-hidden="true"></i> -->
          <span>Withdrawal Requests</span></a>
      </li>

      <li class="nav-item ">
        <a class="nav-link" href="penalised_users.php">
        <!--   <i class="fa fa-users" aria-hidden="true"></i> -->

          <span>Penalised user</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item ">
        <a class="nav-link" href="savetransaction.php">
       <!-- <i class="fa fa-credit-card" aria-hidden="true"></i> -->
          <span>Recent Transactions</span></a>
      </li>

       <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Nav Item - Tables -->
      <li class="nav-item ">
        <a class="nav-link" href="history.php">
      <!--  <i class="fa fa-envelope-o" aria-hidden="true"></i> -->
          <span>History</span></a>
      </li>
       <hr class="sidebar-divider d-none d-md-block">

      <li class="nav-item ">
        <a class="nav-link" href="bulk_email.php">
      <!--  <i class="fa fa-envelope-o" aria-hidden="true"></i> -->
          <span>Send Mail</span></a>
      </li>

      <li class="nav-item ">
        <a class="nav-link" href="add_vaulters_balance.php">
      <!--  <i class="fa fa-envelope-o" aria-hidden="true"></i> -->
          <span>Add total vaulters balance</span></a>
      </li>


      

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

           <li class="nav-item">
        <div class="dropdown dropright">
    <a type="button" class="nav-link " data-toggle="dropdown">
     <span>Notifications</span>
    </a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="notification.php">Send Notification</a>
            <a class="dropdown-item" href="all_notifications.php">All Notifications</a>
     
    </div>
  </div>
      </li>

       <hr class="sidebar-divider d-none d-md-block">

      <!-- Nav Item - Tables -->
     <!--  <li class="nav-item ">
        <a class="nav-link" href="bulk_email.php">
      
          <span>Bulk Email</span></a>
      </li> -->

      WEBSITE SETTINGS
       <hr class="sidebar-divider d-none d-md-block">
      

        <li class="nav-item">
        <div class="dropdown dropright">
    <a type="button" class="nav-link " data-toggle="dropdown">
     <span>Payment Medoth</span>
    </a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="add_payment_method.php">New Payment Method</a>
            <a class="dropdown-item" href="all_payment_method.php">All payment methods</a>
     
    </div>
  </div>
      </li>

       <hr class="sidebar-divider d-none d-md-block">




      <li class="nav-item">
        <div class="dropdown dropright">
    <a type="button" class="nav-link " data-toggle="dropdown">
      <span>Investment Plans</span>
    </a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="add_investment_plan.php">New Investment Plan</a>
            <a class="dropdown-item" href="investment_plans.php">All Investment Plan</a>
     
    </div>
  </div>
      </li>

       <!-- <hr class="sidebar-divider d-none d-md-block"> -->


       <li class="nav-item d-none d-none">
        <div class="dropdown dropright">
    <a type="button" class="nav-link " data-toggle="dropdown">
      <span>Blog</span>
    </a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="blog.php">New Blog Post</a>
            <a class="dropdown-item" href="all_post.php">All Blog Post</a>
     
    </div>
  </div>
      </li>

       <hr class="sidebar-divider d-none d-md-block">



      <li class="nav-item d-none">
        <div class="dropdown dropright">
    <a type="button" class="nav-link " data-toggle="dropdown">
      <span>Pages</span>
    </a>
    <div class="dropdown-menu">
      <a class="dropdown-item"  href="new_page.php">New Page</a>
            <a class="dropdown-item" href="all_pages.php">All Pages</a>

     
    </div>
  </div>
      </li>

       <hr class="sidebar-divider d-none d-md-block">



      <li class="nav-item d-none">
        <div class="dropdown dropright">
    <a type="button" class="nav-link " data-toggle="dropdown">
      <span>Testimony</span>
    </a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="new_testimony.php">New Testimony</a>
            <a class="dropdown-item" href="all_testimonies.php">All Testimony</a>

     
    </div>
  </div>
      </li>

       <hr class="sidebar-divider d-none d-md-block">

 <li class="nav-item d-none">
        <div class="dropdown dropright">
    <a type="button" class="nav-link " data-toggle="dropdown">
     <span>Team members</span>
    </a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="new_team.php">New Team Member</a>
            <a class="dropdown-item"  href="all_team.php">All Team Members</a>

     
    </div>
  </div>
      </li>

       <hr class="sidebar-divider d-none d-md-block">
       
     

 <li class="nav-item d-none">
        <div class="dropdown dropright">
    <a type="button" class="nav-link " data-toggle="dropdown">
     <span>Why Choose Us</span>
    </a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="new_why_choose_us.php">New Why Choose Us</a>
            <a class="dropdown-item"  href="all_why_choose_us.php">All Why Choose Us</a>

     
    </div>
  </div>
      </li>

       <hr class="sidebar-divider d-none d-md-block">
  

     
 <li class="nav-item d-none">
        <div class="dropdown dropright">
    <a type="button" class="nav-link " data-toggle="dropdown">
    <span>Slider</span>
    </a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="new_slider.php">New slider</a>
            <a class="dropdown-item"  href="all_sliders.php">All sliders</a>

     
    </div>
  </div>
      </li>
      <hr class="sidebar-divider d-none d-md-block">

      <li class="nav-item d-none">
        <div class="dropdown dropright">
    <a type="button" class="nav-link " data-toggle="dropdown">
    <span>Faq</span>
    </a>
    <div class="dropdown-menu d-none">
      <a class="dropdown-item" href="new_faq.php">New Faq</a>
            <a class="dropdown-item"  href="all_faq.php">All Faq</a>

     
    </div>
  </div>
      </li>

       <hr class="sidebar-divider d-none d-md-block">

        <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>


  

       <li class="nav-item active d-none">
        <a class="nav-link" href="website_settings.php">
     <!--   <i class="fas fa-globe"></i> -->
          <span>Website Settings</span></a>
      </li>

       <hr class="sidebar-divider d-none d-md-block">
      




      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light  topbar mb-4 static-top shadow" style="background-color: black">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Sidebar - Brand -->
    <!--  <div class="row">
      <div class="col">
         <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin_dashboard.php">
        <div class="sidebar-brand-icon ">
       <button class="btn-primary mx-3">Manage <br>users</button>
        </div>
        
      </a>
        
      </div>

       <div class="col">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin_dashboard.php">
        <div class="sidebar-brand-icon ">
       <button class="btn-primary">Manage page Settings</button>
        </div>
        
      </a>
         
       </div>
       
     </div> -->

          <!-- Topbar Search -->
         <!--  <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form> -->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown22" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <!-- <span class="badge badge-danger badge-counter">3+</span> -->
              </a>
              <!-- Dropdown - Alerts -->
         

            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown22" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
               <!--  <span class="badge badge-danger badge-counter">7</span> -->
              </a>
              <!-- Dropdown - Messages -->
             
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                <img class="img-profile rounded-circle" src="../dashboard/img/btc.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="account.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
               <!--  <a class="dropdown-item" href="account.php">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a> -->
                <!-- <a class="dropdown-item" href="#"> -->
                 <!--  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a> -->
               
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->