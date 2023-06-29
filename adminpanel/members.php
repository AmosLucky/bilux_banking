<?php

require "header.php";
$sql = "SELECT *  From members ";
$type = "all";

if(isset($_GET['type'])){
  $type = $_GET['type'];
  switch($type){
    case "active":
      $sql = "SELECT * FROM members where active = '1' order by id desc";
      $type = "active";
      break;
    case "deactive":
      $sql = "SELECT * FROM members where deleted = '1' order by id desc";
      $type = "deactive";
      break;
    default:
      $sql = "SELECT * FROM members order by id desc";
      $type = "all";
     
  }



}

?>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    
    
    <!-- Main content -->
    <div class="content">
      
      
      <div class="card m-t-3">
      <div class="card-body">
      <h4 class="text-black"><?php echo $type ?> users</h4>
      <!-- <p>Data Table With Full Features</p> -->
      <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S/N</th>
                  <th>Username</th>
                  <th>Email</th>
                 
                  <th>Balance</th>
                  <th>Status</th>
                  <th>Referral</th>
                  <th>View</th>
                </tr>
                </thead>
                <tbody>

                <?php  

 $sn = 1;
$result = mysqli_query($con,$sql) or die("cant select members ".mysqli_error($con));
while ($row = mysqli_fetch_array($result)) {
   $username = $row['username'];
   $email = $row['email'];
   $referred_by = $row['referred_by'];
   $date = $row['date'];
   $balance =  $row['balance'];
   $ref_balance  = $row['referral_balance'];
   $id = $row['id'];
   $bitcoin_wallet = $row['bitcoin_wallet'];
   $etherum_wallet = $row['etherum_wallet'];
   $running_invest = $row['running_invest'];
   $active = $row['active'];

   # code...
   if($active = "1"){
    $status_widget = '<span class="label label-success ">Active</span>';
   }else{
    $status_widget = '<span class="label label-warnign">Deactive</span>';

   }


?>
      <tr>
        <td><?php echo $sn++; ?></td>
        <td><?php echo $username; ?></td>
        <td><?php echo $email; ?></td>
       
        <td>$<?php echo round($balance,3); ?></td>
        <td><?php echo $status_widget; ?></td>
        
        <td><?php echo $referred_by; ?></td>
        
           <td>
           <a class="btn  btn-primary" href="user_details.php?v=<?php echo $id   ?>">View</a>
           </td>
        <td> 
      </tr>

                <?php  }  ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>S/N</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Balance</th>
                  <th>Status</th>
                  <th>Referral</th>
                  <th>View</th>
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
