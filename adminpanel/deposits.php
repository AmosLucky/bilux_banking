<?php

require "header.php";

$msg = "";


if(isset($_POST['d'])){
  $id = $_POST['id'];
  $user_id = $_POST['user_id'];
  $amount = $_POST['amount'];
  $status = $_POST['status'];
  if($status == "approved" ){
  $sql1 = "UPDATE members set balance = balance - '$amount' where id = '$user_id' ";
  $rs = mysqli_query($con,$sql1) or die(mysqli_error($con));
  if($rs){
  $sql = "DELETE FROM transactions where id = '$id'";
  $result = mysqli_query($con,$sql);
  if($result){
    $msg = '<div class="alert alert-danger">Deleted successfuly</div>';
  }
}
  }else{
    $sql = "DELETE FROM transactions where id = '$id'";
  $result = mysqli_query($con,$sql);
  if($result){
    $msg = '<div class="alert alert-danger">Deleted successfuly</div>';
  }

  }
}


$sql = "SELECT * FROM transactions where transaction_type = 'Deposit' order by id desc ";

$type = "all";

if(isset($_GET['type'])){
  $type = $_GET['type'];
  switch($type){
    case "completed":
      $sql = "SELECT * FROM transactions where transaction_type = 'Deposit' and status ='approved' order by id desc";
      $type = "completed";
      break;
    case "pending":
      $sql = "SELECT * FROM transactions where transaction_type = 'Deposit' and status ='pending' order by id desc";
      $type = "pending";
      break;
    default:
    $sql = "SELECT * FROM transactions where transaction_type = 'Deposit' order by id desc ";

      $type = "all";
     
  }



}


?>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    
    
    
    <!-- Main content -->
    <div class="content">
    <?php echo $msg ?>
      
      
      <div class="card m-t-3">
      <div class="card-body">
      <h4 class="text-black"><?php echo $type ?> Deposit</h4>
      <!-- <p>Data Table With Full Features</p> -->
      <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S/N</th>
                  <th>Sender</th>
                  <th>Amount</th>
                  <th>Time</th>
                  <th>Status</th>
                  <th>View / Delete</th>
                </tr>
                </thead>
                <tbody>
                
                <?php 
                  $result = mysqli_query($con,$sql)  or die("Error getting transactions ".mysqli_error($con));


$sn = 0;
while ($row = mysqli_fetch_array($result)) {

  $sn++;
  $user = "";

  # code...
  $date = $row['invest_date'];
  $amount = $row['amount'];
  //$type = $row['transaction_type'];
  $wallet = $row['wallet_type'];
  $status =  $row['status'];
  $user_id =  $row['user_id'];
  $id = $row['id'];

  $sql1 = "SELECT username from members where id = '$user_id'";
  $result1 = mysqli_query($con,$sql1)  or die("Error getting transactions ".mysqli_error($con));
  while ( $row1 = mysqli_fetch_array($result1)) {
    $user = $row1['username'];
    # code...
  }


                  ?>
                <tr>
                  <td><?php  echo $sn ?></td>
                  <td><?php  echo $user ?></td>
                  <td>$<?php  echo number_format($amount) ?></td>
                  <td><?php  echo $date ?></td>
                  <td><?php  echo $status ?></td>
                  <td style="display:flex">
                    <a href="view_deposit.php?t_id=<?php echo $id ?>"><button class="btn btn-primary">View</button></a>
                    
                    
                    <form method="POST">
                    <input type="hidden" name="amount" value="<?php echo $amount ?>">
                    <input type="hidden" name="status" value="<?php echo $status ?>">
                      <input type="hidden" name="id" value="<?php echo $id ?>">
                      <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                      <button type="submit" name="d" class="btn btn-danger">Delete</button>

                    </form>
                  </td>
                </tr>

                

               
                <?php } ?>
                </tbody>
                <tfoot>

                <tr>
                  <th>S/N</th>
                  <th>Sender</th>
                  <th>Amount</th>
                  <th>Time</th>
                  <th>View / Delete</th>
                </tr>

                
                </tfoot>
              </table>
                  </div>
      </div></div>
    </div>
    <!-- /.content --> 
  </div>

  <?php

  require "footer.php";
  ?>
 


<script src="dist/plugins/datatables/jquery.dataTables.min.js"></script> 
<script src="dist/plugins/datatables/dataTables.bootstrap.min.js"></script> 
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

<script>
$("table").tableExport({formats: ["xlsx","xls", "csv", "txt"],    });
</script>
</body>

<!-- Mirrored from uxliner.net/xtreamer/demo/main/table-data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Jun 2023 17:12:13 GMT -->
</html>
