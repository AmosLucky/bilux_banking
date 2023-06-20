<?php
include "admin_head.php";
if(isset($_GET['d'])){
  $id = $_GET['d'];
  $sql = "DELETE FROM transactions where id = '$id'";
  $result = mysqli_query($con,$sql);
  if($result){
    echo "Deleted successfuly";
  }
}

if(isset($_POST['set_date'])){
  $id = $_POST['id'];
  $date = $_POST['date'];
  if(strlen($date) > 3){
    $sql = "UPDATE transactions set invest_date = '$date' where id = '$id'";
    $res = mysqli_query($con,$sql) or die("Mysqli Error ".mysqli_error($con));
    if($res){
      echo '<div class="alert alert-info">successful</div>';
    }

  }
}

?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Transactions </h1>
          </div>

          


         <!--  /////////////////////2/////////////////////////// -->

          <div class="row">
            <div class="col-lg-12">
              
                  <!-- Basic Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Transaction (ROI) History </h6>
                </div>
                <div class="card-body">
                   <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
        $sql = "select * from  transactions where user_id = '$user_id' order by id desc"; 
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
         <td>



         <div class="container">
 
  <!-- Button to Open the Modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#<?php  echo $sn ?>">
    <?php  echo $date ?>
  </button>

  <!-- The Modal -->
  <div class="modal" id="<?php  echo $sn ?>">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit Date</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form method="POST">
            <input type="hidden" name="id" value="<?php echo $id ?>">

            <input type="date" name="date" class="form-control">
            <br>
            <input type="submit" name="set_date" value="Set Date" class="form-control btn-primary">

            
          </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>

           


         </td>
          <td>
            <a href="history.php?d=<?php echo $id ?>">
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

      </div>
      <!-- End of Main Content -->
      

    <?php
    include "admin_footer.php";


    ?>