<?php
include '../con.php';
if(isset($_POST['delete'])){
  $id = $_POST['id'];

  $sql = "DELETE FROM members where id = '$id'";
$result = mysqli_query($con,$sql) or die("Cant delete ".mysqli_error($con));
   if($result){

            $msg =  '<div class="alert alert-success text-center">SUCCESSFULLY DELETED</div>';
         }else{
            $msg = '<div class="alert alert-danger text-center"> ERROR: USER CANT BE DELETED</div>';
         }

}

?>




<div class="container">
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

     $sql = "select * from members";
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
     	# code...
    

     ?>

      <tr>
        <td><?php echo $sn++; ?></td>
        <td><?php echo $username; ?></td>
        <!-- <td><?php //echo $referred_by; ?></td> -->
        <!--  <td><?php //echo $date; ?></td> -->
        <td><?php echo $balance; ?></td>
        <td><?php echo $ref_balance; ?></td>
         <!-- <td><?php// echo $bitcoin_wallet; ?></td>
          <td><?php// echo $etherum_wallet; ?></td> -->
           <td><?php echo $running_invest; ?></td>
        <td> <a href="user_details.php?v=<?php echo $id   ?>"><button class="btn btn-primary">
          
          <i class="fa fa-eye" aria-hidden="true"></i>

        </button></a></td>
        <td>
        	<button type="button" class="btn btn-danger " data-toggle="modal" data-target="#myModal<?php echo $id ?>"> 
            <i class="fa fa-trash" aria-hidden="true"></i>


           </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal<?php  echo $id?>" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">DELETE?</h4>
        </div>
        <div class="modal-body">
          <p>You are about to delete this user</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        <div class="modal-footer">
        	<form method="POST">
        		<input type="hidden" name="id" value="<?php echo $id ?>">
        <button name="delete" type="submit" class="btn btn-danger">Confirm Delete User</button>
          	</form>
        </div>
      </div>
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
include 'admin_footer.php';


?>