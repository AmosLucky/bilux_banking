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




  if(isset($_POST['delete'])){
    $id = $_POST['id'];
 
 //   $sql = "DELETE FROM transactions where id = '$id'";
 // $result = mysqli_query($con,$sql) or die("Cant delete ".mysqli_error($con));
   $investment = $model->selectFromTable("investments","id='$id'");
   if($investment['status']){
       $investment = $model->selectFromTable("investments","id='$id'")['msg'][0];
   $profit = $investment['profit'];
   $amount = $investment['amount'];
    $user_id = $investment['user_id'];
 
    $details = $model->selectFromTable("members","id='$user_id'")['msg'][0];
    $old_balance = $details['balance'];
    $new_balance = $old_balance + $amount;
    $old_profit = $details['profit'];
    $new_profit = $old_profit + $profit;
 
 
   $params = array("profit" => $new_profit,"balance"=>$new_balance);
   $updateUser = $model->updateTable("members",$params,$user_id);
   if($updateUser['status']){
     $params = array("deleted"=>1);
     $updateInvestment = $model->deleteFromTable("investments","id='$id'");
     //print_r($updateInvestment);
     if($updateInvestment['status']){
 
        $msg =  '<div class="alert alert-success text-center">SUCCESSFULLY DELETED</div>';
      }else{
       $msg = '<div class="alert alert-danger text-center"> ERROR: An erro occoured</div>';
      }
 
   }else{
             $msg = '<div class="alert alert-danger text-center"> ERROR: Cant be removed</div>';
     }
  // print_r($updateUser);
  
 
 }else{
             $msg = '<div class="alert alert-danger text-center"> ERROR: no row detcted </div>';
     }
 }



?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    
    <!-- Content Header (Page header) -->
    <div class="content-header">
        
    <div class="row">
            <div class="col-lg-12">
                <div class="container">
                <?php echo $msg ?>
                </div>
              
                  <!-- Basic Card Example -->



                  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Active Investment</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                     <th>S/N</th>
        <th>username</th>
        <th> Amount</th>
        <th>Plan </th>
           <th>Days </th>
        <th>Profit</th>
        <th></th>
                    </tr>
                  </thead>
                  <tfoot>
                      <th>S/N</th>
        <th>username</th>
        <th> Amount</th>
        <th>Plan </th>
        <th>Days </th>
        <th>profit</th>
        <th> </th>
                    
                  </tfoot>
                  
                  <tbody>
     <?php  

     $sql = "SELECT * from investments where deleted = '0' && is_hidden = '0'  order by id desc";
      $sn = 1;
      $username = "";
     $result = mysqli_query($con,$sql) or die("cant select transactions ".mysqli_error($con));
     while ($row = mysqli_fetch_array($result)) {
      $username = $row['username'];
      $id = $row['id'];
      $plan_id = $row['plan_id'];
      $running_days  = $row['running_days'];
      $profit = $row['profit'];
      $plan_name = $row['plan_name'];
      $amount = $row['amount'];
       $user_id = $row['user_id'];
       $profit_days = $row['profit_days'];
       $active = $row['active'];
       $capital_running_hours = $row['capital_running_hours'];
       $status = "";
       if(!$active){
        $status = "Paused";

       }
       $days = round($capital_running_hours /24);

       $sql_r = "SELECT username FROM members WHERE id = '$user_id'";
       $res = mysqli_query($con,$sql_r);
       while($row1 = mysqli_fetch_array($res)){
        $username = $row1['username'];
       }

      
    

     ?>

      <tr>
        <td><?php echo $sn++; ?></td>
        <td><?php echo $username; ?> <span class="color:red"><?php echo $status; ?></span></td>
        <!-- <td><?php //echo $balance; ?></td> -->
         <td><?php echo $amount; ?></td>
         <td><?php echo $plan_name; ?></td>
        
        <td><?php echo $days."days " ?>(<?php echo $capital_running_hours." hrs "; ?>)</td>
       
        <td><?php echo round($profit,3); ?></td>
         
        <td> 
        <!-- <a class="" href="investors.php?r=<?php echo $id ?>">
        <button class="btn btn-danger">Remove</button>
    </a> -->

    <!-- <form method="POST">
             <input type="hidden" name="id" value="<?php echo $id ?>">
            
            <button class="btn btn-danger" name="delete" type="submit"> Delete </button>

    </form> -->
          




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
