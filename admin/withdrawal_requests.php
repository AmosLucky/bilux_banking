<?php
include 'admin_head.php';

if(isset($_POST['decline'])){
  $id = $_POST['id'];
  

  $wallet = $_POST['wallet'];
  $user_id = $_POST['user_id'];
  $user_name = $_POST['username'];
  $amount = $_POST['amount'];

  $sql = "SELECT balance from members where id = '$user_id'";
    $result = mysqli_query($con,$sql) or die("Error ".mysqli_error($con));
    if($result){

      while ($row = mysqli_fetch_array($result)) {
     $balance = $row['balance'];
      # code...
    }
     $new_balance = $balance + $amount;
     $sql = "UPDATE members set balance = '$new_balance' where id = '$user_id'";
     $result = mysqli_query($con,$sql) or die("Error ".mysqli_error($con));

        if($result){


           $sql = "UPDATE requests SET status = 'declined' where id ='$id'";

      $result = mysqli_query($con,$sql) or die("Error ".mysqli_error($con));
      if($result){
         $msg = '<div class="alert alert-success text-center"> you declined this request</div>';
       

       

      }
          


        }

    }

  

 
     

}



if(isset($_POST['approve'])){
  $id = $_POST['id'];
  $approved_date = date(" D d M h:m");
  $wallet = $_POST['wallet'];
  $user_id = $_POST['user_id'];
  $user_name = $_POST['username'];
  $amount = $_POST['amount'];
  $status = $_POST['status'];
  // $status;
  $code = $_POST['code'];
  if($status != "approved" || $status != "successful"){


      $sql = "UPDATE requests SET status = 'approved' where id ='$id'";

      $result = mysqli_query($con,$sql) or die("Error ".mysqli_error($con));
      if($result){
        //////////////////////////////////

         $sql = "insert into transactions (user_id, user_name, amount,wallet_type,status,invest_date,transaction_type)
        value(
        '$user_id',
        '$user_name',
        '$amount',
        '$wallet',
        'successful',
        '$approved_date',
        'withdrawal'

      )";
  $result = mysqli_query($con,$sql) or die("Can not submit ".mysqli_error($con));
  if( $result){
    $msg = '<div class="alert alert-success text-center"> SUCCESSFULLY APPROVED</div>';
    $email = "";
    //user    100  
  $sql = "SELECT email from members where id = '$user_id'";
  $result = mysqli_query($con,$sql) or die("Can not select email ".mysqli_error($con));
  while ($row = mysqli_fetch_array($result)) {
     $email = $row['email'];
    # code...
  }





     //SendMail($email,"Withdrawal approved",$msg2);

/////////////////////////////////

//$to = "$email"; // enter the users email here
$subject = 'Your funds have been sent';
//$from = $company_email; /// enter the email of you host example admin@netbaba.com
 
// Compose a simple HTML email message
$message = "<!DOCTYPE html>
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
    <img src='https://www.vargofarms.io/images/logo1.png' class='logo'>
    
  </div>
  <div class='body'>
    
  

    <h2>
      Hello $username

    </h2>

  You have successfully withdrawn USD$amount into your wallet address.  
  <br> Transaction:ID $code. <br>
   Maximum Vault per user 10x each Vault power.
   Migrating to next Vault?  our Vaults gives out maximum ROI of 20% and 360% per month and annual respectively, kindly select the Vault and deposit required amount to start running.

<br>
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
 $msg2 = $message; 
//mail($to, $subject, $message, $headers);
require "../mail.php"; 
 

/////////////////////END OF EMAIL//////////////





  }

//////////////




      }


    }else{
      $msg = '<div class="alert alert-success text-center"> Already approved</div>';

    }
 
  

}

?>




<div class="container-fluid">
 
   <?php

 if(isset($_POST['decline']) || isset($_POST['approve'])){ ?>
    <div class=" text-center"><b class="p-3"> <h5><?php  echo $msg; ?></b> </h5></div>
    <?php } ?>

    <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Withdrawal Request</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
    
      <tr>
        <th>S/N</th>
        <th>username</th>
        <th>request date</th>
        <th> Status</th>
        <th> Amount</th>

        <th>balance</th>
        <th> wallet address</th>
        <th>wallet type</th>
        <th></th>
         <th></th>
        
        
      </tr>
    </thead>
      <tfoot>
    
      <tr>
        <th>S/N</th>
        <th>username</th>
        <th>request date</th>
        <th> Status</th>
        <th> Amount</th>

        <th>balance</th>
        <th> wallet address</th>
        <th>wallet type</th>
        <th></th>
         <th></th>
        
        
      </tr>
    </tfoot>
    <tbody>
     <?php  

     $sql = "SELECT * from requests where status = 'pending' || status = 'pendding' order by id desc";
      $sn = 1;
     $result = mysqli_query($con,$sql) or die("cant select members ".mysqli_error($con));
     while ($row = mysqli_fetch_array($result)) {
      $username = $row['user_name'];
     
      $request_date = $row['request_date'];
      $balance =  $row['balance'];
      $status  = $row['status'];
      $id = $row['id'];
      $user_id = $row['user_id'];
      $amount = $row['amount'];
      $wallet_address = $row['address'];
       $address_type = $row['address_type'];
     // $running_invest = $row['running_invest'];
      # code...
    

     ?>

      <tr>
        <td><?php echo $sn++; ?></td>
        <td><?php echo $username; ?></td>
        <td><?php echo $request_date; ?></td>
         <td><?php echo $status; ?></td>
         <td><?php echo $amount; ?></td>
        <td><?php echo  $balance; ?></td>
         <td><input id="address<?php echo $id ?>" type="text" name="" class="form-control" value="<?php echo $wallet_address; ?>" style="width: 100px">
          <br>
      <i class="fa fa-copy text-light btn btn-success" aria-hidden="true" type="button" id="copy<?php echo $id ?>"></i>

         </td>
         <td><?php echo $address_type; ?></td>
        
         
        <td> 
          <button type="button" class="btn btn-info " data-toggle="modal" data-target="#myModal1<?php echo $id ?>"> 
             <i class="fa fa-check" aria-hidden="true"></i>
           </button>

        

<!--         ////////////////////////// aprooves //////////////////////
 -->

  <!-- Modal -->
  <div class="modal fade" id="myModal1<?php  echo $id?>" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Approve</h4>
        </div>
        <div class="modal-body">
          <p>You are about to Approve this Request</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        <div class="modal-footer">
          <form method="POST">
            <input type="text" name="code" placeholder="enter transaction id" required>
            <br>
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="hidden" name="wallet" value="<?php echo $wallet_address  ?>">
            <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
            <input type="hidden" name="amount" value="<?php echo $amount ?>">
            <input type="hidden" name="username" value="<?php echo $username ?>">
            <input type="hidden" name="status" value="<?php echo $status ?>">
            <br>
        <button name="approve" type="submit" class="btn btn-info">Confirm Approve Request</button>
            </form>
        </div>
      </div>
    </div>
  </div>



 <!-- /////////// end of approval button/////////////////
 -->

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
          <h4 class="modal-title">Decline?</h4>
        </div>
        <div class="modal-body">
          <p>You are about to Decline this Request</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        <div class="modal-footer">
          <form method="POST">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="hidden" name="wallet" value="<?php echo $wallet_address  ?>">
            <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
            <input type="hidden" name="amount" value="<?php echo $amount ?>">
            <input type="hidden" name="username" value="<?php echo $username ?>">
        <button name="decline" type="submit" class="btn btn-danger">Confirm Decline Request</button>
            </form>
        </div>
      </div>
    </div>
  </div>

          

          </td>
         
      </tr>
      <script type="text/javascript">
  
            
   
     var copyBtn = document.getElementById("copy<?php echo $id ?>");

     copyBtn.addEventListener("click",function () {
       var copyText = document.getElementById("address<?php echo $id ?>");
      //alert("<?php echo $id ?>");
       copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
  alert("successfully Copied : " + copyText.value);

       // body...
     });
     


  
     

  
 
 
</script>




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