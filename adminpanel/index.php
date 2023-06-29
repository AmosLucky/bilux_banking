<?php
include 'header.php';
$msg = "";



// if(isset($_POST['suspend'])){

//   $id = $_POST['id'];
//   $reason = $_POST['suspend'];
//   $sql = "UPDATE members set is_suspended = '1', suspension_reason = '$reason' where id = '$id' ";
//   $result = mysqli_query($con,$sql);
//   if( $result){
//     $msg = '<div class="alert alert-success">Successfully suspended</div>';
//   }else{
//    $msg = '<div class="alert alert-danger">Failed</div>';

//   }
// }

//$sql = "SELECT * FROM company ";
$company_name = "";
$company_email = "";
$company_phone = "";
$company_address = "";
$domain =  "";
$com_id = 1;




if(isset($_POST['update'])){
   $company_name = $_POST['company_name'];
$company_email = $_POST['company_email'];
$company_phone = $_POST['company_phone'];
$company_address = $_POST['company_address'];
 //$company_eth_address =  $post['company_eth_address'];
 //$company_btc_address = $post['company_btc_address']; 
 $domain = $_POST['domain']; 
 $id = $_POST['id']; 
 $company_title = $_POST['company_title'];
   $company_contact_widget = mysqli_real_escape_string($con,$_POST['company_contact_widget']);

   if(strlen($company_contact_widget)>10){
                              $query = "UPDATE company set company_name = '$company_name',
                               company_email = '$company_email', 
                               company_phone = '$company_phone',
                               company_address = '$company_address',
                               domain = '$domain',
                               company_title = '$company_title',
                               company_contact_widget = '$company_contact_widget'
                                where id = '$id'";

                              }else{

                                $query = "UPDATE company set company_name = '$company_name',
                               company_email = '$company_email', 
                               company_phone = '$company_phone',
                               company_address = '$company_address',
                               domain = '$domain',
                               company_title = '$company_title'
                                where id = '$id'";

                              }

 

  $result =  mysqli_query($con,$query) or die(mysqli_error($con));
  if($result){
    $msg = '<div class="alert alert-success text-center">Sucessfully Saved</div>';

  } else{
    echo mysqli_error($con);
    $msg = '<div class="alert alert-danger text-center">Failed</div>';

  }                            

}


$sql = "SELECT * FROM company where id = '$com_id'";
$result =  mysqli_query($con,$sql) or mysqli_error($con);


while ($row = mysqli_fetch_array($result)) {


 $company_name = $row['company_name'];
$company_email = $row['company_email'];
$company_phone = $row['company_phone'];
$company_address = $row['company_address'];
 $company_eth_address =  $row['company_eth_address'];
 $company_btc_address = $row['company_btc_address']; 
 $domain = $row['domain']; 
  $id = $row['id']; 

   $company_title = $row['company_title'];
   $company_contact_widget = $row['company_contact_widget'];

    # code...
}

$sql = "SELECT * FROM members where id = '$admin_id'";
$result =  mysqli_query($con,$sql) or mysqli_error($con);
$admin_username = "";
$admin_passord = "";


while ($row = mysqli_fetch_array($result)) {
  $admin_username = $row['username'];
  $admin_passord = $row['password'];
}

//echo "<h1>_________________".$admin_passord."</h1>";


if(isset($_POST['update_password'])){
  $new_password = $_POST['new_password'];
  $c_new_password  = $_POST['c_new_password'];
  $current_password  = $_POST['password'];

  if(strlen($new_password) > 5){

  if($new_password == $c_new_password){
    if($admin_passord == $current_password){
      $sql = "UPDATE members set password = '$new_password' where id = '$admin_id'";
      $result =  mysqli_query($con,$sql) or mysqli_error($con);
      if($result){
        $admin_passord = $_POST['new_password'];
        $msg = '<div class="alert alert-success text-center"> Password successfully changed</div>';

      }else{
        $msg = '<div class="alert alert-danger text-center"> operation faild</div>';


      }


    }else{
      $msg = '<div class="alert alert-danger text-center"> Current password is incorrect</div>';

    }

  }else{

    $msg = '<div class="alert alert-danger text-center"> Password does not match confirmation</div>';

  }
}else{
  $msg = '<div class="alert alert-danger text-center"> Password must be greater than 5 charaters</div>';


}

}


/////////////SELECT ALL TRANSACTIONS/////
$all_users = 0;
$all_deposit = 0;
$all_withdrawal = 0;
$system_balance = 0;

$verified_deposit = 0;
$pending_deposit = 0;
$pending_withdrawal = 0;
$total_bonus = 0;


$sql = "SELECT * FROM transactions ";
$result =  mysqli_query($con,$sql) or mysqli_error($con);



while ($row = mysqli_fetch_array($result)) {
  $status = $row['status'];
  $amount = $row['amount'];
  $transaction_type = $row['transaction_type'];
  if($transaction_type == 'Withdrawal'){
    $all_withdrawal += $amount;
    if($status == "pending"){
      $pending_withdrawal += $amount;

    }else if($status == "approved"){
      //$pending_deposit += $amount;

    }

  }else if($transaction_type == 'Deposit'){
    $all_deposit += $amount;

    if($status == "pending"){
      $pending_deposit += $amount;

    }else if($status == "approved"){
      $verified_deposit += $amount;

    }


  }else if($transaction_type == 'Bonus'){
    $total_bonus += $amount;

  }
  
  // else if($status == 'Withdrawal'){

  // }

//   $sql = "SELECT * FROM requests ";
// $result =  mysqli_query($con,$sql) or mysqli_error($con);



// while ($row = mysqli_fetch_array($result)) {
//   $status = $row['status'];
//   $amount = $row['amount'];
//   $all_withdrawal += $amount;

//   if($status == "pending"){
//     $pending_withdrawal += $amount;
//   }

// }
  
}

/////////////SELECT ALL MEMEBERS/////


            
$sql_1 = "SELECT * from members";

$res = mysqli_query($con,$sql_1) or die("cant select members ".mysqli_error($con)); 

$system_balance = ($all_deposit - $all_withdrawal);


?>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="row">
        <div class="col-lg-6">
          <?php echo  $msg ?>
          <h1>Dashboard</h1>
          
        </div>
        
      </div>
    </div>
    
    <!-- Main content -->
    <div class="content">
    <div class="row">
        <div class="col-lg-3 col-sm-6 col-xs-12 m-b-3">
          <div class="card">
            <div class="card-body box-rounded box-gradient"> <span class="info-box-icon bg-transparent">
              <i class=" ti-user text-white"></i></span>
              <div class="info-box-content">
                <h6 class="info-box-text text-white">Total users</h6>
                <h1 class="text-white"><?php echo number_format(mysqli_num_rows($res)) ?></h1>
                <!-- <span class="progress-description text-white"> 70% Increase in 30 Days </span> -->
               </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-xs-12 m-b-3">
          <div class="card">
            <div class="card-body box-rounded box-gradient-4"> 
              <span class="info-box-icon bg-transparent"><i class="ti-money text-white"></i></span>
              <div class="info-box-content">
                <h6 class="info-box-text text-white">Total Deposit</h6>
                <h1 class="text-white">$<?php echo number_format(($all_deposit)) ?></h1>
                <!-- <span class="progress-description text-white"> 45% Increase in 30 Days </span>  -->
                </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-xs-12 m-b-3">
          <div class="card">
            <div class="card-body box-rounded box-gradient-2"> 
              <span class="info-box-icon bg-transparent"><i class=" ti-money text-white"></i></span>
              <div class="info-box-content">
                <h6 class="info-box-text text-white">Total widrawal</h6>
                <h1 class="text-white">$<?php echo number_format(($all_withdrawal)) ?></h1>
                <!-- <span class="progress-description text-white"> 65% Increase in 30 Days </span>  -->
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-xs-12 m-b-3">
          <div class="card">
            <div class="card-body box-rounded box-gradient-3"> <span class="info-box-icon bg-transparent"><i class="ti-money text-white"></i></span>
              <div class="info-box-content">
                <h6 class="info-box-text text-white">System balance</h6>
                <h1 class="text-white">$ <?php echo number_format(($system_balance)) ?></h1>
                <!-- <span class="progress-description text-white"> 45% Increase in 30 Days </span> -->
               </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->

      <div class="row d-none">
        <div class="col-md-12">
      <div class="card m-t-3">
      <div class="card-body">
      <h4 class="text-black">Data Table</h4>
      <p>Data Table With Full Features</p>
      <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                <thead>
                
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
                </thead>
                <tbody>
                
               
                  <td>Other browsers</td>
                  <td>All others</td>
                  <td>-</td>
                  <td>-</td>
                  <td>U</td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
                </tfoot>
              </table>
                  </div>
      </div></div>
      </div>

      </div>
     
      
     
      <!-- /.row -->
      <div class="row">
        <div class="col-lg-3 col-sm-6 col-xs-12 m-b-3">
          <div class="card">
            <div class="card-body box-rounded box-gradient"> <span class="ti-money bg-transparent">
              <i class=" ti-user text-white"></i></span>
              <div class="info-box-content">
                <h6 class="info-box-text text-white">Verified Deposits</h6>
                <h1 class="text-white"><?php echo number_format($verified_deposit)  ?></h1>
                <!-- <span class="progress-description text-white"> 70% Increase in 30 Days </span> -->
               </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-xs-12 m-b-3">
          <div class="card">
            <div class="card-body box-rounded box-gradient-4"> 
              <span class="info-box-icon bg-transparent"><i class="ti-money text-white"></i></span>
              <div class="info-box-content">
                <h6 class="info-box-text text-white">Pending Deposits</h6>
                <h1 class="text-white">$<?php echo number_format($pending_deposit)  ?></h1>
                <!-- <span class="progress-description text-white"> 45% Increase in 30 Days </span>  -->
                </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-xs-12 m-b-3">
          <div class="card">
            <div class="card-body box-rounded box-gradient-2"> 
              <span class="info-box-icon bg-transparent"><i class=" ti-money text-white"></i></span>
              <div class="info-box-content">
                <h6 class="info-box-text text-white">Pending withdrawals</h6>
                <h1 class="text-white">$<?php echo number_format($pending_withdrawal)  ?></h1>
                <!-- <span class="progress-description text-white"> 65% Increase in 30 Days </span>  -->
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-xs-12 m-b-3">
          <div class="card">
            <div class="card-body box-rounded box-gradient-3"> <span class="info-box-icon bg-transparent"><i class="ti-money text-white"></i></span>
              <div class="info-box-content">
                <h6 class="info-box-text text-white">Total Bonus</h6>
                <h1 class="text-white">$ <?php echo number_format($total_bonus)  ?></h1>
                <!-- <span class="progress-description text-white"> 45% Increase in 30 Days </span> -->
               </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->

      <div class="row">
                  <div class="col-xl-6">
                   <div class="card custom-card">
            <div class="card-header justify-content-between blue-head" style="background-color: blue !important; color: white !important;"> 
                        <div class="card-title"> UPDATE COMPANY INFORMATION </div>  
                  </div> 
                  <div class="card-body"> 
                     <form method="POST">
                <div class="form-group mb-3">
                  <div></div>
                 
                                
                            </div>
                            <input type="hidden" name="id" value="1">
                                       <div class="form-group mb-3">
                                <input class="form-control" name="id" id="fname" type="hidden" value="1">
                            </div>
                            <div class="form-group mb-3">
                              <label>Name</label>
               <input class="form-control" name="company_name" type="text" value="<?php echo $company_name ?>">
                              
                            </div>
                            <div class="form-group mb-3">
                              <label>Title</label>
               <input class="form-control" name="company_title" type="text" value="<?php echo $company_title ?>">
                              
                            </div>
                            <div class="form-group mb-3">
                              <label>Phone</label>
               <input class="form-control" name="company_phone" type="text" value="<?php echo $company_phone ?>">
                              
                            </div>
                             <div class="form-group mb-3">
                               <label>Email</label>
               <input class="form-control" name="company_email" type="text" value="<?php echo $company_email ?>">
                              
                            </div>
                             <div class="form-group mb-3">
                               <label>Address</label>
              <textarea class="form-control" name="company_address"><?php echo $company_address ?></textarea>
                              
                            </div>
                            <div class="form-group mb-3 d-none">
                               <label>Domain name</label>
              <input type="text" name="domain" value="<?php echo $domain ?>" class="form-control">
                              
                            </div>

                        <div class="form-group mb-3 d-none">
                               <label class="form-label fs-14 text-dark">chat widget (Change smartsupp or Tawk here )</label>
              <input type="text" style="height: 100px;" name="company_contact_widget" class="form-control">
                              
                            </div>
        


                            <!-- Input Field Ends -->
                            <!-- Input Field Starts -->
                            
                           



                         
                                        
                                     
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <button type="submit" name="update" class="btn btn-primary">Update Profile</button>
                                            <div id="msgSubmit" class="h3 hidden"></div> 
                                            <div class="clearfix"></div>
                                        </div>
                                      
                                    </form> 
                  
                 </div> 
                  </div> 
               </div>
               <!---Chnage login--->
                <div class="col-xl-6">
                   <div class="card custom-card">
            <div class="card-header justify-content-between blue-head" style="background-color: blue !important; color: white !important;"> 
                        <div class="card-title"> UPDATE COMPANY INFORMATION </div>  
                  </div> 
                  <div class="card-body"> 
                     <form method="POST">
                <div class="form-group mb-3">
                  <div></div>
                 
                                
                            </div>
                            <input type="hidden" name="id" value="1">
                                       <div class="form-group mb-3">
                                <input class="form-control" name="id" id="fname" type="hidden" value="1">
                            </div>
                           
                            <div class="form-group mb-3">
                              <label>Username</label>
               <input class="form-control" name="username"  type="text" value="<?php echo $admin_username ?>">
                              
                            </div>
                            <div class="form-group mb-3">
                              <label>Current Password</label>
               <input class="form-control"  name="password" type="password" value="">
                              
                            </div>
                             <div class="form-group mb-3">
                               <label>New password</label>
               <input class="form-control" name="new_password" type="password" value="">
                              
                            </div>
                          
                            <div class="form-group mb-3">
                               <label>Retype New Password</label>
              <input type="password" name="c_new_password" value="" class="form-control">
                              
                            </div>

                       


                            <!-- Input Field Ends -->
                            <!-- Input Field Starts -->
                            
                           



                         
                                        
                                     
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <button type="submit" name="update_password" class="btn btn-primary">Update Password</button>
                                            <div id="msgSubmit" class="h3 hidden"></div> 
                                            <div class="clearfix"></div>
                                        </div>
                                      
                                    </form> 
                  
                 </div> 
                  </div> 
               </div>


               <!---End of change login--->
                  
               </div>
      
      
      <!-- /.row --> 
    </div>
    <!-- /.content --> 
  </div>
  <?php

  require "footer.php";
  
  ?>

  
<script src="dist/plugins/datatables/jquery.dataTables.min.js"></script> 
<script src="dist/plugins/datatables/dataTables.bootstrap.min.js"></script> 
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

<script>
$("table").tableExport({formats: ["xlsx","xls", "csv", "txt"],    });
</script>
</body>

<!-- Mirrored from uxliner.net/xtreamer/demo/main/table-data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Jun 2023 17:12:13 GMT -->
</html>
