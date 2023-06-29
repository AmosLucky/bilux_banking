<?php

require "header.php";

$msg = "";


// if(isset($_GET['d'])){
//   $id = $_GET['d'];
//   $sql = "DELETE FROM transactions where id = '$id'";
//   $result = mysqli_query($con,$sql);
//   if($result){
//     $msg = '<div class="alert alert-danger">Deleted successfuly</div>';
//   }
// }

if(isset($_POST['decline'])){
  $id = $_POST['id'];
  

  //$wallet = $_POST['wallet'];
  $user_id = $_POST['user_id'];
  ///$user_name = $_POST['username'];
  $amount = $_POST['amount'];

  $sql = "SELECT balance from members where id = '$user_id'";
    $result0 = mysqli_query($con,$sql) or die("Error ".mysqli_error($con));
    if($result0){

      while ($row = mysqli_fetch_array($result0)) {
     $balance = $row['balance'];
      # code...
    }
     $new_balance = $balance + $amount;
     $sql = "UPDATE members set balance = '$new_balance' where id = '$user_id'";
     $result = mysqli_query($con,$sql) or die("Error ".mysqli_error($con));

        if($result){


          $sql = "DELETE FROM transactions where id = '$id'";
  $result = mysqli_query($con,$sql);
  if($result){
    $msg = '<div class="alert alert-danger">Deleted successfuly</div>';
  }
          


        }

    }else{
      $msg = '<div class="alert alert-danger">User not found</div>';
    }

  

 
     

}





if(isset($_POST['approve'])){
    $id = $_POST['id'];
    $approved_date = date(" D d M h:m");
    //$wallet = $_POST['wallet'];
    $user_id = $_POST['user_id'];
    //$user_name = $_POST['username'];
    $amount = $_POST['amount'];
    $status = $_POST['status'];
    // $status;
    $code = $id."CMF-GUS33-".$_POST['user_id'];
    if($status != "approved" || $status != "successful"){
  
  
        if(1==1){
          //////////////////////////////////
  
           $sql = "UPDATE transactions SET status = 'approved' where id ='$id'";
    $result = mysqli_query($con,$sql) or die("Can not submit ".mysqli_error($con));
    if( $result){
      $msg = '<div class="alert alert-success text-center"> SUCCESSFULLY APPROVED</div>';
      $email = "";
      //user    100  
    $sql = "SELECT email,username from members where id = '$user_id'";
    $result = mysqli_query($con,$sql) or die("Can not select email ".mysqli_error($con));
    while ($row = mysqli_fetch_array($result)) {
       $email = $row['email'];
       $username = $row['username'];
      # code...
    }
  
  
  
  
  
       //SendMail($email,"Withdrawal approved",$msg2);
  
  /////////////////////////////////
  
  //$to = "$email"; // enter the users email here
  $subject = 'Your funds have been sent';
  //$from = $company_email; /// enter the email of you host example admin@netbaba.com
   
  // Compose a simple HTML email message
  $message = "<!DOCTYPE html>
  <html>
  <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title></title>
    <style type='text/css'>
      body{
        margin: 20px;
      }
      .head{
        height: 50px;
        padding: 20px;
        background-color: #152238;
  
      }
      .body{
        padding: 20px;
        background-color: #F8F4E6;
      }
      .logo{
        height: 50px;
      }
      .footer{
        background-color: #152238;
        height: 100px;
        color: white;
        padding: 20px;
  
      }
      .block{
        margin-top: 5px;
      }
    </style>
  </head>
  <body>
    <div class='head'>
      $company_logo2
      
    </div>
    <div class='body'>
      
    
  
      <h2>
        Hello $username
  
      </h2>
  
    You have successfully withdrawn USD$amount into your wallet address.  
    <br> Transaction:ID $code. <br>
     
   
  
  <br>
      </p>
  
      
    </div>
  
    <div class='footer'>
      <p>
        Support is available 24/7  <br>             
  Best Regards, $company_name the
  AU: + <br>
  $company_email
      </p>
      
    </div>
  
  </body>
  </html>
  ";
   $msg2 = $message; 
  //mail($to, $subject, $message, $headers);
  require "../mail.php"; 
   
  
  /////////////////////END OF EMAIL//////////////
  
  
  
  
  
    }
  
  //////////////
  
  
  
  
        }
  
  
      }else{
        $msg = '<div class="alert alert-success text-center"> Already approved</div>';
  
      }
   
    
  
  }








$sql = "SELECT * FROM transactions where transaction_type = 'Withdrawal' order by id desc ";
$type = "all";

if(isset($_GET['type'])){
  $type = $_GET['type'];
  switch($type){
    case "completed":
      $sql = "SELECT * FROM transactions where transaction_type = 'Withdrawal' and status ='approve' order by id desc";
      $type = "completed";
      break;
    case "pending":
      $sql = "SELECT * FROM transactions where transaction_type = 'Withdrawal' and status ='pending' order by id desc";
      $type = "pending";
      break;
    default:
    $sql = "SELECT * FROM transactions where transaction_type = 'Withdrawal' order by id desc ";

      $type = "all";
     
  }

  

}







   
if(isset($_GET['t_id'])){
  
  $id = $_GET['t_id'];
  $sql = "SELECT * FROM transactions where id = '$id'";
  $user = "";
  $result = mysqli_query($con,$sql)  or die("Error getting transactions ".mysqli_error($con));


$sn = 0;
$num_row = mysqli_num_rows($result);
if($num_row == 0){
  return;


}
while ($row = mysqli_fetch_array($result)) {

# code...
$date = $row['invest_date'];
$amount = $row['amount'];
//$type = $row['transaction_type'];
$wallet = $row['wallet_type'];
$status =  $row['status'];
$user_id =  $row['user_id'];
$id = $row['id'];
$wallet_address = $row['address'];

$invest_date  = $row['invest_date'];
$id = $row['id'];
$user_id = $row['user_id'];
$transaction_type = $row['transaction_type'];
$plan_name = $row['plan_name'];
$plan_id = $row['plan_id'];
$payment_id = $row['payment_id'];
$payment_name = $row['payment_name'];

$sql1 = "SELECT username from members where id = '$user_id'";
$result1 = mysqli_query($con,$sql1)  or die("Error getting transactions ".mysqli_error($con));
while ( $row1 = mysqli_fetch_array($result1)) {
  $user = $row1['username'];
  # code...
}





}



}else{
  return;

}


?>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <?php echo $msg ?>
    
    
    <!-- Main content -->
    <div class="content">

    <div class="row">
                  <div class="col-xl-12">
                   <div class="card custom-card">
            <div class="card-header justify-content-between blue-head" style="background-color: blue !important; color: white !important;"> 
                        <div class="card-title"> Transaction Details </div>  
                  </div> 
                  <div class="card-body"> 
                  <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <tr>
                      <th>Username</th>
                      <td><?php echo $user ?></dt>
                      
                      
                    </tr>
                    <tr>
                    <th>Amount</th>
                      <td>$<?php echo number_format($amount) ?></dt>

                    </tr>
                    <tr>
                    <th>Time</th>
                      <td><?php echo $date ?></dt>
                    </tr>
                    <tr>
                    <th>Status</th>
                      <td><?php echo $status ?></dt>
                    </tr>
                    <tr>
                    <th>Wallet type</th>
                      <td><?php echo $wallet ?></dt>
                    </tr>
                    <th>Wallet Address</th>
                      <td><?php echo $wallet_address ?></dt>
                    </tr>
                  </table>
              </div>
              <?php if($status == "pending"){ ?>

                <form method="POST">
            <input type="number" name="amount" value="<?php echo $amount ?>" class="form-control mb-5">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
             <input type="hidden" name="username" value="<?php echo $username ?>">
              <input type="hidden" name="plan_name" value="<?php echo $plan_name ?>">
               <input type="hidden" name="plan_id" value="<?php echo $plan_id ?>">
               <input name="status"  type="hidden"  value="<?php echo $status ?>">
          <button class="btn btn-info" type="submit"  name="approve">Approve Withdrawal </button>
          </form>

               
                <?php } ?>
                  
                 </div> 
                  </div> 
               </div>
</div>
      
     
    <!-- /.content --> 
  </div>
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
 