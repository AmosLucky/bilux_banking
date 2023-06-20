<?php
include 'admin_head.php';
$msg ="";
$msgt = "";

$title = "";
 $author ="";
 $featured_image = "";
 $username = "";
 
  $body = "";
  $id = "";

  if(isset($_GET['e'])){
    $id = $_GET['e'];
     $sql = "SELECT * FROM notifications where id = '$id'";
   $result = mysqli_query($con,$sql);
   while ($row = mysqli_fetch_array($result)) {
    //$author =  $row['author'];
    $body = strip_tags($row['body']);
    $title = $row['title'];
    $id = $row['id'];
     //$featured_image = $row['featured_image'];
     // code...
   }

  }

  if(isset($_GET['u'])){
     $id = $_GET['u'];
  }else{
    echo "No user selected ";
    return;
  }

  if(isset($_POST['post_single'])){
    $body = strip_tags($_POST['body']);
    $title = $_POST['title'];
     $user_id = $_POST['user_id'];
   // $type = "general";
   // $seen_users = serialize(array());
    $post_date = date("d m Y");
    // $params = array("body"=>$body,"title"=>$title,"type"=>$type,"post_date"=>$post_date,"seen_users"=>$seen_users);
    // $result = $model->insertIntoTable("notifications",$params);
    //if($result['status']){
      
       $sql = "UPDATE members set msg_title = '$title', msg = '$body' where id = '$user_id'";
       $r = mysqli_query($con,$sql)or die(mysqli_error($con));
       if($r){

         $msg =  '<div class="alert alert-success text-center">Succesfuly Sent</div>';
       
    }else{
      // $result['msg'];
       $msg =  '<div class="alert alert-success text-center">An Error occoured</div>';

    }

  }
  








   ?>
  <head>
        <meta charset="utf-8">
        <title></title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/site.css">
        <link rel="stylesheet" href="src/richtext.min.css">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="src/jquery.richtext.js"></script>
        



    </head>

        <!-- Begin Page Content -->
        <div class="container-fluid">
             

       

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><b>SEND NOTIFICATION</b></h1>
          

       <div class="text-center alert alert-<?php echo $msgt ?>"><?php echo $msg ?></div>



          <div class="row">
            

            <div class="col-lg-12">

              <!-- Circle Buttons -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">
                  
                   </h6>
                </div>
                <div class="card-body">


                     
                   

                   
                 <form method="POST"  enctype="multipart/form-data">
                  <input type="hidden" name="id" value="<?php echo $id ?>">
                    <div class="form form">
                         
                           <div class="input-group mb-3 form">
    
   <input type="text" required="" name="title" class="form-control" placeholder="Notification title" value="<?php echo 
   $title ?>">
    
  </div>
    <div class="input-group mb-3 form">
    
   <input type="hidden" name="type" value="general">

    
  </div>

  
                
                        
                          <div class="form ">
                         
                           
    

            <textarea class="contentoo" name="body" required=""><?php echo 
   $body ?></textarea>

       
    
  
                          
                        </div>


                      
                      
                     
                   

              <div class="row justify-content-center">
             <?php 

             if(isset($_GET['e'])){

             ?>
               <button type="submit"  class="btn btn-primary" name="update">update</button>
                <?php }else if(isset($_GET['u'])){
                  $user_id = $_GET['u'];
                  $username = $_GET['n'];
                 ?>
                  <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
              <button type="submit"  class="btn btn-primary" name="post_single">Send To <?php echo $username ?></button>
           

           <?php }else{ ?>
              <button type="submit"  class="btn btn-primary" name="post">POST</button>
           <?php } ?>
                
              </div>

                 </form>





               </div>
              </div>

            </div>

             

        </div>


   

         <script>
           $(document).ready(function() {
            $('.contentoo').richText();
        });
       
        </script>
      <!--   ////////////////////////////////BTC////////////////////////////////////////////// -->




        <!--   ////////////////////////////////ETH///////////////////////////////////////////// -->

      
        <!-- /.container-fluid -->

        
        <?php 
require "admin_footer.php";

        ?>

