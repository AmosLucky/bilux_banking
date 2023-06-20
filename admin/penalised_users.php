<?php
include 'admin_head.php';
$msg = "";
if(isset($_POST['delete'])){
  $id = $_POST['id'];

  $sql = "UPDATE members set deleted = '1'  where id = '$id' order by id desc";
$result = mysqli_query($con,$sql) or die("Cant delete ".mysqli_error($con));
   if($result){

            $msg =  '<div class="alert alert-success text-center">SUCCESSFULLY DELETED</div>';
         }else{
            $msg = '<div class="alert alert-danger text-center"> ERROR: USER CANT BE DELETED</div>';
         }

}



if(isset($_GET['a'])){
  $id = $_GET['a'];
   $sql = "UPDATE members set deleted = '0'  where id = '$id' order by id desc";
$result = mysqli_query($con,$sql) or die("Cant delete ".mysqli_error($con));
   if($result){

            $msg =  '<div class="alert alert-success text-center">SUCCESSFULLY RESTORED</div>';
         }else{
            $msg = '<div class="alert alert-danger text-center"> ERROR: USER CANT BE DELETED</div>';
         }

}


if(isset($_GET['s'])){
  $id = $_GET['s'];
   $sql = "UPDATE members set is_suspended = '0'  where id = '$id' order by id desc";
$result = mysqli_query($con,$sql) or die("Cant delete ".mysqli_error($con));
   if($result){

            $msg =  '<div class="alert alert-success text-center">SUCCESSFULLY RESTORED</div>';
         }else{
            $msg = '<div class="alert alert-danger text-center"> ERROR: USER CANT BE DELETED</div>';
         }

}
?>




<div class="">
     <?php

 if(isset($_POST['delete'])){ ?>
    <div class=" text-center"><b class="p-3"> <h5><?php  echo $msg; ?></b> </h5></div>
    <?php } ?>
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
        <th>username</th>
        <!-- <th>referred_by</th> -->
        <!-- <th>registered on</th> -->
        <th>balance</th>
        <th>referal <br> balance</th>
        <!-- <th>bitcoin wallet</th>
        <th>etherum wallet</th> -->
         <th>Running <br>investment</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>S/N</th>
        <th>username</th>
       <!--  <th>referred_by</th> -->
        <!-- <th>registered on</th> -->
        <th>balance</th>
        <th>referal <br> balance</th>
        <!-- <th>bitcoin wallet</th>
        <th>etherum wallet</th> -->
         <th>Running <br> investment</th>
                    </tr>
                  </tfoot>
                  <tbody>
     <?php  

     $sql = "SELECT * from members where deleted = '1' || is_suspended = '1'";
      $sn = 1;
     $result = mysqli_query($con,$sql) or die("cant select members ".mysqli_error($con));
     while ($row = mysqli_fetch_array($result)) {
        $username = $row['username'];
        $referred_by = $row['referred_by'];
        $date = $row['date'];
        $balance =  $row['balance'];
        $ref_balance  = $row['referral_balance'];
        $id = $row['id'];
        $bitcoin_wallet = $row['bitcoin_wallet'];
        $etherum_wallet = $row['etherum_wallet'];
        $running_invest = $row['running_invest'];
         $is_suspended = $row['is_suspended'];
         $is_deleted = $row['deleted'];



        # code...
    

     ?>

      <tr>
        <td><?php echo $sn++; ?></td>
        <td><?php echo $username; ?></td>
        <!-- <td><?php //echo $referred_by; ?></td> -->
        <!--  <td><?php //echo $date; ?></td> -->
        <td><?php echo $balance; ?></td>
        <td><?php if($is_suspended){
          echo '<span class="badge badge-warning">suspension</span>';
        }else{
          echo '<span class="badge badge-danger">deleted</span>';

        } ?></td>
         <!-- <td><?php// echo $bitcoin_wallet; ?></td>
          <td><?php// echo $etherum_wallet; ?></td> -->
           <td><?php echo $running_invest; ?></td>
        <td> 
          
           <!--  ////////////////////////ACTION -->
            <div class="dropdown">
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    Action
  </button>
  <div class="dropdown-menu">
   
    <?php
    if($is_suspended){?>
       <a class="dropdown-item" href="penalised_users.php?s=<?php echo $id   ?>">Remove suspension</a>
    <?php } else{?>
       <a class="dropdown-item" href="penalised_users.php?a=<?php echo $id   ?>">
         Activate user
       </a>

    <?php  } ?>

    
  </div>
</div>
<!-- ///////////////////////////
 -->      </td>
     
      </tr>




     <?php  }  ?>
     
    </tbody>
  </table>
</div>
</div>
</div>
</div>



<?php
include 'admin_footer.php';


?>