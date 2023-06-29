<?php

require "header.php";

$msg = "";

if(isset($_GET['v'])){
    $id = $_GET['v'];
    $n= $_GET['n'];
  
  
  if(isset($_POST['suspend'])){
  
    $id = $_POST['id'];
    $reason = $_POST['suspend'];
    $sql = "UPDATE members set is_suspendedn = '1', suspension_reason = '$reason' where id = '$id' ";
    $result = mysqli_query($con,$sql);
    if( $result){
      $msg = '<div class="alert alert-success">Successfully suspended</div>';
    }else{
     $msg = '<div class="alert alert-danger">Failed</div>';
  
    }
  }
  
  if(isset($_POST['add_fund'])){
     $invest_date = date(" D d M h:m");
     $status = "approved";
     $user_id = $_POST['id'];
     $username = $_POST['username']; 
     $amount = $_POST['amount']; 
    
  
     $wallet_type = "Bonus";
    
      $query = "UPDATE members set  balance = balance 
      + $amount where id = '$user_id'";
  
 
     
     $result = mysqli_query($con,$query) or die("Can not submit ".mysqli_error($con));
     if( $result){
      $msg = '<div class="alert alert-success">Successfully Added</div>';
    }else{
     $msg = '<div class="alert alert-danger">Failed</div>';
  
    }
  
  
    $sql = "insert into transactions (user_id, user_name, amount,wallet_type,status,invest_date,transaction_type,description)
          value(
          '$user_id',
          '$username',
          '$amount',
          'Dollar',
          '$status',
          '$invest_date',
          'Bonus',
          ''
  
  
        )";


    $result = mysqli_query($con,$sql) or die("Can not submit ".mysqli_error($con));
    if( $result){
      $msg = '<div class="alert alert-success">Successfully Added</div>';







       ////////////////////////mailer////////////////
     $sql = "SELECT email, username from members where id = '$user_id'";

     $result = mysqli_query($con,$sql) or die("Can not submit ".mysqli_error($con));
 while ($row = mysqli_fetch_array($result)) {
   $email = $row['email'];
   $username = $row['username'];
   # code...
 }



$tid = $con->insert_id."_"."CMF-GUS33-";
    
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
 
$$amount has been sent to your account.
<br>
Transaction batch is 

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


















    }else{
     $msg = '<div class="alert alert-danger">Failed</div>';
  
    }
  
  }
   
              
          
  
  
  ?>

  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   
    <!-- Content Header (Page header) -->
    <div class="content-header">

        <div class="row mb-3">
            <div class="col-md-12">
                <div class="card">
                <article class="card-body">
                <div
                            class="card-header">
                            <div class="card-title"> Add Bonus
                            </div>
</div>
      

             <form method="POST">
                <div class="form-group">
                  <div><?php echo $msg ?></div>
                 
                                
                            </div>
                                       <div class="form-group">
                                <input class="form-control" name="id" id="fname" type="hidden" value="<?php echo $id ?>">

                            </div>
                            <div class="form-group">
                              <input class="form-control" name="username" id="fname" type="" value="<?php echo $n ?>" readonly>
                            </div>
                            <div class="form-group">
                              <input class="form-control" name="amount" id="fname" type="number" placeholder="amount" >
                            </div>
                            

                           
                            <!-- Input Field Ends -->
                            <!-- Input Field Starts -->
                            
                           



                         
                                        
                                     
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <button type="submit" name="add_fund" class="btn btn-primary">
                                              Add Fund
                                            </button>
                                            <div id="msgSubmit" class="h3 hidden"></div> 
                                            <div class="clearfix"></div>
                                        </div>
                                      
                                    </form> 



</article> 

</div>
         

            </div>
        </div>
        </div>

</div>
  




<?php

}else{
    echo "Please select a user you want to add fund";
  }

require "footer.php";


?>