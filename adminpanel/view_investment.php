<?php

require "header.php";

$msg = "";


// if(isset($_GET['d'])){
//   $id = $_GET['d'];
//   $sql = "DELETE FROM transactions where id = '$id'";
//   $result = mysqli_query($con,$sql);
//   if($result){
//     $msg = '<div class="alert alert-danger">Deleted successfuly</div>';
//   }
// }

if(isset($_POST['decline'])){
  $id = $_POST['id'];
  

  //$wallet = $_POST['wallet'];
  $user_id = $_POST['user_id'];
  ///$user_name = $_POST['username'];
  $amount = $_POST['amount'];

  $sql = "SELECT balance from members where id = '$user_id'";
    $result0 = mysqli_query($con,$sql) or die("Error ".mysqli_error($con));
    if($result0){

      while ($row = mysqli_fetch_array($result0)) {
     $balance = $row['balance'];
      # code...
    }
     $new_balance = $balance + $amount;
     $sql = "UPDATE members set balance = '$new_balance' where id = '$user_id'";
     $result = mysqli_query($con,$sql) or die("Error ".mysqli_error($con));

        if($result){


          $sql = "DELETE FROM transactions where id = '$id'";
  $result = mysqli_query($con,$sql);
  if($result){
    $msg = '<div class="alert alert-danger">Deleted successfuly</div>';
  }
          


        }

    }else{
      $msg = '<div class="alert alert-danger">User not found</div>';
    }

  

 
     

}




if(isset($_POST['approve'])){
    $user_id = $_POST['user_id'];
    $id = $_POST['id'];
     $amount = $_POST['amount'];
     $plan_name = $_POST['plan_name'];
    $plan_id = $_POST['plan_id'];
    $username = $_POST['username'];
    $roi = "";
  
    //$payment_name = $_POST['payment_name'];
    $referal_bonus=0;
    $invest_date = date(" D d M h:m");
    $model_result = $model->selectFromTable("investment_plans","id='$plan_id'");
    if($model_result['status']){
      $referal_bonus_percent = $model_result['msg'][0]['referal_bonus']/100;
      $referal_bonus = $referal_bonus_percent * $amount;
      $roi = $model_result['msg'][0]['profit'];
  
    }
  
  
  
      $sql = "SELECT * from transactions where id = '$id'";
      $result = mysqli_query($con,$sql) or die("Cant approve ".mysqli_error($con));
     if($result){
      while ($row = mysqli_fetch_array($result)) {
       // $amount = $row['amount'];
        $status = $row['status'];
        # code...
      }
      /////////////////////////////////////////////////////
  
      if($status == "pendding" || $status == "pending"){
  
        $sql = "insert into investments (
        user_id, 
        plan_id,
        plan_name,
        profit,
        amount,
        username,
        profit_running_hours,
        capital_running_hours
        )
          value(
          '$user_id',
          '$plan_id',
          '$plan_name',
          '0',
          '$amount',
          '$username',
          '0',
          '0'
        )";
    $result = mysqli_query($con,$sql) or die("Can not submit ".mysqli_error($con));
    if($result){
      $msg =  '<div class="alert alert-success text-center">Investment Started counting</div>';
  
    }else{
      $msg =  '<div class="alert alert-failed text-center">Investment Couldnt strart mysqli_error($con) </div>';
    }
  
    
  
      $sql = "SELECT running_invest,paid, username, referred_by,num_of_days,email from members where id = '$user_id'";
      $result = mysqli_query($con,$sql) or die("Cant approve ".mysqli_error($con));
     if($result){
      while ($row = mysqli_fetch_array($result)) {
        $running_invest = $row['running_invest'];
        $paid = $row['paid'];
        $referer = $row['referred_by'];
        $num_of_days = $row['num_of_days'];
        $email = $row['email'];
        $username = $row['username'];
        # code...
      }
  //////////////////////////////////////////////// when user has not paid //////////
      if($paid == false){
         $sql = "SELECT referral_balance, balance, id, username from members where username = '$referer'";
      $result1 = mysqli_query($con,$sql) or die("Cant approve ".mysqli_error($con));
     $num = mysqli_num_rows($result1);
     if($num==1){
      //////////////////////// updating payeee  to paid member
  
  
       $sql = "UPDATE members set  paid = true where id = '$user_id'";
      $result2 = mysqli_query($con,$sql) or die("Cant approve ".mysqli_error($con));
      
  
      if($result1){
  
        ///////////// get referrers details ///////////
      while ($row = mysqli_fetch_array($result1)) {
        $referral_balance = $row['referral_balance'];
        $referral_id = $row['id'];
        $user_name = $row['username'];
        # code...
      }
      //////////////// add to his referral amount /////////
      //$ten_percent = 0.1 * ($amount);
      $new_referral_balance = floatval($referral_balance) + $referal_bonus; 
      $sql = "UPDATE members set  referral_balance = '$new_referral_balance', balance = balance + '$referal_bonus' where id = '$referral_id'";
      $result3 = mysqli_query($con,$sql) or die("Cant approve ".mysqli_error($con));
      $invest_date = date("d m Y");
      $params = array("user_id"=>$referral_id,"user_name"=>$user_name,"status"=>"approved","amount"=>$referal_bonus,"transaction_type"=>"Referral bonus","description"=>"Referral bonus","wallet_type"=>"USDT","invest_date"=>$invest_date);
      $result = $model->insertIntoTable("transactions",$params);
      //echo $result['status'];
  
      }
  
     }
   }
   ///////////////////////ADDING  RUNNING INVESTMENT TO USER/////////////
   $new_running_invest = floatval($running_invest) + floatval($amount);
   $sql = "UPDATE members set  running_invest = '$new_running_invest' where id = '$user_id'";
      //////////////////////////////end //////////
     // $new_running_invest = floatval($running_invest) + floatval($amount);
  
     // if($num_of_days == 0){
     //   $sql = "UPDATE members set  running_invest = '$new_running_invest' where id = '$user_id'";
     // }else{
     //   $sql = "UPDATE members set  running_invest = '$new_running_invest' where id = '$user_id'";
     // }
  $result = mysqli_query($con,$sql) or die("Cant approve ".mysqli_error($con));
     if($result){
      $sql = "UPDATE transactions set status  = 'approved', amount = '$amount' where id = '$id'";
  $result = mysqli_query($con,$sql) or die("Cant approve ".mysqli_error($con));
     if($result){
      $msg =  '<div class="alert alert-success text-center">Successfully Approved</div>';
  
      
  
  
  
  
  
  ////////////USER EMAIL//////////////
  
  
  
  //////////////////////////////////////
       $subject = "Investment approved";
        $msg2 = "<!DOCTYPE html>
  <html>
  <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title></title>
    <style type='text/css'>
      body{
        margin: 20px;
      }
      .head{
        height: 50px;
        padding: 20px;
        background-color: #152238;
  
      }
      .body{
        padding: 20px;
        background-color: #F8F4E6;
      }
      .logo{
        height: 50px;
      }
      .footer{
        background-color: #152238;
        height: 100px;
        color: white;
        padding: 20px;
  
      }
      .block{
        margin-top: 5px;
      }
    </style>
  </head>
  <body>
    <div class='head'>
      $company_logo2
      
    </div>
    <div class='body'>
      
      
  
      <h2>
        Hello $username
  
      </h2>
  
      <h4>
        $company_name
      </h4>
  
      <p class='block'>
        
  <br>
      Your investment have been successfully approved , <br> you are
  currently mining in $plan_name with ROI of $roi %  .
  <br>
  <br>
  <br>
  Your belief in our vision and commitment to innovation is truly appreciated. 
  <br>
  With your investment, we can accelerate our efforts and take our business to new heights. 
  <br>
  Together, we will revolutionize the industry and make a lasting impact.
      </p>
  
      
    </div>
  
    <div class='footer'>
      <p>
        Support is available 24/7  <br>             
  Best Regards, $company_name the
  AU: + <br>
  $company_email
      </p>
      
    </div>
  
  </body>
  </html>
  ";
                 
                 require "../mail.php";
  
                 
  
  
  
  
  
  
  ///////////////////////////////////
  
  /////////////////////END OF EMAIL//////////////
  
  
    }
  
     }
  
  
  
  
              
           }else{
              $msg = '<div class="alert alert-danger text-center"> ERROR: TRANSACTION CANT BE Approved</div>';
           }
  
         
       }else{
              $msg = '<div class="alert alert-danger text-center"> TRANSACTION HAD BEEN ALREADY Approved</div>';
           }
  
     }else{
              $msg = '<div class="alert alert-danger text-center"> ERROR: TRANSACTION CANT BE Approved</div>';
           }
  
     }





















   
if(isset($_GET['t_id'])){
  
  $id = $_GET['t_id'];
  $sql = "SELECT * FROM transactions where id = '$id'";
  $user = "";
  $result = mysqli_query($con,$sql)  or die("Error getting transactions ".mysqli_error($con));


$sn = 0;
$num_row = mysqli_num_rows($result);
if($num_row == 0){
  return;


}
while ($row = mysqli_fetch_array($result)) {

# code...
$date = $row['invest_date'];
$amount = $row['amount'];
//$type = $row['transaction_type'];
$wallet = $row['wallet_type'];
$status =  $row['status'];
$user_id =  $row['user_id'];
$id = $row['id'];
$wallet_address = $row['address'];

$invest_date  = $row['invest_date'];
$id = $row['id'];
$user_id = $row['user_id'];
$transaction_type = $row['transaction_type'];
$plan_name = $row['plan_name'];
$plan_id = $row['plan_id'];
$payment_id = $row['payment_id'];
$payment_name = $row['payment_name'];

$sql1 = "SELECT username from members where id = '$user_id'";
$result1 = mysqli_query($con,$sql1)  or die("Error getting transactions ".mysqli_error($con));
while ( $row1 = mysqli_fetch_array($result1)) {
  $user = $row1['username'];
  # code...
}





}



}else{
  return;

}




?>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <?php echo $msg ?>
    
    
    <!-- Main content -->
    <div class="content">

    <div class="row">
                  <div class="col-xl-12">
                   <div class="card custom-card">
            <div class="card-header justify-content-between blue-head" style="background-color: blue !important; color: white !important;"> 
                        <div class="card-title"> Transaction Details </div>  
                  </div> 
                  <div class="card-body"> 
                  <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <tr>
                      <th>Username</th>
                      <td><?php echo $user ?></dt>
                      
                      
                    </tr>
                    <tr>
                    <th>Amount</th>
                      <td>$<?php echo number_format($amount) ?></dt>

                    </tr>
                    <tr>
                    <th>Time</th>
                      <td><?php echo $date ?></dt>
                    </tr>
                    <tr>
                    <th>Status</th>
                      <td><?php echo $status ?></dt>
                    </tr>
                    <tr>
                    <!-- <th>Wallet type</th>
                      <td><?php //echo $wallet ?></dt>
                    </tr>
                    <th>Wallet Address</th>
                      <td><?php //echo $wallet_address ?></dt>
                    </tr> -->
                  </table>
              </div>
              <?php if($status == "pending"){ ?>

                <form method="POST">
            <input type="hidden" name="amount" value="<?php echo $amount ?>" class="form-control mb-5">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
             <input type="hidden" name="username" value="<?php echo $username ?>">
              <input type="hidden" name="plan_name" value="<?php echo $plan_name ?>">
               <input type="hidden" name="plan_id" value="<?php echo $plan_id ?>">
               <input name="status"  type="hidden"  value="<?php echo $status ?>">
          <button class="btn btn-info" type="submit"  name="approve">Approve Investment </button>
          </form>

               
                <?php } ?>
                  
                 </div> 
                  </div> 
               </div>
</div>
      
     
    <!-- /.content --> 
  </div>
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
 