<?php
include 'admin_head.php';
$msg ="";
$msgt = "";

$name = "";
 $author ="";
 $featured_image = "";
 $page_type = "";
 
  $contact = "";
  $id = "";
   $position = "";

  if(isset($_GET['e'])){
    $id = $_GET['e'];
     $sql = "SELECT * FROM team where id = '$id'";
   $result = mysqli_query($con,$sql);
   while ($row = mysqli_fetch_array($result)) {
    //$author =  $row['author'];
    $contact = strip_tags($row['contact']);
    $name = $row['name'];
     $featured_image = $row['featured_image'];
     $position = $row['position'];
     // code...
   }

  }
if(isset($_POST['post'])){

  $position = $_POST['position'];
  $name = $_POST['name'];
  $contact = $_POST['contact'];
  $featured_image = $_FILES['featured_image'];

   ///$page_link = str_replace(" ","-",strtolower($title));

   if(strlen($name)>2){
    if(strlen($contact)>2){
     /// echo $contact;

      if(strlen($position)>2){
         
          $allowed = array('gif', 'png', 'jpg', 'jpeg');
$filename = $_FILES['featured_image']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
if (in_array($ext, $allowed)) {
   
   

$location = "../uploads/".$filename;
   move_uploaded_file($_FILES['featured_image']['tmp_name'],$location);
   $post_date = date("Y M j");

   $sql = "INSERT INTO team(name,featured_image,contact,position,post_date)
                          values('$name','$filename','$contact','$position','$post_date')";
    $result = mysqli_query($con,$sql) or die("cant post".mysqli_error($con));
    if($result){
      $msg = "successful <br>";
    $msgt = "success";

    }else{
      $msg = "An error occoured";
    $msgt = "danger";

    }

   


  


}else{

    $msg = "featured image fomat not allowed";
    $msgt = "danger";

}


        

   


    }else{
    $msg = "position type too short";
    $msgt = "danger";

   }

    }else{
    $msg = "contact too short";
    $msgt = "danger";

   }
   }else{
    $msg = "Name too short";
    $msgt = "danger";

   }
}




if(isset($_POST['update'])){

  $position = $_POST['position'];
  $name = $_POST['name'];
  $contact = $_POST['contact'];
  $id = $_POST['id'];

  $featured_image = $_FILES['featured_image'];
   $page_date = date("Y M j");

   //$page_link = str_replace(" ","-",$title);

   if(strlen($name)>2){
    if(strlen(strip_tags($contact))>5){
     /// echo $contact;

      if(strlen($position)>2){
         
      
   
   
        $allowed = array('gif', 'png', 'jpg', 'jpeg');
$filename = $_FILES['featured_image']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
if (in_array($ext, $allowed)) {
  $location = "../uploads/".$filename;
   move_uploaded_file($_FILES['featured_image']['tmp_name'],$location);
   $sql = "UPDATE  team set name = '$name',contact = '$contact',position ='$position',
                featured_image = '$filename' where id = '$id'
              ";

}else{
   $sql = "UPDATE  team set name = '$name',contact = '$contact',position ='$position' where id = '$id'";

}


  

   
    $result = mysqli_query($con,$sql) or die("cant post".mysqli_error($con));
    if($result){
      $msg = "successful updated <br>";
    $msgt = "success";

    

    }else{
      $msg = "An error occoured";
    $msgt = "danger";

    }

   


   





        

   


    }else{
    $msg = "author name too short";
    $msgt = "danger";

   }

    }else{
    $msg = "contact too short";
    $msgt = "danger";

   }
   }else{
    $msg = "Name too short";
    $msgt = "danger";

   }
}




   ?>
  <head>
        <meta charset="utf-8">
        <title>RichText example</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/site.css">
        <link rel="stylesheet" href="src/richtext.min.css">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="src/jquery.richtext.js"></script>
        



    </head>

        <!-- Begin Page Content -->
        <div class="container-fluid">
             

       

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><b>New Team member</b></h1>
          

       <div class="text-center alert alert-<?php echo $msgt ?>"><?php echo $msg ?></div>



          <div class="row p-3">
            

            <div class="col-lg-12">

              <!-- Circle Buttons -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">
                  
                   </h6>
                </div>
                <div class="card-contact p-3">


                     
                   

                   
                 <form method="POST"  enctype="multipart/form-data">
                  <input type="hidden" name="id" value="<?php echo $id ?>">
                    <div class="form form">
                         
                           <div class="input-group mb-3 form">
    
   <input type="text" required="" name="name" class="form-control" placeholder="Name" value="<?php echo 
   $name ?>">
    
  </div>
   
    <div class="input-group mb-3 form">

    <input type="text" required="" class="form-control" name="position" placeholder="position" value="<?php echo 
   $position ?>">

    
  </div>
  <div>
     Select Featured Image
   </div>
  <div class="input-group mb-3 form">
    

   <input type="file" name="featured_image"  class="form-control" >
  </div>
  <?php 
if(isset($_GET['e'])){
   $featured_image;
  ?>

  <div>
    <img src="../uploads/<?php echo 
   $featured_image ?>" width="100">
  </div>
<?php }
  ?>
                          
                        </div>
                          <div class="form ">
                         
                           
    

            <input type="text" required=""  class="form-control" name="contact" value="<?php echo $contact ?>" placeholder="contact email">

       
    
  
                          
                        </div>


                      
                      
                     
                   

              <div class="row justify-content-center">
             <?php 

             if(isset($_GET['e'])){

             ?>
               <button type="submit"  class="btn btn-primary" name="update">update</button>

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
            $('.content').richText();
        });
        </script>
      <!--   ////////////////////////////////BTC////////////////////////////////////////////// -->




        <!--   ////////////////////////////////ETH///////////////////////////////////////////// -->

      
        <!-- /.container-fluid -->
   
   <?php 
require "admin_footer.php";

        ?>