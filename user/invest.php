<?php
include "header.php";
$error = "";



$username = $_SESSION['user'];
$user_id = $_SESSION['id'];

if(isset($_POST['invest'])){

 $amount = $_POST['amount'];
$plan_details = $_POST['plan'];
//$channel = $_POST['channel'];
 $plan = explode("-",$plan_details);
 $plan_name=  $plan[2];
$plan_id = $plan[0];
$amount = $_POST['amount'];
  $wallet = "Reinvest"; //$_POST['channel_name'];
  //$msg = $_POST['note'];
  $status = "pending";
  $amount = trim($amount);
  $wallet = trim($wallet);

  if($amount > 0){
      $query = "SELECT balance, email from members where id = '$user_id'";
      $result2 = mysqli_query($con,$query) or die("Cant add ".mysqli_error($con));
                            if($result2){
                              while ($row = mysqli_fetch_array($result2)) {
                                $balance = $row['balance'];
                                $email = $row['email'];
                                # code...
                              }

                            }



    if($balance >= $amount){
   
      //////////////////////////////////DEBIT USER BALANCE///
         $sql = "UPDATE members set balance = balance - '$amount' where id = '$user_id'";
      $result = mysqli_query($con,$sql) or die("Can not submit1 ".mysqli_error($con));
      if($result){


      $invest_date = date(" D d M h:m");

  $sql = "insert into transactions (user_id, user_name, amount,wallet_type,status,invest_date,transaction_type,plan_id,plan_name,payment_id,payment_name)
        value(
        '$user_id',
        '$username',
        '$amount',
        '$wallet',
        '$status',
        '$invest_date',
        'Investment',
        '$plan_id',
        '$plan_name',
        '0',
        'Investment'


      )";
  // $result = mysqli_query($con,$sql) or die("Can not submit ".mysqli_error($con));
  //  $sql = "insert into investments (
  //     user_id, 
  //     plan_id,
  //     plan_name,
  //     profit,
  //     amount,
  //     username
  //     )
  //       value(
  //       '$user_id',
  //       '$plan_id',
  //       '$plan_name',
  //       '0',
  //       '$amount',
  //       '$username'
  //     )";
  $result = mysqli_query($con,$sql) or die("Can not submit ".mysqli_error($con));
  if($result){
   echo  $msg =  '<div class="alert alert-success text-center">successful, status: pending approval</div>';

  }else{
    $msg =  '<div class="alert alert-failed text-center">Investment Couldnt strart mysqli_error($con) </div>';
  }



  if($result){

        $msg2 = "
<div style='padding: 10px; background-color: black; color: white;height: 300px'>
  <p style='color: yellow'><b>$company_name</b></p>
  <hr style='color: white'>
  <p>Hello $username, your Investment of  USD $amount is waiting approval;
    <br>
    Check your running investment(s) from time to time <br>
    to see how your profit is increasing. <br>
    if you have any question<br>
    contact our support for assistance
  </p>
  
</div>
";


    // SendMail($email,"Payment approved",$msg2);

/////////////////////////////////

$to = $email; // enter the users email here
$subject = 'Investment Approved';
$from =  $company_email; /// enter the email of you host example admin@netbaba.com
 
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
 
// Compose a simple HTML email message
$message = '<html><body>';
//$mail->AddEmbeddedImage('img/2u_cs_mini.jpg', 'logo_2u');


$message .= "
    $msg2
";
$message .= '</body></html>';
$sent = mail($to, $subject, $message, $headers);

/////////////////////END OF EMAIL//////////

    //// to do sucess 

    // echo "<script>
    // window.location.href='".'invest.php?t='.$wallet.'&amt='.$amount."';
    // </script>";

$to =  $company_email; // enter the users email here
$subject = 'Reinvestment alert';
$from =  $company_email; /// enter the email of you host example admin@netbaba.com
 
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
 
// Compose a simple HTML email message
$message = '<html><body>';
//$mail->AddEmbeddedImage('img/2u_cs_mini.jpg', 'logo_2u');
$message .= '

<h3 style="color:#f40;">
Deposit
</h3>';

$message .= "
<p>
Hi Admin a user just made a Reinvested 
<br>

Note-message: $msg <br>
Email $email<br>
Name: $user <br>
Amount : $amount <br>
Type : $wallet 
</p>
";
$message .= '</body></html>';
//$sent = mail($to, $subject, $message, $headers);




    

  

    }

  }else{
     $error = '<div class="alert alert-danger text-center">
    Cant debit $user;

     </div>';

      ///// to do errorr///////

    }


    //// to do Errooo
  }else{
     $error = '<div class="alert alert-danger text-center">

    Insufficient Balance
     </div>';
      }

}else{
     $error = '<div class="alert alert-danger text-center">

    Invalid Amount
     </div>';
      }

    }




?>
            
            <div class="row ">

    <div class="col-md-6 offset-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title">Invest</h3>
                  <?php echo $error ?>
                  <form id="form" class="forms-sample" action="" method="post">
                                            
                    <div class="form-group">
                      <label class="form-control-label">Choose Plan: <span class="tx-danger">*</span></label>
                <select name="plan" id="plan" class="form-control select2">
                    <option value="0" label="Choose Plan"></option>
                    <?php

$sql = "SELECT * from investment_plans where deleted = '0' ";
$sn = 1;
$result = mysqli_query($con,$sql) or die("cant select members ".mysqli_error($con));
while ($row = mysqli_fetch_array($result)) {
$name = $row['name'];
$min = $row['min_deposite'];
$max = $row['max_deposite'];
$profit = $row['daily_profit'];
$referal_bonus = $row['referal_bonus'];

// $date = $row['reg_date'];
// $qr_code =  $row['qr_code'];
// $ref_balance  = $row['referral_balance'];
$id = $row['id'];

 ?>
<option value="<?php echo $id."-".($min)."-".$name."-".($max)."-".($profit)."-".$referal_bonus."-".number_format($min)."-".number_format($max) ?>"><?php echo $name." $($min - $max)" ?></option>


<?php  } ?>
                                       
                                      </select>
                    </div>
                      
                      <div id='dsc' style="display:none">
                      <div class="rounded-soft overflow-hidden mb-3 mb-md-0">
<div class="mb-3">
    <h5 class="text-center text-success" id="c_name"></h5>
                          <ul class="list-group">
                              <li class="list-group-item" ><span>Daily Profit</span> <span id="c_profit"  class="float-right text-primary"><b></b></span></li>
                              <li class="list-group-item" ><span>Min Deposit</span> <span id="c_min" class="float-right text-warning"><b></b></span></li>
                            <li class="list-group-item"><span >Max Deposit</span> <span id="c_max" class="float-right text-success"><b></b></span></li>
                            <li class="list-group-item"><span >Referral Bonus</span> <span id="c_bonus" class="float-right text-danger"><b></b></span></li>
                          </ul>
</div>
</div>
                      </div>
                      
                      
                      <div class="form-group">
                      <label class="form-control-label">Wallet Balance: <span class="tx-danger">*</span></label>
                <select name="by" class="form-control select2">
                    <option disabled label="Wallet" value="2">Wallet Balance:</option>
                    <option value="1">USD <?php echo number_format($balance,2); ?></option>
                  </select>
                    </div>
                      
                      
                      <!--
                      <div class="form-group">
                      <label class="form-control-label">Currency: <span class="tx-danger">*</span></label>
                <select name="coin" class="form-control select2">
                    <option label="Choose Currency"></option>
                    <option value="BTC">Bitcoin - BTC</option>
                    <option value="ETH">Ethereum - ETH</option>
                    <option value="BNB">Binance - BNB</option>
                    <option value="LTC">Litecoin - LTC</option>
                    <option value="USDT">Tether USD - USDT</option>
                    <option value="TRX">Tron USD - TRX</option>
                  </select>
                    </div>
                      -->
                    <div class="form-group">
                      <label class="form-control-label">Enter Amount: <span class="tx-danger">*</span></label>
                <input type="number" name='amount' id="amount" placeholder="0000.00" class="form-control">
                    </div>
                    <button class="btn btn-success btn-block" type="submit"
                     name='invest' id="continue">Invest Now</button>
                  </form>
                </div>
              </div>
            </div>
    
    
        </div>


                  </div>
      </div>
      </div><!-- container -->
    </div><!-- slim-mainpanel -->


    <script type="text/javascript">
          $(document).ready(function(){

              $("#form").submit(function(e){


                 var plan = $("#plan").find(":selected").val();
              var amount = $("#amount").val();
              const myArr = plan.split("-");
              var min = myArr[1];
              var max = myArr[3];

              if(parseInt(amount) < parseInt(min)){
               //alert(min);
               // $("form").
                alert("minimum deposit for this plan is $"+ min);
                 return false;
              }else if(parseInt(amount) > parseInt(max)){
                alert("maximum deposit for this plan is $"+ max);
                 return false;
              }
               
                

            });

            ///TOGLE


            $("#plan").change(function(){

              var plan = $("#plan").find(":selected").val();
              //var amount = $("#amount").val();
              //alert(plan);
             if(plan != 0){
              $("#dsc").show();
              

              const myArr = plan.split("-");
              var min = myArr[6];
              var name = myArr[2];
              var max = myArr[7];
              var profit = myArr[4];
              var referal = myArr[5];
              $("#c_name").html(name);
              $("#c_min").html("USD "+min);
              $("#c_max").html("USD "+max);
              $("#c_profit").html(profit+"%");
              $("#c_bonus").html(referal+"%");
             }else{
              $("#dsc").hide();
             }

              



            });


          });




 
        </script>


    <?php
require "footer.php";

?>