<?php

require "header.php";

$msg = "";

if(isset($_GET['d'])){
    $id = $_GET['d'];
    $sql = "DELETE FROM transactions where id = '$id'";
    $result = mysqli_query($con,$sql);
    if($result){
     $msg = '<div class="alert alert-danger">Deleted successfuly</div>';
    }
  }



?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   
    <!-- Content Header (Page header) -->
    <div class="content-header">
        
    <div class="row">
            <div class="col-lg-12">

<div><?php echo $msg  ?></div>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">All payment</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                     <th>S/N</th>
        <th>Name</th>
        <!-- <th>referred_by</th> -->
        <!-- <th>registered on</th> -->
        <th>Address</th>
       
        <td></td>
        <!-- <th>bitcoin wallet</th>
        <th>etherum wallet</th> -->
         
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>S/N</th>
        <th>Name</th>
       <!--  <th>referred_by</th> -->
        <!-- <th>registered on</th> -->
        <th>Address</th>
      
        <!-- <th>bitcoin wallet</th>
        <th>etherum wallet</th> -->
<!--          <th>Running <br> investment</th>
 --> 
 <td></td>               
     </tr>
                  </tfoot>
                  <tbody>
     <?php  

     $sql = "SELECT * from payment_methods ";
      $sn = 1;
     $result = mysqli_query($con,$sql) or die("cant select members ".mysqli_error($con));
     while ($row = mysqli_fetch_array($result)) {
        $name = $row['name'];
        $address = $row['address'];
        $date = $row['reg_date'];
        $qr_code =  $row['qr_code'];
        // $ref_balance  = $row['referral_balance'];
         $id = $row['id'];
        // $bitcoin_wallet = $row['bitcoin_wallet'];
        // $etherum_wallet = $row['etherum_wallet'];
        // $running_invest = $row['running_invest'];
        //  $is_suspended = $row['is_suspended'];
        //  $is_deleted = $row['deleted'];



        # code...
    

     ?>

      <tr>
        <td><?php echo $sn++; ?></td>
        <td><?php echo $name; ?></td>
        <!-- <td><?php //echo $referred_by; ?></td> -->
        <!--  <td><?php //echo $date; ?></td> -->
        <td><?php echo $address; ?></td>
       
       
           <td>
                <div class="dropdown">
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    Action
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="view_payment_method.php?v=<?php echo $id   ?>">View</a>
    <a class="dropdown-item" href="payment_methods.php?d=<?php echo $id  ?>">Delete</a>
    
  </div>
</div>
           </td>
       
      </tr>




     <?php  }  ?>
     
    </tbody>
  </table>
</div>
</div>
</div>
</div>


</div>
            
            </div>
  
         
          <!-- /.container-fluid -->
  
      <div>
  </div>
  
  <?php 
  
  require "footer.php";
  
  ?>
  