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
    <?php echo $msg ?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        
    <div class="row">
            <div class="col-lg-12">
              
                  <!-- Basic Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Transaction History </h6>
                </div>
                <div class="card-body">
                   <div class="table-responsive">
                <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
                  <thead>
                            
                    <tr>
                      <th>S/N</th>
                      <th>user</th>
                      <th>amount</th>
                      
                      <th>Transaction Type</th>
                       <th>Status</th>
                        <th>Wallet</th>
                         <th>date</th>
                         <th></th>
                      
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                     <th>S/N</th>
                      <th>user</th>
                      <th>amount</th>
                      
                      <th>Transaction Type</th>
                       <th>Status</th>
                        <th>Wallet</th>
                         <th>date</th>
                         <th></th>
                    </tr>
                  </tfoot>
                  <tbody>
                   

                    <?php
      


      if(isset($_GET['user'])){
        $user_id = $_GET['user'];
        $sql = "select * from  transactions  order by id desc"; 
      }else{
           $sql = "select * from  transactions  order by id desc"; 
      }
      $result = mysqli_query($con,$sql)  or die("Error getting transactions ".mysqli_error($con));
      $sn = 0;
      while ($row = mysqli_fetch_array($result)) {

        $sn++;
        $user = "";

        # code...
        $date = $row['invest_date'];
        $amount = $row['amount'];
        $type = $row['transaction_type'];
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
        <td><?php  echo "$".$amount ?></td>
        <td><?php  echo $type ?></td>
        <td><?php  echo $status ?></td>
        <td><?php  echo $wallet ?></td>
         
         <td><?php  echo $date ?></td>


         
          <td>
            <a href="transactions.php?d=<?php echo $id ?>">
              <button class="btn btn-danger">delete</button>
            </a>
          </td>
      </tr>

      <?php
      }


      ?>
       

                      </tbody>
                </table>
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
