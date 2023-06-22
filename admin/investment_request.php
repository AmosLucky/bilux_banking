<?php
include 'admin_head.php';
$msg ="";
//$company_email = "support@rscryptoinvestment.com";

//echo $company_email;
//$id = $_GET['d'];

if(isset($_POST['delete'])){
 $user_id = $_POST['user_id'];
  $id = $_POST['id'];
  $amount = $_POST['amount'];
  $transaction_type = $_POST['transaction_type'];

  $sql = "DELETE FROM transactions where id = '$id'";
$result = mysqli_query($con,$sql) or die("Cant delete ".mysqli_error($con));
   if($result){

            $msg =  '<div class="alert alert-success text-center">SUCCESSFULLY DELETED</div>';

           if($transaction_type == "Reinvestment"){

             $sql = "UPDATE members set balance = balance + '$amount' where id = '$user_id'";
             $result = mysqli_query($con,$sql) or die("Cant delete ".mysqli_error($con));
            if($result){
              //////////////////////////////////////

              ////////////////////////////////////

            }


           }



         }else{
            $msg = '<div class="alert alert-danger text-center"> ERROR: TRANSACTION CANT BE DELETED</div>';
         }

}

if(isset($_POST['decline'])){
   $_POST['decline'];
  $id = $_POST['decline'];
   $sql = "UPDATE transactions set  status = 'declined' where id = '$id'";
   $result = mysqli_query($con,$sql) or die("Cant delete ".mysqli_error($con));
            if($result){
              //////////////////////////////////////
               $msg =  '<div class="alert alert-warning text-center">Successfully declined</div>';

              ////////////////////////////////////

            }else{
              $msg =  '<div class="alert alert-danger text-center">Failed to declined</div>';


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
    <img src='$company_logo2' class='logo'>
    
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
currently mining in $plan_name with ROI of $roi %  after 20days, <br> capital investment is withdrawn after 30days whereas to ROI is done after 20days.
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


?>






<div class="container-fluid" >
  

 
    <div class=" text-center"><b class="p-3"> <h5><?php  echo $msg; ?></b> </h5></div>
    
	  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Investment Request</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
   
      <tr>
        <th>S/N</th>
        <th>username</th>
        <th>payment method</th>
        <th>status </th>
        <th>amount</th>
        <th>investment date</th>
       
      </tr>
    </thead>
    <tfoot>
       <tr>
        <th>S/N</th>
        <th>username</th>
        <th>payment method</th>
        <th>status </th>
        <th>amount</th>
        <th>investment date</th>
       
      </tr>
    </tfoot>
    <tbody>
     <?php  

     $sql = "SELECT * from transactions  where status = 'pendding' || status = 'pending' and transaction_type = 'Investment' order by id desc";
      $sn = 1;
     $result = mysqli_query($con,$sql) or die("cant select transactions ".mysqli_error($con));
     while ($row = mysqli_fetch_array($result)) {
     	$username = $row['user_name'];
     	$wallet_type = $row['wallet_type'];
     	$status = $row['status'];
     	$amount =  $row['amount'];
     	$invest_date  = $row['invest_date'];
     	$id = $row['id'];
      $user_id = $row['user_id'];
      $transaction_type = $row['transaction_type'];
      $plan_name = $row['plan_name'];
      $plan_id = $row['plan_id'];
      $payment_id = $row['payment_id'];
      $payment_name = $row['payment_name'];
     	
    

     ?>

      <tr>
        <td><?php echo $sn++; ?></td>
        <td><?php echo $username; ?></td>
        <td><?php echo $wallet_type; ?></td>
         <td><?php echo $status; ?></td>
        <td><?php echo $amount; ?></td>
        <td><?php echo $invest_date; ?></td>
         
        <td> 
          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#approveModal<?php echo $id ?>"> 
            <i class="fa fa-check" aria-hidden="true"></i>
           </button>

         
            <!-- Modal -->
  <div class="modal fade" id="approveModal<?php  echo $id?>" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Approve?</h4>
        </div>
        <div class="modal-body">
          <p>You are about to approve this investment, Aproval Can't be reversed</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        <div class="modal-footer">
          <form method="POST">
            <input type="number" name="amount" value="<?php echo $amount ?>" class="form-control mb-5">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
             <input type="hidden" name="username" value="<?php echo $username ?>">
              <input type="hidden" name="plan_name" value="<?php echo $plan_name ?>">
               <input type="hidden" name="plan_id" value="<?php echo $plan_id ?>">
          <button class="btn btn-info" type="submit"  name="approve">Confirm  inestment</button>
          </form>
        </div>
      </div>
    </div>
  </div>

          




        </td>
        <td>
        	<button type="button" class="btn btn-danger " data-toggle="modal" data-target="#myModal<?php echo $id ?>"> 
            <i class="fa fa-trash" aria-hidden="true"></i>
           </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal<?php  echo $id?>" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">DELETE?</h4>
        </div>
        <div class="modal-body">
          <p>You are about to delete this Investment, Delete Can't be reversed</p>
        </div>
        <div class="modal-footer">
         
            
        
          <button type="button" name="delete" class="btn btn-default" data-dismiss="modal">Close</button>
           
        </div>
        <div class="modal-footer">
          <form method="POST">
             <input type="hidden" name="amount" value="<?php echo $amount ?>" >
             <input type="hidden" name="id" value="<?php echo $id ?>">
             <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
             <input type="hidden" name="transaction_type" value="<?php echo $transaction_type ?>">
            
            <button class="btn btn-danger" name="delete" type="submit">Confirm Delete Investment</button>

          </form>
        </div>
      </div>
    </div>
  </div>

        	

        	</td>
          <td>
            <form method="POST">

              <input type="hidden" name="decline" value="<?php echo $id ?>">
              <input type="submit"  class="btn btn-warning" value="Decline">
              
            </form>
          </td>
      </tr>




     <?php  }  ?>
     
    </tbody>
  </table>
</div>
</div>
</div>
</div>



<?php
include 'admin_footer2.php';


?>