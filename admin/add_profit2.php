<?php
require_once "../conn.php";


// $sql1 = "SELECT todays_date FROM mydate where id = '1'";
// $result1 = mysqli_query($con,$sql1) or die("Cant approve ".mysqli_error($con));
// while ($row = mysqli_fetch_array($result1)) {
//    $last_day = $row['todays_date'];
  
//   # code...
// }
//  $todays_date = date("d m Y");

if(isset($_GET['user']) && isset($_GET['pass'])){
  $tid = 1;
  $user = $_GET['user'];
  $pass = $_GET['pass'];

  if($user != "user" || $pass != "pass"){
    return;
  }


//   $sql1 = "UPDATE mydate SET todays_date = '$todays_date'  WHERE id = '$tid'";
// $result1 = mysqli_query($con,$sql1) or die("Cant approve ".mysqli_error($con));







  $sql = "SELECT * FROM investments where active = '1'";
  $result_1 = mysqli_query($con,$sql) or die("Cant approve ".mysqli_error($con));
           
if($result_1){
  while ($row = mysqli_fetch_array($result_1)) {
    echo "jjj";
    $username = $row['username'];
        $investment_id = $row['id'];
      echo $plan_id = $row['plan_id'];
      $running_days  = $row['running_days'];
      //return;
      $profit = $row['profit'];
      $amount = $row['amount']." ";
      $user_id = $row['user_id'];
      $profit_days = $row['profit_days'];
       $profit_running_hours = $row['profit_running_hours'];
       $capital_running_hours = $row['capital_running_hours'];
      
    # code...
        $query = "SELECT * FROM investment_plans where id = '$plan_id'";
      $result1 = mysqli_query($con,$query) or die("Cant approve ".mysqli_error($con));
     // if(mysql_num_rows($result) != 1)
   if($result1){
    //echo mysqli_num_rows($result);



    while ($row = mysqli_fetch_array($result1)) {
      
      $profit_percent = $row['profit'];
             $name = $row['name'];
              $id = $row['id'];
              $min =  $row['min_deposite'];
               $max =  $row['max_deposite'];
                $profit_percent =  $row['profit'];
                $capital_after =  $row['capital_after'];
                 echo $profit_after =  $row['profit_after'];
                 $referal_bonus =  $row['referal_bonus'];
                  }
                
                 $profit_percent = (float) $profit_percent;
                 $amount = (float) $amount;
                  $hundred_percent_of_profit = $profit_percent/100;
                  $hundred_percent_profit_one_day = $hundred_percent_of_profit / $capital_after;
                  echo "==".$hundred_percent_profit_one_day."==".$profit_after."====";
              $new_profit = $amount *   $hundred_percent_profit_one_day;
               $new_profit = round($new_profit) / 48; ///////////30mins for 24hrs
               ///////////////////for adding profit//////////
                $earned_profit = $profit + $new_profit;
                $new_running_days = (float)$running_days + 1;
                $new_profit_days = $profit_days +1;
                $total_capital_hours = $capital_after*24;
                 $total_profit_hours = $profit_after*24;
                 $new_capital_running_hours  = (float)$capital_running_hours + 0.5;
                 $new_profit_running_hours  =  (float)$profit_running_hours + 0.5;

               
              

              if($capital_running_hours < $total_capital_hours){

                ///////////////////////WHEN CAPITAL DAYS IS NOT DEUE
                 if($profit_running_hours < $total_profit_hours){
                  ////////////WHEN PROFIT DAYS hIS NOT DUE
                  echo $earned_profit;
                   $queryi = "UPDATE members set profit = profit + '$new_profit' where id = '$user_id'";
                $result = mysqli_query($con,$queryi) or die("Cant add ".mysqli_error($con));
                            if($result){
                           
               

                $query = "UPDATE investments set profit = '$earned_profit',
                           profit_running_hours = '$new_profit_running_hours',
                           capital_running_hours = '$new_capital_running_hours'
                          where id = '$investment_id' && user_id = '$user_id'";
                          echo $earned_profit;
                          
               $result = mysqli_query($con,$query) or die("Cant add ".mysqli_error($con));
                            if($result){
                              $msg =  '<div class="alert alert-success text-center">user profit added and ruuning hours incresed</div>';

                            }
                          }
                            
               }else {
                /////////////////WHEN PROFIT DAYS IS DUE/////////
               // $new_balance = $balance + $earned_profit;
                $queryi = "UPDATE members set balance = balance + '$earned_profit',
                profit = profit - '$profit' where id = '$user_id'";
                $result = mysqli_query($con,$queryi) or die("Cant add ".mysqli_error($con));
                            if($result){
                              $query = "UPDATE investments set profit = '0',
                           running_days = '$new_running_days',
                           profit_running_hours = '0',
                           capital_running_hours = '$new_capital_running_hours'
                          where id = '$investment_id' && user_id = '$user_id'";

               $result = mysqli_query($con,$query) or die("Cant add ".mysqli_error($con));
                            if($result){
                              $msg =  '<div class="alert alert-success text-center">
                              Profit successfully added to balance
                              </div>';

                            }

                            }

                 

               }


              }else{

                ////////////////////WHEN CAPITAL DAYS IS DUE////////////////

                $new_balance = $profit +   $amount;
                $queryi = "UPDATE members set balance = balance + '$new_balance',
                profit = profit - '$profit', running_invest = running_invest -  '$amount' where id = '$user_id'";
                $result = mysqli_query($con,$queryi) or die("Cant add ".mysqli_error($con));
                            if($result){
                              $query = "
                              DELETE from investments 
                          where id = '$investment_id' && user_id = '$user_id'";

               $result = mysqli_query($con,$query) or die("Cant add ".mysqli_error($con));
                            if($result){
                              $msg =  '<div class="alert alert-success text-center">
                              Running investment succesfully added to Balance end of investmen</div>';

                            }

                            }


              }



   
  }


  }

  


}
}




?>