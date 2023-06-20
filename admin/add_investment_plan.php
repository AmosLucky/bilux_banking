<?php
include 'admin_head.php';
$msg = "";
if(isset($_POST['save'])){
 $name = $_POST['name'];
   //$id = $_POST['id'];
  $min =  $_POST['min'];
    $max =  $_POST['max'];
   $profit =  $_POST['profit'];
    $capital_after =  $_POST['capital_after'];
     $profit_after =  $_POST['profit_after'];
     $referal_bonus =  $_POST['referal_bonus'];

     $query = "INSERT INTO investment_plans (name,min_deposite,max_deposite,profit,capital_after,referal_bonus,profit_after)values( 
      '$name',
      '$min',
      '$max',
      '$profit',
      '$capital_after',
      '$referal_bonus',
      '$profit_after'
     )
     ";

     $result = mysqli_query($con,$query) or die(mysqli_error($con));
  if( $result){
    $msg = '<div class="alert alert-success">Successfully Saved</div>';
  }else{
   $msg = "<div class='alert alert-danger'>Failed </div>";

  }



}

if(isset($_POST['delete'])){
   $id = $_POST['id'];
   $query = "UPDATE investment_plans set deleted = '1' where id = '$id'";



   $result = mysqli_query($con,$query) or die(mysqli_error($con));
  if( $result){
    $msg = '<div class="alert alert-danger">Successfully DELETED</div>';
  }else{
   $msg = "<div class='alert alert-danger'>Failed </div>";

  }

}







if(isset($_POST['update_method'])){
  $name = $_POST['name'];
  $address = $_POST['address'];
  $qr_code = $_FILES['qr_code']["tmp_name"];
  $date = date("d M");
  $target_dir = "../images/";
$target_file = $target_dir . basename($_FILES["qr_code"]["name"]);
$qr_code = basename($_FILES["qr_code"]["name"]);
if(strlen($qr_code) > 5){
  $upload = move_uploaded_file($_FILES['qr_code']["tmp_name"], $target_file);

}else{
  $qr_code = $_POST['hidden_image'];

}

$sql = "UPDATE  payment_methods set name = '$name', address = '$address', qr_code = '$qr_code',reg_date = '$date'";
$result = mysqli_query($con,$sql) or die(mysqli_error($con));
  if( $result){
    $msg = '<div class="alert alert-success">Successfully Updated</div>';
  }else{
   $msg = "<div class='alert alert-danger'>Failed </div>";

  }
}


        


?>




<div class="container">
  <div class="row justify-content-center">
    <h3>Add Investment Plans<h3>
    </div>
  <small class="row justify-content-center">
    Note: How you set this form is exactly  wey your investment and profit will work
  </small>
  <div class="row justify-content-center">
   <?php echo $msg ?>
    </div>
    <article class="">

           
             <form method="POST" enctype="multipart/form-data">
              <div class="card p-3 shadow">
                <div class="card-header">
                  
                    
                  </div>
                <div class="card-body">
                 
                 
                </div>

                  <div class="mb-3">
                    <label>Investment plan Name</label>
                    <input type="text" placeholder="E.g Beginner" name="name"  class="form-control">
                  </div>
                   <div class="form-row mb-3">
                    <div class="col-md-6">
                      <label>Minimum Deposit $</label>
                    <input type="number" name="min"  class="form-control ">
                    </div>
                    <div class="col-md-6">
                      <label>Maximum Deposit $</label>
                    <input type="number" name="max"  class="form-control ">
                    </div>
                    
                  </div>
                  <div class="form-row mb-3">
                    <div class="col-md-6">
                      <label>profit percentage %</label>
                    <input type="number" name="profit" placeholder="E.g 2"  class="form-control ">
                    </div>
                    <div class="col-md-6">
                      <label>Referal bonus %</label>
                    <input type="number" placeholder="E.g 2" name="referal_bonus"  class="form-control ">
                    </div>
                    
                  </div>
                   <div class="form-row mb-3">
                    <div class="col-md-6">
                      <label>Profit availble for withdrawal after (days)</label>
                      <br>
                      <select name="profit_after" class="form-control">
            <option value="1">1 Day(24hrs)</option>
            <option value="2">2 Days(48hrs)</option>
            <option value="3">3 Days(72hrs)</option>
            <option value="4">4 Days(96hrs)</option>
            <option value="5">5 Days(120hrs)</option>
            <option value="6">6 Days(144hrs)</option>
            <option value="7">1 Week(168hrs)</option>
            <option value="8">2 Weeks(336hrs)</option>
            <option value="9">3 Weeks(504hrs)</option>
            <option value="30">1 Month(720hrs)</option>
            <option value="60">2 Month(1440hrs)</option>
            <option value="90">3 Month(2160hrs)</option>
            <option value="120">4 Month(2880hrs)</option>
            <option value="150">5 Month(3600hrs)</option>
            <option value="180">6 Month(3672hrs)</option>
          </select>
                    </div>
                    <div class="col-md-6">
                      <label>Capital availble for withdrawal after (days) </label>
                      <br>
                    <select name="capital_after" class="form-control">
            <option value="1">1 Day(24hrs)</option>
            <option value="2">2 Days(48hrs)</option>
            <option value="3">3 Days(72hrs)</option>
            <option value="4">4 Days(96hrs)</option>
            <option value="5">5 Days(120hrs)</option>
            <option value="6">6 Days(144hrs)</option>
            <option value="7">1 Week(168hrs)</option>
            <option value="8">2 Weeks(336hrs)</option>
            <option value="9">3 Weeks(504hrs)</option>
            <option value="30">1 Month(720hrs)</option>
            <option value="60">2 Month(1440hrs)</option>
            <option value="90">3 Month(2160hrs)</option>
            <option value="120">4 Month(2880hrs)</option>
            <option value="150">5 Month(3600hrs)</option>
            <option value="180">6 Month(3672hrs)</option>
          </select>
                    </div>
                    
                  </div>

                <div class="card-footer">
                   <div class="form-row">
                    
                       <input type="submit" name="save"  class="form-control btn btn-primary " value="Save">
                   

                     
                   </div>


                  
                </div>
              </div>
            
               </form> 

            



</article> 





	</div>



<?php


include 'admin_footer.php';


?>