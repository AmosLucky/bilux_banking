<?php
include 'admin_head.php';
$msg = "";

if(isset($_GET['v'])){
  $id = $_GET['v'];
  $n= $_GET['n'];




if(isset($_POST['add_fund'])){
   $invest_date = date(" D d M h:m");
   $status = "approved";
   $user_id = $_POST['id'];
   $username = $_POST['username']; 
   $amount = $_POST['amount']; 
   $wallet = $_POST['wallet'];
   
    $query = "UPDATE members set blocked_balance = blocked_balance + $amount where id = '$user_id'";
 
   $result = mysqli_query($con,$query) or die("Can not submit ".mysqli_error($con));
   if( $result){
    $msg = '<div class="alert alert-success">Successfully Added</div>';
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
        'Reward',
        'Reward'


      )";
  $result = mysqli_query($con,$sql) or die("Can not submit ".mysqli_error($con));
  if( $result){
    $msg = '<div class="alert alert-success">Successfully Added</div>';
  }else{
   $msg = '<div class="alert alert-danger">Failed</div>';

  }

}
 
            
        


?>




<div class="container">
    
    <article class="card-body">
      <div><?php echo "Fund ".$n ?></div>

             <form method="POST">
                <div class="form-group">
                  <div><?php echo $msg ?></div>
                 
                                
                            </div>
                                       <div class="form-group">
                                <input class="form-control" name="id" id="fname" type="hidden" value="<?php echo $id ?>">

                            </div>
                            <div class="form-group">
                              <input class="form-control"  name="username" id="fname" type="hidden" value="<?php echo $n ?>">
                            </div>
                            <div class="form-group">
                              <input class="form-control" required name="amount" id="fname" type="number" placeholder="amount" >
                            </div>
                            <div class="form-group">
                              <select name="wallet"  class="form-control" required>
                                <option disabled="">Channel</option>
                                 <option>USDT</option>
                                <option >Bitcoin</option>
                                 <option >Ethereum</option>
                                 
                                 <option>Dogecoin</option>
                                 <option>Litecoin</option>
                                
                              </select>
                            </div>

                            
                            <!-- Input Field Ends -->
                            <!-- Input Field Starts -->
                            
                           



                         
                                        
                                     
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <button type="submit" name="add_fund" class="btn btn-primary">
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
  echo "Please select a user you want to add fund";
}

include 'admin_footer.php';


?>