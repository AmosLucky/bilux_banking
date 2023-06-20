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

if(isset($_POST['d'])){
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
    <h3>All Investment Plans<h3>
    </div>
  <!-- <small class="row justify-content-center">
    Note: How you set this data is exactly  wey your investment and profit will work
  </small> -->
  <div class="row justify-content-center">
   <?php echo $msg ?>
    </div>
    <article class=" card shadow p-3">

       <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
              <th>S/N</th>
        <th>Name</th>
        <th>Min</th>
        <th>Max</th>
        <th>Profit</th>
        <th>Profit Duration</th>
        <th>Capital Duration</th>
        <th>Referal Bonus</th>
         <th></th>
         
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                     <th>S/N</th>
        <th>Name</th>
        <th>Min</th>
        <th>Max</th>
        <th>Profit</th>
        <th>Profit Duration</th>
        <th>Capital Duration</th>
        <th>Referal Bonus</th>
        <th></th>
                    </tr>
                  </tfoot>
                  <tbody>

            <?php
            $sql = "SELECT * FROM investment_plans where deleted = '0' order by id desc ";
            $result = $con -> query($sql);
            $sn = 1;
            while ($row = $result -> fetch_array()) {
              $name = $row['name'];
              $id = $row['id'];
              $min =  $row['min_deposite'];
               $max =  $row['max_deposite'];
               $profit =  $row['profit'];
                $capital_after =  $row['capital_after'];
                 $profit_after =  $row['profit_after'];
                 $referal_bonus =  $row['referal_bonus'];
                  //$sn++;

              
            
            ?>
           <tr>
              <th><?php echo $sn++; ?></th>
        <th><?php echo $name ?></th>
        <th>$<?php echo $min ?></th>
        <th>$<?php echo $max ?></th>
        <th><?php echo $profit ?>%</th>
        <th><?php echo $profit_after ?>days (<?php echo $profit_after * 24 ?>hrs)</th>
        <th><?php echo $capital_after ?>days (<?php echo $capital_after * 24 ?>hrs)</th>
        <th><?php echo $referal_bonus ?>%</th>
         <th>
           <div class="dropdown">
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
   Action
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="edit_investment.php?e=<?php echo $id ?>">Edit</a>
    <a class="dropdown-item" href="investment_plans.php?d=<?php echo $id ?>">Delete</a>
    <!-- <a class="dropdown-item" href="#">Link 3</a> -->
  </div>
</div>
         </th>
           </tr>
            <!--  <form method="POST" enctype="multipart/form-data" >
              <div class="card p-5 mb-2 shadow">
                <div class="card-header">
                  <h3><?php echo $name ?></h3>
                    
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
                      <label>profit percentage %</label>
                    <input type="number" name="profit" placeholder="E.g 2" value="<?php echo $profit ?>" class="form-control ">
                    </div>
                    <div class="col-md-6">
                      <label>Referal bonus %</label>
                    <input type="number" placeholder="E.g 2" name="referal_bonus" value="<?php echo $referal_bonus ?>" class="form-control ">
                    </div>
                    
                  </div>
                   <div class="form-row">
                    <div class="col-md-6">
                      <label>Profit availble for withdrawal after (days)</label>
                    <input type="number" name="profit_after" placeholder="E.g 3" value="<?php echo $profit_after ?>" class="form-control ">
                    </div>
                    <div class="col-md-6">
                      <label>Capital availble for withdrawal after (days) </label>
                    <input type="number" name="capital_after" placeholder="E.g 5" value="<?php echo $capital_after ?>" class="form-control ">
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
            
               </form>  -->

            <?php } ?>
          </tbody>
        </table>
      </div>




</article> 





	</div>



<?php


include 'admin_footer.php';


?>