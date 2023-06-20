<?php
include 'admin_head.php';
$msg = "";

if(isset($_GET['v'])){
  $id = $_GET['v'];
  $n= $_GET['n'];


if(isset($_POST['suspend'])){

  $id = $_POST['id'];
  $reason = $_POST['suspend'];
  $sql = "UPDATE members set is_suspendedn = '1', suspension_reason = '$reason' where id = '$id' ";
  $result = mysqli_query($con,$sql);
  if( $result){
    $msg = '<div class="alert alert-success">Successfully suspended</div>';
  }else{
   $msg = '<div class="alert alert-danger">Failed</div>';

  }
}

if(isset($_POST['deduct_fund'])){
   $invest_date = date(" D d M h:m");
   $status = "approved";
   $user_id = $_POST['id'];
   $username = $_POST['username']; 
   $amount = $_POST['amount']; 
   $wallet = $_POST['wallet']; 
   $fund_type = $_POST['fund_type'];
   $description = $_POST['description'];
   if($fund_type == 1){
    $query = "UPDATE members set referral_balance = referral_balance - $amount, balance = balance 
    - $amount where id = '$user_id'";
   }else if($fund_type == 2){
    $query = "UPDATE members set  balance = balance 
    - $amount where id = '$user_id'";
   }else if($fund_type == 3){
    $query = "UPDATE members set running_invest = running_invest - $amount where id = '$user_id'";
   }else if($fund_type == 4){
    $query = "UPDATE members set profit = profit - $amount where id = '$user_id'";
   }
   $result = mysqli_query($con,$query) or die("Can not submit ".mysqli_error($con));
   if( $result){
    $msg = '<div class="alert alert-success">Successfully Deducted</div>';
  }else{
   $msg = '<div class="alert alert-danger">Failed</div>';

  }


  $sql = "insert into transactions (user_id, user_name, amount,wallet_type,status,invest_date,transaction_type,description)
        value(
        '$user_id',
        '$username',
        '$amount',
        '$wallet',
        '$status',
        '$invest_date',
        'withdrawal',
        '$description'


      )";
  $result = mysqli_query($con,$sql) or die("Can not submit ".mysqli_error($con));
  if( $result){
    $msg = '<div class="alert alert-success">Successfully Deducted</div>';
  }else{
   $msg = '<div class="alert alert-danger">Failed</div>';

  }

}
 
            
        


?>




<div class="container">
    
    <article class="card-body">
      <div><?php echo "Deduct ".$n."s Account" ?></div>

             <form method="POST">
                <div class="form-group">
                  <div><?php echo $msg ?></div>
                 
                                
                            </div>
                                       <div class="form-group">
                                <input class="form-control" name="id" id="fname" type="hidden" value="<?php echo $id ?>">

                            </div>
                            <div class="form-group">
                              <input class="form-control" name="username" id="fname" type="hidden" value="<?php echo $n ?>">
                            </div>
                            <div class="form-group">
                              <input class="form-control" name="amount" id="fname" type="number" placeholder="amount" >
                            </div>
                            <div class="form-group">
                              <select name="wallet"  class="form-control">
                                <option disabled="">Channel</option>
                                <option >Bitcoin</option>
                                 <option >Ethereum</option>
                                
                              </select>
                            </div>
                            <div class="form-group">
                              <textarea class="form-control" name="description" placeholder="Reason for deduction"></textarea>
                            </div>

                            <div class="form-group">
                              <select name="fund_type"  class="form-control">
                                <option value="1">Referal bonus</option>
                                 <option value="2">Balance</option>
                                 <option value="3">Runing Investment</option>
                                 <option value="4">Profit</option>
                                
                              </select>
                            </div>
                            <!-- Input Field Ends -->
                            <!-- Input Field Starts -->
                            
                           



                         
                                        
                                     
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <button type="submit" name="deduct_fund" class="btn btn-primary">
                                              Add Fund
                                            </button>
                                            <div id="msgSubmit" class="h3 hidden"></div> 
                                            <div class="clearfix"></div>
                                        </div>
                                      
                                    </form> 



</article> 





	</div>



<?php
}else{
  echo "Please select a user you want to deduct fund";
}

include 'admin_footer.php';


?>