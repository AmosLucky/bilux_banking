<?php
include "header.php";
$amount = "";
$wallet = "";
$error  = "";
$username = $_SESSION['user'];
$user_id = $_SESSION['id'];

if(isset($_POST['withdraw'])){

 
  $amount = $_POST['amount'];
   $wallet_address = $_POST['wallet_address'];
  //$status = "pending";
  $wallet_info = explode("-",$wallet_address);
  $type  = $wallet_info[0];
  $wallet_address = $wallet_info[1];

  $type = trim($type);
  $amount = trim($amount);
  $request_date = date("d m M h:i");
 // $wallet_address = "";
  $address_type = $type;

  
    if($amount >= 10){
        if(!$is_suspended){
            if(!$is_compounded){

      //$invest_date = date(" D d M m:i");
      //echo $balance;
      if(strlen($wallet_address) > 8 ){

      if($amount <= $balance){
       
         $new_balance = $balance -$amount;


        $sql = "UPDATE members SET balance = '$new_balance' where id = '$user_id'";
        $result = mysqli_query($con,$sql) or die("Cant proccess ".mysqli_error($con));
        if($result){






       
  
  $result = mysqli_query($con,$sql) or die("Can not submit ".mysqli_error($con));


  if($result){

    ////// do insert ///////////

    $sql = "INSERT INTO transactions (user_id,user_name, amount, status, invest_date,name,address,wallet_type,transaction_type)
    VALUES(
    '$user_id',
    '$username',
    '$amount',
    'approved',
    '$request_date',
    '$balance',
    '$wallet_address',
    '$address_type',
    'Withdrawal'
    )
    ";

    $result = mysqli_query($con,$sql) or die("Can not submit ".mysqli_error($con));


    //// to do sucess 

    if($result){
      $error = '<div class="alert alert-success text-center">
     You have successfully requested for withdrawal

     </div>';
     
     ////////////////////////mailer////////////////
     $sql = "SELECT email, username from members where id = '$user_id'";

        $result = mysqli_query($con,$sql) or die("Can not submit ".mysqli_error($con));
    while ($row = mysqli_fetch_array($result)) {
      $email = $row['email'];
      $username = $row['username'];
      # code...
    }

     
     
//$to = "$email"; // enter the users email here
$subject = 'Withdrawal Order';
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
       $company_logo2
        
    </div>
    <div class='body'>
        
        <h4>
            VargoFarm
        </h4>

        <h2>
            Hello $username

        </h2>

        <p class='block'>
            <b>Withdrawal </b>
            <br>

Hello $username,
<br>
 
Your request for withdrawal of USD$amount in $type has been approved.
<br>
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
 
 
 //////////////////////////////////// end ///////////////////////////////
    }

  

    }

    /////////////////balance reduced//////////

  }
      }else{
     $error = '<div class="alert alert-danger text-center">
     Insufficient Balance

     </div>';

      ///// to do errorr///////

    }

    }else{
     $error = '<div class="alert alert-danger text-center">
     Invalid wallet address

     </div>';

      ///// to do errorr///////

    }

     }else{
     $error = "<div class='alert alert-danger text-center'>
    Your asset is locked for $compounded_duration days

     </div>";

      ///// to do errorr///////

    }

      

  }else{
     $error = '<div class="alert alert-danger text-center">
    Your account is restricted from making a withdrawal request

     </div>';

      ///// to do errorr///////

    }

}else{
     $error = '<div class="alert alert-danger text-center">
    The minimum withdrawal is $10

     </div>';

      ///// to do errorr///////

    }




    


  
  
}


if(isset($_POST['add_wallet'])){
  $address = $_POST['address'];
  $wallet_type =  $_POST['wallet_type'];
  if(strlen( $address) > 5){
      if(strlen($wallet_type)>2){

          $sql = "Insert into wallets (user_id,wallet,type) values('$user_id','$address','$wallet_type')";
          $result = mysqli_query($con,$sql) or die("can not insert ".mysqli_error($con));
          if($result){
               $error = '<div class="alert alert-success text-center">
   Wallet succefully saved (this wallet will be an option when you will request for withdraw)

   </div>';

          }


      }else{
           $error = '<div class="alert alert-danger text-center">
   Invalid type

   </div>';
      }

  }else{
      $error = '<div class="alert alert-danger text-center">
   Invalid wallet address

   </div>';
  }

}



?>
                        
            <div class="row ">

    <div class="col-md-6 offset-md-3 grid-margin stretch-card">
    <form action="" method="post">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title">Withdrawal Request</h3>
                  <p><small class="card-description">
                    <?php echo $error ?>
                      </small></p>
                  <form class="forms-sample" action="" method="post">
                    <div class="form-group">
                      <label class="form-control-label">Enter Amount: <span class="tx-danger">*</span></label>
                <input type="number" name='amount' placeholder="0000.00" class="form-control">
                    </div>
                    <div class="form-group">
                    <select class="default-select form-control" id="bselectPlan" name="wallet_address">
                                              
                                              <?php

                                       $sql = "SELECT * from wallets where user_id = '$user_id' ";
                               $sn = 1;
                              $result = mysqli_query($con,$sql) or die("cant select members ".mysqli_error($con));
                              while ($row = mysqli_fetch_array($result)) {
                                 $type = $row['type'];
                                 $address = $row['wallet'];
                                 // $date = $row['reg_date'];
                                 // $qr_code =  $row['qr_code'];
                                 // $ref_balance  = $row['referral_balance'];
                                  $id = $row['id'];

                                         ?>
                                         <option value="<?php echo  $type."-".$address ?>"><?php echo $type .": ". $address ?></option>
                                         

                                       <?php  } ?>
                                            
                                         </select>
                                        
                     
                    </div>
                      
                                            
                      <div class="modal fade" id="modaldemo6" tabindex="-1" role="dialog" aria-labelledby="tlabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="">Add Your Wallet<br><small style="font-size: 12px;" class="text-muted"> Add your wallet address to receive your withdrawal.</small></h3>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="">
                    
                    <form action="" method="post">
                    <div class="form-group">
                      <label class="form-control-label">Choose Wallet Type <span class="tx-danger">*</span></label>
                <select name="wallet_type" class="form-control select2">
                    <option label="Choose Wallet Type"></option>
                    <option value="Bitcoin">Bitcoin</option>
                    <option value="Ethereum">Ethereum</option>
                    <option value="Binance">Binance coin</option>
                    <option value="Litecoin">Litecoin</option>
                    <option value="Tehter">Tether USD</option>
                    <option value="Tehter">Tron</option>
                
                  </select>
                    </div><!-- form-group -->
                    <input type="hidden" value="778" name="id">
                    <div class="form-group mg-b-20">
                        <label class="form-control-label">Enter Your Wallet Address <span class="tx-danger">*</span></label>
                      <input type="text" placeholder="Wallet Address" name="address" class="form-control" >
                    </div><!-- form-group -->

                    <button class="btn btn-success btn-block" type="submit" name="add_wallet">Add Wallet</button>
                    </form><!-- form-group -->
                  </div>
                    
                        </div>
                        <div class="modal-footer">
                          <div class="form-group">
                        <button type="button" class="btn btn-outline-warning btn-block" data-dismiss="modal" aria-label="Close">Go Back</button>
                    </div>
                        </div>
                      </div>
                    </div>
                  </div>
                      
              <div class="form-group">
                  <label class="form-control-label"><span class="tx-warning">Click the Add wallet button bellow if you want to add new wallet </span></label>
                  <a href="#" class=" btn-outline-success btn-block mg-b-10 " data-toggle="modal" data-target="#modaldemo6"><i class="fa fa-plus mg-r-5"></i> Add Wallet</a>
              </div>
              <button class="btn btn-warning btn-block" type="submit" name="withdraw">  Withdraw</button>
                              </div>
              </div>
            </div>
                              </form>
    
    
        </div>

                </div>
      </div><!-- container -->
    </div><!-- slim-mainpanel -->
      </div>

      <?php
require "footer.php";

?>