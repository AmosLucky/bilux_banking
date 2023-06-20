<?php
include 'admin_head.php';
$msg ="";
if(isset($_POST['bulk'])){
  $message1 = $_POST['message'];
   $title = $_POST['title'];

    if(strlen($title) > 2 && strlen($message1)>2){

$sql = "SELECT * FROM members";

$result = mysqli_query($con,$sql) or die(mysqli_error($con));
$numRows = mysqli_num_rows($result);
$sn = 0;
while ($row = mysqli_fetch_array($result)) {
  $sn++;
$email = $row['email'];

$to =  $email; // enter the users email here
$subject = 'Notification ';
$from =  $company_email; /// enter the email of you host example admin@netbaba.com
 
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
 
// Compose a simple HTML email message
$message = '<html><body>';
//$mail->AddEmbeddedImage('img/2u_cs_mini.jpg', 'logo_2u');
$message .= "

<h3 style='color:#f40;'>
$title

</h3>";

$message .= "
<p>
$message1
<br>

</p>
";
$message .= '</body></html>';
$sent = mail($to, $subject, $message, $headers);

 if($sn == $numRows){
  $msg = "<div class='alert alert-success text-center'>Successfuly sent to $sn users</div>";
 }
   }

 }else{
   $msg = "<div class='alert alert-danger text-center'>Please fill the fields</div>";

}



}

$email = "";
$message1 = "";
$title = "";

 if(isset($_POST['single'])){
  $email = $_POST['email'];
  $message1 = $_POST['message'];
 $body = $_POST['message'];
   $title = $_POST['title'];
   if(strlen($title) > 2 && strlen($body)>2){
$to =  $email; // enter the users email here
$subject =  $title;
$from =  $company_email; /// enter the email of you host example admin@netbaba.com

$msg2 = "<!DOCTYPE html>
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
    
    <h4>
      VargoFarm
    </h4>

    <p class='block'>

    $message
    

    
  </div>

  <div class='footer'>
    <p>
      Support is available 24/7  <br>             
Best Regards, $company_name the
AU: + <br>
support@Vargofarms.io
    </p>
    
  </div>

</body>
</html>
";

require '../mail.php';

$msg = "<div class='alert alert-success text-center'>Message sent!!</div>";





}else{
   $msg = "<div class='alert alert-danger text-center'>Please fill the fields</div>";

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
          <h1 class="h3 mb-4 text-gray-800"><b>Mailer</b></h1>
          

       <div class=""><?php echo $msg ?></div>



          <div class="row" id="deposit-row">
            

            <div class="col-lg-6 d-none">

              <!-- Circle Buttons -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">
                  
                  Bulk </h6>
                </div>
                <div class="card-body">
                   

                   
                 <form method="POST">
                    <div class="form form">
                         
                           <div class="input-group mb-3 form">
    
   <input type="text" name="title" value="<?=$title ?>" required="" class="form-control" placeholder="Title">
    
  </div>
                          
                        </div>
                          <div class="form form">
                         
                           <div class="input-group mb-3 form">
    
    <textarea placeholder="Write message" class="form-control" required="" name="message" style="height: 115px"></textarea>
    
  </div>
                          
                        </div>
                     
                      
                     
                   

              <div class="row justify-content-center">
               <button type="submit"  class="btn btn-primary" name="bulk">Send</button>
                
              </div>

                 </form>





               </div>
              </div>

            </div>

             <div class="col-lg-12">

              <!-- Circle Buttons -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">
                   
                  Single </h6>
                </div>
                <div class="card-body">
                   

             <form method="POST">

                        <div class="form">
                             <div class="form form">
                         
                           <div class="input-group mb-3 form">
    
   <input type="text" name="title" value="<?=$title ?>" class="form-control" placeholder="Title" required="">
    
  </div>
                          
                        </div>
                         
                           <div class="input-group mb-3">
   
    <input type="email" class="form-control" value="<?=$email ?>" placeholder="Enter receipient email" name="email" required="">
    
  </div>
                          
                        </div>
                          <div class="form">
                         
                           <div class="input-group mb-3">
   
  <textarea placeholder="Write message" id="contentoo" class="contentoo" name="message"><?=$message1 ?></textarea>
    
  </div>
                          
                        </div>
                     
                     
                      
                     
                   

              <div class="row justify-content-center">
               <button type="submit" class="btn btn-primary"  name="single">Send</button>
                
              </div>

               
             </form>





               </div>
              </div>

            </div>

        </div>
      <!--   ////////////////////////////////BTC////////////////////////////////////////////// -->




        <!--   ////////////////////////////////ETH///////////////////////////////////////////// -->

      
        <!-- /.container-fluid -->
          <script>
           $(document).ready(function() {
            $('.contentoo').richText();
        });
       
        </script>
   

<?php
include 'admin_footer.php';


?>