<?php
include 'admin_head.php';
$msg = "";
if(isset($_GET['d'])){
  $id = $_GET['d'];

  $sql = "DELETE  from payment_methods  where id = '$id' ";
$result = mysqli_query($con,$sql) or die("Cant delete ".mysqli_error($con));
   if($result){

            $msg =  '<div class="alert alert-success text-center">SUCCESSFULLY DELETED</div>';
         }else{
            $msg = '<div class="alert alert-danger text-center"> ERROR: USER CANT BE DELETED</div>';
         }

}





?>




<div class="">
    
    <!-- <table class="table table-striped">
    <thead>
      <tr>
        <th>S/N</th>
        <th>username</th>
        <th>referred_by</th>
        <th>registered on</th>
        <th>balance</th>
        <th>referal balance</th>
        <th>bitcoin wallet</th>
        <th>etherum wallet</th>
         <th>Running investment</th>
      </tr>
    </thead>
    <tbody> -->
       <!-- DataTales Example -->
       <div><?php echo $msg  ?></div>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">All Users</h6>
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
        <th>Qr</th>
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
        <th>Qr</th>
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
        <td><img src="../uploads/<?php echo $qr_code; ?>" width="150"></td>
       
           <td>
                <div class="dropdown">
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    Action
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="add_payment_method.php?v=<?php echo $id   ?>">Edit</a>
    <a class="dropdown-item" href="all_payment_method.php?d=<?php echo $id  ?>">Delete</a>
    
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



<?php
include 'admin_footer2.php';


?>