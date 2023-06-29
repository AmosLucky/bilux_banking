<?php
include 'header.php';
$msg = "";
 $name = "";
  $address =  "";
  $qr_code = "";

  if(isset($_GET['v'])){
    $id = $_GET['v'];

    $sql = "SELECT * FROM payment_methods where id = '$id'";
     $result = $con -> query($sql);
     while ($row = $result -> fetch_array()) {
      $name = $row['name'];
       $address = $row['address'];
      $qr_code = $row['qr_code'];
      
     }
  

  }





if(isset($_POST['add_method'])){
  $name = $_POST['name'];
  $address = $_POST['address'];
  
  $date = date("d M");
  

$sql = "INSERT INTO payment_methods (name, address, qr_code,reg_date) values('$name','$address','none','$date')";
$result = mysqli_query($con,$sql);
  if( $result){
    $msg = '<div class="alert alert-success">Successfully saved</div>';
  }else{
   $msg = '<div class="alert alert-danger">Failed</div>';

  }
}

if(isset($_POST['update_method'])){
  $id = $_POST['id'];
  $name = $_POST['name'];
  $address = $_POST['address'];
  //$qr_code = $_FILES['qr_code']["tmp_name"];
  $date = date("d M");
  


$sql = "UPDATE  payment_methods set name = '$name', address = '$address', qr_code = '00',reg_date = '$date' where id = '$id'";
$result = mysqli_query($con,$sql) or die(mysqli_error($con));
  if( $result){
    $msg = '<div class="alert alert-success">Successfully Updated</div>';
  }else{
   $msg = "<div class='alert alert-danger'>Failed </div>";

  }
}


        


?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    
    <!-- Content Header (Page header) -->
    <div class="content-header">
        
    <div class="row">
            <div class="col-lg-12">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Payment method  </h6>
                </div>


<article class="card-body">

<form method="POST" enctype="multipart/form-data">
 <input type="hidden" name="hidden_image" value="<?php echo $qr_code ?>">
   <div class="form-group">
     <div><?php echo $msg ?></div>
    
                   
               </div>
                          <div class="form-group">
                   Add new payment method
               </div>
               <div class="form-group">
                 <label>Name</label>
  <input class="form-control" name="name"  type="text" value="<?php echo $name ?>" >
                 
               </div>

               <div class="form-group">
                 <label>Wallet address</label>
  <input class="form-control" name="address"  type="text" value="<?php echo $address ?>">
                 
               </div>
                <?php  if(isset($_GET['v'])){
                 ?>
                 <!-- <div class="form-group">
                 <img src="../uploads/<?php echo $qr_code ?>" width="100">
                 <label>Qr Code</label>
  <input class="form-control" name="qr_code"  type="file" >
                 
               </div> -->
               <input type="hidden" name="id" value="<?php echo $id ?>">
         
                        
                           <div class="col-md-12 col-sm-12 col-xs-12">
                               <button type="submit" name="update_method" class="btn btn-primary">Update</button>
                               <div id="msgSubmit" class="h3 hidden"></div> 
                               <div class="clearfix"></div>
                           </div>

             <?php    } else { ?>
               
         
                        
                           <div class="col-md-12 col-sm-12 col-xs-12">
                               <button type="submit" name="add_method" class="btn btn-primary">Save</button>
                               <div id="msgSubmit" class="h3 hidden"></div> 
                               <div class="clearfix"></div>
                           </div>

             <?php  } ?>
                         
                       </form> 



</article> 
             </div>

             </div>
             </div>
             </div>
             </div>


<?php


include 'footer.php';


?>