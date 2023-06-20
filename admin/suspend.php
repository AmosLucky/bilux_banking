<?php
include 'admin_head.php';
$msg = "";

if(isset($_GET['v'])){
  $id = $_GET['v'];
  $n = $_GET['n'];


if(isset($_POST['suspend'])){

  $id = $_POST['id'];
  $reason = $_POST['suspend'];
  $sql = "UPDATE members set is_suspended = '1', suspension_reason = '$reason' where id = '$id' ";
  $result = mysqli_query($con,$sql);
  if( $result){
    $msg = '<div class="alert alert-success">Successfully suspended</div>';
  }else{
   $msg = '<div class="alert alert-danger">Failed</div>';

  }
}

            
        


?>




<div class="container">
   Suspend <?php echo $n ?>
    <article class="card-body">

             <form method="POST">
                <div class="form-group">
                  <div><?php echo $msg ?></div>
                 
                                
                            </div>
                                       <div class="form-group">
                                <input class="form-control" name="id" id="fname" type="hidden" value="<?php echo $id ?>">
                            </div>
                            <div class="form-group">
                              <textarea class="form-control" name="reason" placeholder="Reason for suspension"></textarea>
                            </div>
                            <!-- Input Field Ends -->
                            <!-- Input Field Starts -->
                            
                           



                         
                                        
                                     
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <button type="submit" name="suspend" class="btn btn-primary">suspend user</button>
                                            <div id="msgSubmit" class="h3 hidden"></div> 
                                            <div class="clearfix"></div>
                                        </div>
                                      
                                    </form> 



</article> 





	</div>



<?php
}else{
  echo "Please select a user you want to suspend";
}

include 'admin_footer.php';


?>