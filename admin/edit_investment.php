<?php
include 'admin_head.php';
$msg = "";
if(isset($_POST['save'])){
 $name = $_POST['name'];
   $id = $_POST['id'];
  $min =  $_POST['min'];
    $max =  $_POST['max'];
   $profit =  $_POST['profit'];
    $capital_after =  $_POST['capital_after'];
     $profit_after =  $_POST['profit_after'];
     $referal_bonus =  $_POST['referal_bonus'];

     $query = "UPDATE investment_plans set 
     name = '$name',
     min_deposite = '$min',
     max_deposite = '$max',
     profit = '$profit',
     capital_after = '$capital_after',
     referal_bonus = '$referal_bonus',
     profit_after = '$profit_after'
     WHERE id = '$id'
     ";

     $result = mysqli_query($con,$query) or die(mysqli_error($con));
  if( $result){
    $msg = '<div class="alert alert-success">Successfully Updated</div>';
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
    <h3>Edit paln<h3>
    </div>
  <small class="row justify-content-center">
    Note: How you set this data is exactly  wey your investment and profit will work
  </small>
  <div class="row justify-content-center">
   <?php echo $msg ?>
    </div>
    <article class="">

            <?php
            if(isset($_GET['e'])){
              $i_id = $_GET['e']; 
              $sql = "SELECT * FROM investment_plans where id = '$i_id' && deleted = '0' ";
            }else{
              headers("Location:investment_plan.php");
              //$sql = "SELECT * FROM investment_plans where deleted = '0' order by id desc ";
            }
            $result = $con -> query($sql);
            while ($row = $result -> fetch_array()) {
              $name = $row['name'];
              $id = $row['id'];
              $min =  $row['min_deposite'];
               $max =  $row['max_deposite'];
               $profit =  $row['profit'];
                $capital_after =  $row['capital_after'];
                 $profit_after =  $row['profit_after'];
                 $referal_bonus =  $row['referal_bonus'];

              
            
            ?>
             <form method="POST" enctype="multipart/form-data" >
              <div class="card p-5 mb-2 shadow">
                <div class="card-header">
                  <h3><?php echo $name ?></h3>
             <!--      <input type="" id="selectedprofitval" name="" value="<?php echo $profit_after ?>">
                  <input type="" id="selectedcapitalval" name="" value="<?php echo $capital_after ?>"> -->
                    
                  </div>
                <div class="card-body">
                  <input type="hidden" name="id" value="<?php echo $id ?>">
                 
                </div>

                  <div>
                    <label>Investment plan Name</label>
                    <input type="text" placeholder="E.g Beginner" name="name" value="<?php echo $name ?>" class="form-control">
                  </div>
                   <div class="form-row">
                    <div class="col-md-6">
                      <label>Minimum Deposit $</label>
                    <input type="number" name="min" value="<?php echo $min ?>" class="form-control ">
                    </div>
                    <div class="col-md-6">
                      <label>Maximum Deposit $</label>
                    <input type="number" name="max" value="<?php echo $max ?>" class="form-control ">
                    </div>
                    
                  </div>
                  <div class="form-row">
                    <div class="col-md-6">
                      <label>profit percentage % (ROI)</label>
                    <input type="number" name="profit" placeholder="E.g 2" value="<?php echo $profit ?>" class="form-control ">
                    </div>
                    <div class="col-md-6">
                      <label>Referal bonus % (ROI)</label>
                    <input type="number" placeholder="E.g 2" name="referal_bonus" value="<?php echo $referal_bonus ?>" class="form-control ">
                    </div>
                    
                  </div>
                   <div class="form-row">
                    <div class="col-md-6">
                      <label>Profit availble for withdrawal after (days)</label>
                      <br>
                      <select id="selectedprofit" name="profit_after" class="form-control">
                         <option value="<?=$profit_after ?>"><?php echo $profit_after." Days ".$profit_after*24 ?>hrs</option>
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
                    <select id="selectedcapital" name="capital_after" class="form-control">
                      <option value="<?=$capital_after ?>"><?php echo $capital_after." Days ".$capital_after*24 ?>hrs</option>
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
                    <div class="col-md-6">
                       <input type="submit" name="save"  class="form-control btn btn-primary " value="Save">
                    </div>

                    <div class="col-md-6">
                       <input type="submit" name="delete"  class="form-control btn btn-danger " value="Delete">
                    </div>
                     
                   </div>


                  
                </div>
              </div>
            
               </form> 

            <?php } ?>



</article> 





	</div>
  <script type="text/javascript">
    var selectedprofit = document.getElementById('#selectedprofit');
     var selectedprofitval = document.getElementById('#selectedprofitval');
      var selectedcapital = document.getElementById('#selectedcapital');
      var selectedcapitalval = document.getElementById('#selectedcapitalval');
      alert(selectedprofitval.value + selectedcapitalval.value);

  </script>



<?php


include 'admin_footer.php';


?>