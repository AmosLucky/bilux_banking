<?php
require_once "../conn.php";


$sql1 = "SELECT todays_date FROM mydate where id = '1'";
$result1 = mysqli_query($con,$sql1) or die("Cant approve ".mysqli_error($con));
while ($row = mysqli_fetch_array($result1)) {
   $last_day = $row['todays_date'];
  
  # code...
}
 $todays_date = date("d m Y");

if($todays_date != $last_day){
  $tid = 1;

  $sql1 = "UPDATE mydate SET todays_date = '$todays_date'  WHERE id = '$tid'";
$result1 = mysqli_query($con,$sql1) or die("Cant approve ".mysqli_error($con));







  $sql = "SELECT * FROM members WHERE running_invest >= 100 and num_of_days >= 1";
            $result = mysqli_query($con,$sql) or die("Cant approve ".mysqli_error($con));
           
if($result){

  while ($row = mysqli_fetch_array($result)) {
$running_invest = $row['running_invest'];
  $id = $row['id'];
  $num_of_days = $row['num_of_days'];
  $one_day = 1;
  $user = $row['username']; 
  $profit = $row['profit']; ;

    $daily_profit =  $running_invest *  0.1;

  switch ($num_of_days) {

    case "0":
              $sql3 = "UPDATE members SET balance = balance + '$daily_profit'  WHERE id = '$id'";
              $result3 = mysqli_query($con,$sql3) or die("Cant approve ".mysqli_error($con));
              ///////////////////////
            $sql1 = "UPDATE members SET profit = profit + '$daily_profit' WHERE id = '$id'";
            $result1 = mysqli_query($con,$sql1) or die("Cant approve ".mysqli_error($con));
             $sql2 = "UPDATE members SET num_of_days = num_of_days + '$one_day'  WHERE id = '$id'";
            $result2 = mysqli_query($con,$sql2) or die("Cant approve ".mysqli_error($con));
            if($result1 && $result2){
               $msg =  '<div class="alert alert-success text-center">SUCCESSFULLY ADDED ' . $user.' profit</div>';
            }else{
            $msg =  '<div class="alert alert-danger text-center">ERROR OCCURED</div>';


            }
      # code...
      break;

      case "1":
       $sql3 = "UPDATE members SET balance = balance + '$daily_profit'  WHERE id = '$id'";
              $result3 = mysqli_query($con,$sql3) or die("Cant approve ".mysqli_error($con));
              ///////////////////////
            $sql1 = "UPDATE members SET profit = profit + '$daily_profit' WHERE id = '$id'";
            $result1 = mysqli_query($con,$sql1) or die("Cant approve ".mysqli_error($con));
             $sql2 = "UPDATE members SET num_of_days = num_of_days + '$one_day'  WHERE id = '$id'";
            $result2 = mysqli_query($con,$sql2) or die("Cant approve ".mysqli_error($con));
            if($result1 && $result2){
               $msg =  '<div class="alert alert-success text-center">SUCCESSFULLY ADDED ' . $user.' profit </div>';
            }else{
            $msg =  '<div class="alert alert-danger text-center">ERROR OCCURED</div>';


            }
      # code...
      break;


       case "2":
        $sql3 = "UPDATE members SET balance = balance + '$daily_profit'  WHERE id = '$id'";
              $result3 = mysqli_query($con,$sql3) or die("Cant approve ".mysqli_error($con));
              ///////////////////////
            $sql1 = "UPDATE members SET profit = profit + '$daily_profit' WHERE id = '$id'";
            $result1 = mysqli_query($con,$sql1) or die("Cant approve ".mysqli_error($con));
             $sql2 = "UPDATE members SET num_of_days = num_of_days + '$one_day'  WHERE id = '$id'";
            $result2 = mysqli_query($con,$sql2) or die("Cant approve ".mysqli_error($con));
            if($result1 && $result2){
               $msg =  '<div class="alert alert-success text-center">SUCCESSFULLY ADDED ' . $user.' profit </div>';
            }else{
            $msg =  '<div class="alert alert-danger text-center">ERROR OCCURED</div>';


            }
      # code...
      break;


       case "3":
        $sql3 = "UPDATE members SET balance = balance + '$daily_profit'  WHERE id = '$id'";
              $result3 = mysqli_query($con,$sql3) or die("Cant approve ".mysqli_error($con));
              ///////////////////////
            $sql1 = "UPDATE members SET profit = profit + '$daily_profit' WHERE id = '$id'";
            $result1 = mysqli_query($con,$sql1) or die("Cant approve ".mysqli_error($con));
             $sql2 = "UPDATE members SET num_of_days = num_of_days + '$one_day'  WHERE id = '$id'";
            $result2 = mysqli_query($con,$sql2) or die("Cant approve ".mysqli_error($con));
            if($result1 && $result2){
               $msg =  '<div class="alert alert-success text-center">SUCCESSFULLY ADDED ' . $user.' profit </div>';
            }else{
            $msg =  '<div class="alert alert-danger text-center">ERROR OCCURED</div>';


            }
      # code...
      break;


       case "4":
        $sql3 = "UPDATE members SET balance = balance + '$daily_profit'  WHERE id = '$id'";
              $result3 = mysqli_query($con,$sql3) or die("Cant approve ".mysqli_error($con));
              ///////////////////////
            $sql1 = "UPDATE members SET profit = profit + '$daily_profit' WHERE id = '$id'";
            $result1 = mysqli_query($con,$sql1) or die("Cant approve ".mysqli_error($con));
             $sql2 = "UPDATE members SET num_of_days = num_of_days + '$one_day'  WHERE id = '$id'";
            $result2 = mysqli_query($con,$sql2) or die("Cant approve ".mysqli_error($con));
            if($result1 && $result2){
               $msg =  '<div class="alert alert-success text-center">SUCCESSFULLY ADDED ' . $user.' profit </div>';
            }else{
            $msg =  '<div class="alert alert-danger text-center">ERROR OCCURED</div>';


            }
      # code...
      break;


       


       case "5":
             $sql3 = "UPDATE members SET balance = balance + '$daily_profit'  WHERE id = '$id'";
              $result3 = mysqli_query($con,$sql3) or die("Cant approve ".mysqli_error($con));
              ///////////////////////
            $sql1 = "UPDATE members SET profit = profit + '$daily_profit' WHERE id = '$id'";
            $result1 = mysqli_query($con,$sql1) or die("Cant approve ".mysqli_error($con));
             $sql2 = "UPDATE members SET num_of_days = '$one_day'  WHERE id = '$id'";
            $result2 = mysqli_query($con,$sql2) or die("Cant approve ".mysqli_error($con));
            if($result1 && $result2){
               $msg =  '<div class="alert alert-success text-center">SUCCESSFULLY ADDED ' . $user.' profit </div>';
            }else{
            $msg =  '<div class="alert alert-danger text-center">ERROR OCCURED</div>';


            }
      break;
    
    default:
      # code...
     // breakrow

    # code...
  }
}
}


}




?>