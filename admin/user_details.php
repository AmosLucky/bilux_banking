<?php
include 'admin_head.php';


if(isset($_POST['update'])){

$id = $_POST['id'];
 
               $password = $_POST['password'];
               $balance = $_POST['balance'];
        $ref_balance  = $_POST['ref_balance'];
        $profit = $_POST['profit'];
       
       
        $running_invest = $_POST['running_invest'];


        $sql = "UPDATE members SET password = '$password', balance = '$balance', referral_balance = '$ref_balance', running_invest = '$running_invest', profit = '$profit' WHERE id = '$id' ";

         $result = mysqli_query($con,$sql) or die("cant select members ".mysqli_error($con));

         if($result){

            $msg =  '<div class="alert alert-success text-center">SUCCESSFULLY UPDATED</div>';
         }else{
            $msg = '<div class="alert alert-danger text-center"> ERROR: USER CANT BE UPDATE</div>';
         }


            



}



































if(isset($_GET['v'])){
    $id = $_GET['v'];

    $sql = "select * from members where id = '$id'";
     $result = mysqli_query($con,$sql) or die("cant select ".mysqli_error($con));
    $checkuser = mysqli_num_rows($result);
    if($checkuser == 1){
        while ($row = mysqli_fetch_array($result)) {
            $id = $row['id'];
             $username =$row['username'];
            // $_SESSION['balance'] =  $row['balance'];
              $email =$row['email'];
             $phonenumber =  $row['phonenumber'];
            $city =$row['city'];
             $state =$row['state'];
              $gender = $row['gender'];
              $profit = $row['profit'];
            
              $referree=  $row['referred_by'];
               $firstname =  $row['firstname'];
               $lastname =  $row['lastname'];
               $password = $row['password'];
               $balance =  $row['balance'];
        $ref_balance  = $row['referral_balance'];
       
        $bitcoin_wallet = $row['bitcoin_wallet'];
        $etherum_wallet = $row['etherum_wallet'];
        $running_invest = $row['running_invest'];
            
            
        


?>




<div class="container">
    <?php

 if(isset($_POST['update'])){ ?>
    <div class=" text-center"><b class="p-3"> <h5><?php  echo $msg; ?></b> </h5></div>
    <?php } ?>
    <article class="card-body">
<form method="post" id="Registeration">
    <div class="form-row">
        <div class="col form-group">
            <label>Available balance </label>   
            <input type="hidden" name="id" value="<?php  echo $id?>">
            <input type="text" name="balance" value="<?php echo $balance   ?>" class="form-control" placeholder="">
        </div> <!-- form-group end.// -->
        <div class="col form-group">
            <label>Running investment</label>
            <input type="text" name="running_invest" value="<?php echo $running_invest   ?>" class="form-control" placeholder=" ">
        </div> <!-- form-group end.// -->
    </div> <!-- form-row end.// -->
<div class="form-row">
    <div class="col form-group">
            <label>refreral balance </label>   
            <input type="text" name="ref_balance" value="<?php echo $ref_balance   ?>" class="form-control" placeholder="">
        </div> <!-- form-group end.// -->
        <div class="col form-group">
            <label>Profit</label>
            <input type="text" name="profit" value="<?php echo $profit   ?>" class="form-control" placeholder=" ">
        </div> <!-- form-group end.// -->
    </div> <!-- form-row end.// -->
    <div class="form-row">
        <div class="col form-group">
            <label>First name </label>   
            <input type="text" name="fname" value="<?php echo $firstname   ?>" class="form-control" placeholder="">
        </div> <!-- form-group end.// -->
        <div class="col form-group">
            <label>Last name</label>
            <input type="text" name="lname" value="<?php echo $lastname   ?>" class="form-control" placeholder=" ">
        </div> <!-- form-group end.// -->
    </div> <!-- form-row end.// -->
    <div class="form-group">
        <label>Email address</label>
        <input type="email" name="email" value="<?php echo $email   ?>" class="form-control" placeholder="">
        <small class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div> <!-- form-group end.// -->
    <div class="form-group">
        <label>Phone Number</label>
        <input type="number" value="<?php echo $phonenumber   ?>" name="phone" class="form-control" placeholder="">
        <small class="form-text text-muted"></small>
    </div> <!-- form-group end.// -->
    <div class="form-group">
        <span>gender</span>
            <label class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="gender" value="male">
          <span class="form-check-label"> Male </span>
        </label>
        <label class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="gender" value="female">
          <span class="form-check-label"> Female</span>
        </label>
    </div> <!-- form-group end.// -->
    <div class="form-row">
        <div class="form-group col-md-6">
          <label>City</label>
          <input type="text" value="<?php echo $city   ?>"  class="form-control" style="width: 40%">
        </div> <!-- form-group end.// -->
        <div class="form-group col-md-6">
          <label>Country</label>
      <input type="text" name="state" value="<?php echo $state   ?>">
                </div> <!-- form-group end.// -->
    </div> <!-- form-row.// -->
    <div class="form-group">
        <label>Username</label>
        <input type="username" name="username"  value="<?php echo $username   ?>" class="form-control" placeholder="">
        <small class="form-text text-muted"></small>
    </div> <!-- form-group end.// -->
    <div class="form-group">
        <label>Create password</label>
        <input class="form-control" value="<?php echo $password   ?>" type="text" name="password">
    </div> 
  <div class="form-group">
    <label>Referrals Username</label>
      <input class="form-control" type="text"  name="referral" value="<?php 
        echo $referree
      ?>">
  </div><!-- form-group end.// -->  
    <div class="form-group">
        <button type="button" class="btn btn-info btn-lg form-control" data-toggle="modal" data-target="#myModal">UPDATE</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Query</h4>
        </div>
        <div class="modal-body">
          <p>You are about to updte this User</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        <div class="modal-footer">
            <button type="submit" name="update" class="btn btn-primary btn-block"> Confirm  </button>
    </div> <!-- form-group// -->    
         
        </div>
      </div>
      
    </div>
  </div>
  
          
                                           
</form>
</article> 





    </div>



<?php
}}else{
    echo "YOU DID NOT CLICK ON ANY USER";
}
}else{
    echo "YOU DID NOT CLICK ON ANY USER";
}
include 'admin_footer2.php';


?>