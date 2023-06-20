<?php
include 'admin_head.php';
$msg = "";

if(isset($_POST['add_fund'])){
  $amount = $_POST['amount'];

  $sql = "UPDATE company set company_eth_address = '$amount' where id = '1'";
  $r = mysqli_query($con,$sql) or die(mysqli_error($con));
  if($r){

    
    $msg = '<div class="alert alert-success">Successfully Added</div>';
    $company_eth_address = $amount;
  }else{

   $msg = '<div class="alert alert-danger">Failed</div>';

  }
}

?>




<div class="container">
    
    <article class="card-body">
      <div></div>

             <form method="POST">
                <div class="form-group">
                  <div><?php echo $msg ?></div>
                 
                                
                            </div>
                            <h1>$<?php echo $company_eth_address ?>(currently)</h1>
                                       
                            
                            <div class="form-group">
                              <input class="form-control" required name="amount" id="fname" type="number" placeholder="amount" >
                            </div>
                           

                            
                            <!-- Input Field Ends -->
                            <!-- Input Field Starts -->
                            
                           



                         
                                        
                                     
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <button type="submit" name="add_fund" class="btn btn-primary">
                                              Add 
                                            </button>
                                            <div id="msgSubmit" class="h3 hidden"></div> 
                                            <div class="clearfix"></div>
                                        </div>
                                      
                                    </form> 



</article> 





  </div>



<?php

include 'admin_footer.php';


?>