<?php
include 'admin_head.php';


$errore = "";
$sucess = "";
$ref ="";


// echo "oooo";




if(isset($_POST['save'])){
  $name = $_POST['name'];
  $amount = $_POST['amount'];
  $t_type = $_POST['t_type'];
   $t_name = $_POST['t_name'];
     $invest_date = date(" D d M h:m");
     $user_id = 100000;
     $username = $name;
     $wallet = $t_name;
     $status = "approved";
     $plan_id = 1;
     $payment_id = 1;
     $plan_name = "admin_plan";
     $payment_name = $t_name;
     $type = "Investment";
     if($t_type == 0){
      $type = "Investment";

     }else{
      $type = "withdrawal";

     }


  $sql = "insert into transactions (user_id, user_name, amount,wallet_type,status,invest_date,transaction_type,plan_id,plan_name,payment_id,payment_name)
        value(
        '$user_id',
        '$username',
        '$amount',
        '$wallet',
        '$status',
        '$invest_date',
        '$type',
        '$plan_id',
        '$plan_name',
        '$payment_id',
        '$payment_name'


      )";
  $result = mysqli_query($con,$sql) or die("Can not submit ".mysqli_error($con));


  if($result){
     echo $errorus = '<div class="alert alert-success text-center">Successful </div>';
   }else{
     echo $errorus = '<div class="alert alert-danger text-center">Falied</div>';
   }
}
            
        


?>




<div class="container-fluid">
    
    <article class="card shadow py-5 px-3">

             <form method="POST">
                <div class="form-group">
                  <select name="t_type" class="form-control">
                    <option disabled="" value="0">Select Transaction type</option>
                    <option value="0">Deposit</option>
                     <option value="1">Withdrawal</option>
                  </select>
                                
                            </div>

                            <div class="form-group">
                  <select name="t_name" class="form-control">
                    
                    <option value="Bitcoin">Bitcoin</option>
                     <option value="Ethereum">Ethereum</option>
                      <option value="Litecoin">Litecoin</option>
                     <option value="Dogecoin">Dogecoin</option>
                     <option value="USDT">USDT</option>

                  </select>
                                
                            </div>
                                       <div class="form-group">
                                <input class="form-control" name="name" id="fname" placeholder="Name" type="text" required>
                            </div>
                           
                            <!-- Input Field Ends -->
                            <!-- Input Field Starts -->
                            
                            <div class="form-group">
                                <input class="form-control" name="amount" id="email" placeholder="Amount" type="number" required>
                            </div>
                            <!-- Input Field Ends -->


                            <!-- Input Field Ends -->
                           
                           


                           

                              
                                        
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <button type="submit" name="save" class="btn btn-primary">Save</button>
                                            <div id="msgSubmit" class="h3 hidden"></div> 
                                            <div class="clearfix"></div>
                                        </div>
                                      
                                    </form> 



</article> 





  </div>



<?php

include 'admin_footer.php';


?>