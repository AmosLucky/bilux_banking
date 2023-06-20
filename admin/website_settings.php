<?php
include 'admin_head.php';
$msg = "";



// if(isset($_POST['suspend'])){

//   $id = $_POST['id'];
//   $reason = $_POST['suspend'];
//   $sql = "UPDATE members set is_suspended = '1', suspension_reason = '$reason' where id = '$id' ";
//   $result = mysqli_query($con,$sql);
//   if( $result){
//     $msg = '<div class="alert alert-success">Successfully suspended</div>';
//   }else{
//    $msg = '<div class="alert alert-danger">Failed</div>';

//   }
// }

//$sql = "SELECT * FROM company ";
$company_name = "";
$company_email = "";
$company_phone = "";
$company_address = "";
$domain =  "";
$com_id = 1;




if(isset($_POST['update'])){
   $company_name = $_POST['company_name'];
$company_email = $_POST['company_email'];
$company_phone = $_POST['company_phone'];
$company_address = $_POST['company_address'];
 //$company_eth_address =  $post['company_eth_address'];
 //$company_btc_address = $post['company_btc_address']; 
 $domain = $_POST['domain']; 
 $id = $_POST['id']; 
 $company_title = $_POST['company_title'];
   $company_contact_widget = mysqli_real_escape_string($con,$_POST['company_contact_widget']);

   if(strlen($company_contact_widget)>10){
                              $query = "UPDATE company set company_name = '$company_name',
                               company_email = '$company_email', 
                               company_phone = '$company_phone',
                               company_address = '$company_address',
                               domain = '$domain',
                               company_title = '$company_title',
                               company_contact_widget = '$company_contact_widget'
                                where id = '$id'";

                              }else{

                                $query = "UPDATE company set company_name = '$company_name',
                               company_email = '$company_email', 
                               company_phone = '$company_phone',
                               company_address = '$company_address',
                               domain = '$domain',
                               company_title = '$company_title'
                                where id = '$id'";

                              }

 

  $result =  mysqli_query($con,$query) or die(mysqli_error($con));
  if($result){
    $msg = '<div class="alert alert-success text-center">Sucessfully Saved</div>';

  } else{
    echo mysqli_error($con);
    $msg = '<div class="alert alert-danger text-center">Failed</div>';

  }                            

}


$sql = "SELECT * FROM company where id = '$com_id'";
$result =  mysqli_query($con,$sql) or mysqli_error($con);


while ($row = mysqli_fetch_array($result)) {


 $company_name = $row['company_name'];
$company_email = $row['company_email'];
$company_phone = $row['company_phone'];
$company_address = $row['company_address'];
 $company_eth_address =  $row['company_eth_address'];
 $company_btc_address = $row['company_btc_address']; 
 $domain = $row['domain']; 
  $id = $row['id']; 

   $company_title = $row['company_title'];
   $company_contact_widget = $row['company_contact_widget'];

    # code...
}
            
        


?>




<div class="container">
  Company Settings
    <article class="card-body">

             <form method="POST">
                <div class="form-group">
                  <div><?php echo $msg ?></div>
                 
                                
                            </div>
                            <input type="hidden" name="id" value="<?php echo $com_id ?>">
                                       <div class="form-group">
                                <input class="form-control" name="id" id="fname" type="hidden"
                                
                                value="<?php echo $id ?>">
                            </div>
                            <div class="form-group">
                              <label>Name</label>
               <input class="form-control" name="company_name"  type="text" value="<?php echo $company_name ?>">
                              
                            </div>
                            <div class="form-group">
                              <label>Title</label>
               <input class="form-control" name="company_title"  type="text" value="<?php echo $company_title ?>">
                              
                            </div>
                            <div class="form-group">
                              <label>Phone</label>
               <input class="form-control" name="company_phone"  type="text" value="<?php echo $company_phone ?>">
                              
                            </div>
                             <div class="form-group">
                               <label>Email</label>
               <input class="form-control" name="company_email"  type="text" value="<?php echo $company_email ?>">
                              
                            </div>
                             <div class="form-group">
                               <label>Address</label>
              <textarea class="form-control" name="company_address"><?php echo $company_address ?></textarea>
                              
                            </div>
                            <div class="form-group">
                               <label>Domain name</label>
              <input type="text" name="domain" value="<?php echo $domain ?>" class="form-control">
                              
                            </div>

                        <div class="form-group">
                               <label>chat widget (Change smartsupp or Tawk here )</label>
              <input type="text" style="height: 100px;" name="company_contact_widget"  class="form-control">
                              
                            </div>
        


                            <!-- Input Field Ends -->
                            <!-- Input Field Starts -->
                            
                           



                         
                                        
                                     
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <button type="submit" name="update" class="btn btn-primary">Save</button>
                                            <div id="msgSubmit" class="h3 hidden"></div> 
                                            <div class="clearfix"></div>
                                        </div>
                                      
                                    </form> 



</article> 





	</div>



<?php


include 'admin_footer.php';


?>