<?php
include 'admin_head.php';


$errore = "";
$sucess = "";
$ref ="";

if(isset($_GET['ref'])){
  $_SESSION['ref'] = $_GET['ref'];
  $ref =  $_SESSION['ref'];
}

$user = "";
if(isset($_GET['user'])){
  $user = $_GET['user'];
}
// echo "oooo";
if(isset($_POST['register'])){

  //collecting from input field
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $state= $_POST['state'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $referral = $_POST['referral'];
  $is_admin = $_POST['account_type'];
  $btc_wallet = "";//$_POST['btc_wallet'];
  
 $gender = "";

  //$referrer = $_POST['referrer'];

  // validating the form
  // firstnaem && last name
  if(strlen($fname) > 3 && strlen($lname) > 3 && isset($gender)  ){
    //username and password
    if (strlen($username) > 3 && strlen($password) > 3 ){
      //state , phone or email
      if (strlen($state) > 3 && strlen($phone) > 3 ){
        //email
        if (strpos($email, '@') == true ){
          



  //sanitising and checking for scarmmers

  $fnamev = mysqli_real_escape_string($con,$fname);
  $lnamev = mysqli_real_escape_string($con,$lname);
  $usernamev = mysqli_real_escape_string($con,$username);
  $passwordv = mysqli_real_escape_string($con,$password);
  $statev = mysqli_real_escape_string($con,$state);
  $phonev = mysqli_real_escape_string($con,$phone);
  $emailv = mysqli_real_escape_string($con,$email);
  //$referrerv = mysqli_real_escape_string($con,$referrer);

  //check if username already exists

  $sql = "select * from members where username = '$usernamev' || email = '$emailv'";
  $check = mysqli_query($con,$sql) or die("cant check ".mysql_error($con));
   $usernamecheck = mysqli_num_rows($check);
  if($usernamecheck < 1){

    //credit the referrer
    if(strlen($referral) > 3){
    $referral = mysqli_real_escape_string($con,$referral);
      $sql = "select * from members where username = '$referral'";
      $checkref = mysqli_query($con,$sql) or die("cant check ".mysqli_error($con));
      $refcheck = mysqli_num_rows($checkref);
      //if the exists
      if($refcheck == 1){
        while($row = mysqli_fetch_array($checkref)){

          $num_referree = $row['referree'];
          $user = $row['username'];


          //updating the referrer
          $add = $num_referree + 1;
        $sql = "update members set referree = '$add' where username = '$user'  ";
      $check = mysqli_query($con,$sql) or die("cant check ".mysqli_error($con));

        }

      }

  }

else{//set referree as lucky
    $sql = "select * from members where username = ''";
      $checkref = mysqli_query($con,$sql) or die("cant check ".mysqli_error($con));
      while($row = mysqli_fetch_array($checkref)){

          $num_referree = $row['referree'];
          $user = $row['username'];


          //updating the referrer
          $add = $num_referree + 1;
        $sql = "update members set referree = '$add' where username = '$user'  ";
      $check = mysqli_query($con,$sql) or die("cant check ".mysqli_error($con));

        }


}
$reg_date = date("d-m-Y");


//     //insert

//     if(isset($_SESSION['ref'])){
//     $referrerv = mysqli_real_escape_string($con,$_SESSION['ref']);
//   }
//   else{
//     $referrerv = 'lucky';
//   }


  $sql = "insert into members (firstname, lastname,username, password,phonenumber,state,email,paid,referred_by,referree,image,gender,bitcoin_wallet,date,running_invest,balance,num_of_days,is_admin) values ('$fnamev','$lnamev','$usernamev','$passwordv','$phonev','$statev','$emailv',false, '$referral',0, ' ','$gender','$btc_wallet',now(),0,0,0,'$is_admin')";
    $result = mysqli_query($con,$sql) or die("cant register ".mysqli_error($con));
    if($result){
     $sucess = '<div class="alert alert-success text-center">Sucessfully Registered</div>';

         
//////////////////////////////////////
     $subject = $company_name;
      $msg = "<div style='padding: 20px;'>
                  $company_logo
      
                  <h4>Hi $usernamev welcome to $company_name</h4>
                  <h4>Email :  $email </h4>
                  <h4>Passwors: $password </h4>
                  <p>
                  <span style='color:white'>
                   We warmly welcome you to <b>$company_name</b>, a UK based company involved with trading in cryptocurrencies. Our company was founded by a group of skilled analysts and experienced traders, to create a secure and highly profitable investment opportunities. Our trading department is primarily focused on the trading of Cryptocurrencies such as Bitcoin, Bitcoin Cash, Ethereum and Litecoin. We help our clients earn money on the volatility of the cryptocurrency market. Due to the use of high frequency, medium-term and long-term trading strategies our company is able to consistently generate a high percentage of profits and thereby pay high interests to their investors.
                   
                  </span>
                  </P>

                </div>";     


    //$sent = SendMail($email,$subject,$msg);
    // if($sent){
    //   echo "<h1>SENTHHHHHHHHHHHHHHHHHHH</h1>";
    // }else{
    //    echo "<h1>NOOOOOOOOOOOOOOOOOOOO</h1>";

    // }
    // echo $email; 
    // echo $emailv; 
   ////////////////////////////////////////////////////////////////

     


   


///////////////////////////////////////////////////////////////////////////
  }



}
else{
  echo $errore = '<div class="alert alert-danger text-center">Username or email already exists</div>';
}
}
else{
  echo $errore = '<div class="alert alert-danger text-center">input a valid email</div>';
}
}
else{
  echo $errorsp = '<div class="alert alert-danger text-center"> Please check your state or phone number </div>';
  }
}


else{
  echo $errorus = '<div class="alert alert-danger text-center">username or password too short </div>';
}

}
else{echo  $errorn = '<div class="alert alert-danger text-center">Names too short </div>'; 
}
}




            
        


?>




<div class="container mx-5">
    
    <article class="card shadow py-5 px-3">

             <form method="POST">
                <div class="form-group">
                  <select name="account_type" class="form-control">
                    <option disabled="" value="0">Select Account type</option>
                    <option value="0">Normal User</option>
                     <option value="1">Admin</option>
                  </select>
                                
                            </div>
                                       <div class="form-group">
                                <input class="form-control" name="fname" id="fname" placeholder="FIRST NAME" type="text" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="lname" id="fname" placeholder="LAST NAME" type="text" required>
                            </div>
                            <!-- Input Field Ends -->
                            <!-- Input Field Starts -->
                            <div class="form-group">
                                <input class="form-control" name="email" id="email" placeholder="EMAIL" type="email" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="username" id="email" placeholder="USERNAME" type="text" required>
                            </div>
                            <!-- Input Field Ends -->
                            <!-- Input Field Starts -->
                            <div class="form-group">
                                <input class="form-control" name="password" id="password" placeholder="PASSWORD" type="password" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="phone" id="password" placeholder="PHONE NUMBER" type="number" required>
                            </div>


                            <div class="form-group">
                                <select class="form-control default-select" name="state">
                                            <?php
                                          $state = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");

                                            ?>

                                            <?php for($i=1; $i < count($state); $i++){ ?>
                                            <option>
                                                <?php echo $state[$i]; ?>
                                            </option>

                                            <?php } ?>
                                        
                                    
                                </select>
                            </div>

                            <div class="form-group" style="">
                                <input class="form-control" name="referral" id="password" placeholder="Referrals Username (Optional)" type="text" >
                                
                            </div>
                                        
                                        <div class="col-md-12 col-sm-12 col-xs-12 ">
                                            <div class="check-group flexbox">
                                                <label class="check-box">
                                                    <input type="checkbox" class="check-box-input" checked>
                                                    <span class="remember-text">I agree terms & conditions</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <button type="submit" name="register" class="btn btn-primary">Sign up</button>
                                            <div id="msgSubmit" class="h3 hidden"></div> 
                                            <div class="clearfix"></div>
                                        </div>
                                      
                                    </form> 



</article> 





	</div>



<?php

include 'admin_footer.php';


?>