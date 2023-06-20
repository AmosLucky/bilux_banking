<?php
include 'admin_head.php';
$msg ="";
$msgt = "";

$title = "";
 $author ="";
 $featured_image = "";
 
  $body = "";
  $id = "";

  if(isset($_GET['e'])){
    $id = $_GET['e'];
     $sql = "SELECT * FROM blog where id = '$id'";
   $result = mysqli_query($con,$sql);
   while ($row = mysqli_fetch_array($result)) {
    $author =  $row['author'];
    $body = strip_tags($row['body']);
    $title = $row['title'];
     $featured_image = $row['featured_image'];
     // code...
   }

  }
if(isset($_POST['post'])){

  $author = $_POST['author'];
  $title = $_POST['title'];
  $body = mysqli_real_escape_string($con,$_POST['body']);
  $featured_image = $_FILES['featured_image'];

   $post_title = str_replace(" ","-",$title);

   if(strlen($title)>2){
    if(strlen($body)>15){
     /// echo $body;

      if(strlen($author)>2){
         
          $allowed = array('gif', 'png', 'jpg', 'jpeg');
$filename = $_FILES['featured_image']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
if (in_array($ext, $allowed)) {
   
   $sql = "SELECT * FROM blog where post_title = '$post_title'";
   $result = mysqli_query($con,$sql);
   $num_rows = mysqli_num_rows($result);
   if($num_rows == 0){

$location = "../uploads/".$filename;
   move_uploaded_file($_FILES['featured_image']['tmp_name'],$location);
   $post_date = date("Y M j");

   $sql = "INSERT INTO blog(title,body,author,featured_image,post_date,post_title)
                          values('$title','$body','$author','$filename','$post_date','$post_title')";
    $result = mysqli_query($con,$sql) or die("cant post".mysqli_error($con));
    if($result){
      $msg = "successful <br>";
    $msgt = "success";

    }else{
      $msg = "An error occoured";
    $msgt = "danger";

    }

   


   }else{
     $msg = "A post with this title already exists please change the title is it is a differnet post";
    $msgt = "danger";

   }


}else{

    $msg = "featured image fomat no allowed";
    $msgt = "danger";

}


        

   


    }else{
    $msg = "author name too short";
    $msgt = "danger";

   }

    }else{
    $msg = "Body too short";
    $msgt = "danger";

   }
   }else{
    $msg = "Title too short";
    $msgt = "danger";

   }
}




if(isset($_POST['update'])){

  $author = $_POST['author'];
  $title = $_POST['title'];
  $body = $_POST['body'];
  $id = $_POST['id'];

  $featured_image = $_FILES['featured_image'];
   $post_date = date("Y M j");

   $post_title = str_replace(" ","-",$title);

   if(strlen($title)>2){
    if(strlen($body)>15){
     /// echo $body;

      if(strlen($author)>2){
         
      
   
   $sql = "SELECT * FROM blog where post_title = '$post_title' and id != '$id'";
   $result = mysqli_query($con,$sql);
   $num_rows = mysqli_num_rows($result);
   if($num_rows == 0){
        $allowed = array('gif', 'png', 'jpg', 'jpeg');
$filename = $_FILES['featured_image']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
if (in_array($ext, $allowed)) {
  $location = "../uploads/".$filename;
   move_uploaded_file($_FILES['featured_image']['tmp_name'],$location);
   $sql = "UPDATE  blog set title = '$title',body = '$body',author ='$author',
                featured_image = '$filename',post_date = '$post_date',
                post_title = '$post_title'";

}else{
   $sql = "UPDATE  blog set title = '$title',body = '$body',author ='$author',
                post_date = '$post_date',
                post_title = '$post_title'";

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
     $msg = "A post with this title already exists please change the title is it is a differnet post";
    $msgt = "danger";

   }





        

   


    }else{
    $msg = "author name too short";
    $msgt = "danger";

   }

    }else{
    $msg = "Body too short";
    $msgt = "danger";

   }
   }else{
    $msg = "Title too short";
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
          <h1 class="h3 mb-4 text-gray-800"><b>Blog Post</b></h1>
          

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
    
   <input type="text" name="title" class="form-control" placeholder="Blog title" value="<?php echo 
   $title ?>">
    
  </div>
    <div class="input-group mb-3 form">
    
   <input type="text" name="author" class="form-control" placeholder="Author" value="<?php echo 
   $author ?>">

    
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
                         
                           
    

            <textarea class="contentoo" name="body"><?php echo 
   $body ?></textarea>

       
    
  
                          
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
            $('.contentoo').richText();
        });
       
        </script>
      <!--   ////////////////////////////////BTC////////////////////////////////////////////// -->




        <!--   ////////////////////////////////ETH///////////////////////////////////////////// -->

      
        <!-- /.container-fluid -->

        
        <?php 
require "admin_footer.php";

        ?>

