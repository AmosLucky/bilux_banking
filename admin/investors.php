<?php
include 'admin_head.php';
$msg ="";


//$id = $_GET['d'];

if(isset($_GET['r'])){
   $id = $_GET['r'];

//   $sql = "DELETE FROM transactions where id = '$id'";
// $result = mysqli_query($con,$sql) or die("Cant delete ".mysqli_error($con));
  $investment = $model->selectFromTable("investments","id='$id'");
  if($investment['status']){
      $investment = $model->selectFromTable("investments","id='$id'")['msg'][0];
  $profit = $investment['profit'];
  $amount = $investment['amount'];
   $user_id = $investment['user_id'];

   $details = $model->selectFromTable("members","id='$user_id'")['msg'][0];
   $old_balance = $details['balance'];
   $new_balance = $old_balance + $amount;
   $old_profit = $details['profit'];
   $new_profit = $old_profit + $profit;


  $params = array("profit" => $new_profit,"balance"=>$new_balance);
  $updateUser = $model->updateTable("members",$params,$user_id);
  if($updateUser['status']){
    $params = array("deleted"=>1);
    $updateInvestment = $model->deleteFromTable("investments","id='$id'");
    //print_r($updateInvestment);
    if($updateInvestment['status']){

       $msg =  '<div class="alert alert-success text-center">SUCCESSFULLY DELETED</div>';
     }else{
      $msg = '<div class="alert alert-danger text-center"> ERROR: An erro occoured</div>';
     }

  }else{
            $msg = '<div class="alert alert-danger text-center"> ERROR: Cant be removed</div>';
    }
 // print_r($updateUser);
 

}else{
            $msg = '<div class="alert alert-danger text-center"> ERROR: no row detcted </div>';
    }
}




if(isset($_POST['add_profit1'])){
    $username = $_POST['username'];
        $investment_id = $_POST['investment_id'];
      $plan_id = $_POST['plan_id'];
      $running_days  = $_POST['running_days'];
      //return;
      $profit = $_POST['profit'];
      $amount = $_POST['amount'];
      $user_id = $_POST['user_id'];
      $profit_days = $_POST['profit_days'];
      $isCompounded = false;
       
      $query = "SELECT * FROM investment_plans where id = '$plan_id'";
      $result = mysqli_query($con,$query) or die("Cant approve ".mysqli_error($con));
     // if(mysql_num_rows($result) != 1)
   if($result){
    //echo mysqli_num_rows($result);
                    $sql1 = "SELECT * FROM members WHERE id = '$user_id'";
                $result1 = mysqli_query($con,$sql1);
                while($row = mysqli_fetch_array($result1)){
                  $isCompounded = $row['isCompounded'];
                  
                }



    while ($row = mysqli_fetch_array($result)) {
      
      $profit_percent = $row['profit'];
             $name = $row['name'];
              $id = $row['id'];
              $min =  $row['min_deposite'];
               $max =  $row['max_deposite'];
                $profit_percent =  $row['profit'];
                $capital_after =  $row['capital_after'];
                 $profit_after =  $row['profit_after'];
                 $referal_bonus =  $row['referal_bonus'];
                  }
                
                 $profit_percent = (float) $profit_percent;
                 $amount = (float) $amount;
                  $hundred_percent_of_profit = $profit_percent/100;
              $new_profit = $amount *   $hundred_percent_of_profit;
               $new_profit = round($new_profit);
               ///////////////////for adding profit//////////
                $earned_profit = $profit + $new_profit;
                $new_running_days = (float)$running_days + 1;
                $new_profit_days = $profit_days +1;
              

              if($running_days < $capital_after){

               

               //  if($isCompounded){
               //     ///////////////////////// ITS COMPOUNDED///////////////////////////
               //    ////////////WHEN IS COUMPOUNDED///////////////////
               //      echo $earned_profit;
               //     $queryi = "UPDATE members set running_invest = running_invest + '$new_profit' where id = '$user_id'";
               //  $result = mysqli_query($con,$queryi) or die("Cant add compounded investment ".mysqli_error($con));
               //              if($result){

               //                 $query = "UPDATE investments set amount = amount + '$earned_profit',
               //             running_days = '$new_running_days',
               //             profit_days = '$new_profit_days'
               //            where id = '$investment_id' && user_id = '$user_id'";
               //            echo $earned_profit;
                          
               // $result = mysqli_query($con,$query) or die("Cant add ".mysqli_error($con));
               //              if($result){
               //                $msg =  '<div class="alert alert-success text-center">Successfully Added1</div>';

               //              }

               //              }
               //              die();


               //  }

                /////////////////////////END ITS COMPOUNDED///////////////////////////



                ///////////////////////WHEN CAPITAL DAYS IS NOT DEUE
                 if($profit_days < $profit_after){
                  ////////////WHEN PROFIT DAYS hIS NOT DUE
                  echo $earned_profit;
                   $queryi = "UPDATE members set profit = profit + '$new_profit' where id = '$user_id'";
                $result = mysqli_query($con,$queryi) or die("Cant add ".mysqli_error($con));
                            if($result){
                           
               

                $query = "UPDATE investments set profit = '$earned_profit',
                           running_days = '$new_running_days',
                           profit_days = '$new_profit_days'
                          where id = '$investment_id' && user_id = '$user_id'";
                          echo $earned_profit;
                          
               $result = mysqli_query($con,$query) or die("Cant add ".mysqli_error($con));
                            if($result){
                              $msg =  '<div class="alert alert-success text-center">Successfully Added1</div>';

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
                           profit_days = '0'
                          where id = '$investment_id' && user_id = '$user_id'";

               $result = mysqli_query($con,$query) or die("Cant add ".mysqli_error($con));
                            if($result){
                              $msg =  '<div class="alert alert-success text-center">Successfully Added</div>';

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
                              $msg =  '<div class="alert alert-success text-center">Successfully Approved</div>';

                            }

                            }


              }



   
  }




  
         
}

    // $sql = "select * from members where id = '$id'";
    // $result = mysqli_query($con,$sql) or die("Cant approve ".mysqli_error($con));




















    /////////////////////////////////////////////////////////////////////////////////////////////////////////
//    if($result){
//     while ($row = mysqli_fetch_array($result)) {
//       $amount = $row['amount'];
//       $status = $row['status'];
//       # code...
//     }
//     /////////////////////////////////////////////////////

//     if($status == "pendding" || $status == "pending"){
  

//     $sql = "select running_invest,paid, referred_by,num_of_days from members where id = '$user_id'";
//     $result = mysqli_query($con,$sql) or die("Cant approve ".mysqli_error($con));
//    if($result){
//     while ($row = mysqli_fetch_array($result)) {
//       $running_invest = $row['running_invest'];
//       $paid = $row['paid'];
//       $referer = $row['referred_by'];
//       $num_of_days = $row['num_of_days'];
//       # code...
//     }
// //////////////////////////////////////////////// when user has not paid //////////
//     if($paid == false){
//        $sql = "select referral_balance,id from members where username = '$referer'";
//     $result1 = mysqli_query($con,$sql) or die("Cant approve ".mysqli_error($con));
//    $num = mysqli_num_rows($result1);
//    if($num==1){
//     //////////////////////// updating payeee  to paid member

//      $sql = "UPDATE members set  paid = true where id = '$user_id'";
//     $result2 = mysqli_query($con,$sql) or die("Cant approve ".mysqli_error($con));
    

//     if($result1){

//       ///////////// get referrers details ///////////
//     while ($row = mysqli_fetch_array($result1)) {
//       $referral_balance = $row['referral_balance'];
//       $referral_id = $row['id'];
//       //$referer = $row['referred_by'];
//       # code...
//     }
//     //////////////// add to his referral amount /////////
//     $ten_percent = (10/100) * ($amount);
//     $new_referral_balance = floatval($referral_balance) + $ten_percent; 
//     $sql = "UPDATE members set  referral_balance = '$new_referral_balance' where id = '$referral_id'";
//     $result3 = mysqli_query($con,$sql) or die("Cant approve ".mysqli_error($con));

//     }

//    }
//  }
//     //////////////////////////////end //////////
//     $new_running_invest = floatval($running_invest) + floatval($amount);

//    if($num_of_days == 0){
//      $sql = "UPDATE members set  running_invest = '$new_running_invest', num_of_days = 1 where id = '$user_id'";
//    }else{
//      $sql = "UPDATE members set  running_invest = '$new_running_invest' where id = '$user_id'";
//    }
// $result = mysqli_query($con,$sql) or die("Cant approve ".mysqli_error($con));
//    if($result){
//     $sql = "UPDATE transactions set status  = 'approved' where id = '$id'";
// $result = mysqli_query($con,$sql) or die("Cant approve ".mysqli_error($con));
//    if($result){
//     $msg =  '<div class="alert alert-success text-center">SUCCESSFULLY TRANSACTION</div>';
//   }

//    }




            
//          }else{
//             $msg = '<div class="alert alert-danger text-center"> ERROR: TRANSACTION CANT BE Approved</div>';
//          }

       
//      }else{
//             $msg = '<div class="alert alert-danger text-center"> TRANSACTION HAD BEEN ALREADY Approved</div>';
//          }

//    }else{
//             $msg = '<div class="alert alert-danger text-center"> ERROR: TRANSACTION CANT BE Approved</div>';
//          }

   


?>








<div class="container-fluid">
  

 
    <div class=" text-center"><b class="p-3"> <h5><?php  echo $msg; ?></b> </h5></div>
   
  
       <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">All Investors</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                     <th>S/N</th>
        <th>username</th>
        <th> Amount</th>
        <th>Plan </th>
           <th>Has stayed for </th>
        <th>Profit</th>
        <th>Add profit</th>
                    </tr>
                  </thead>
                  <tfoot>
                      <th>S/N</th>
        <th>username</th>
        <th> Amount</th>
        <th>Plan </th>
        <th>Has stayed for </th>
        <th>profit</th>
        <th> Add profit</th>
                    
                  </tfoot>
                  
                  <tbody>
     <?php  

     $sql = "SELECT * from investments where deleted = '0' && is_hidden = '0'  order by id desc";
      $sn = 1;
     $result = mysqli_query($con,$sql) or die("cant select transactions ".mysqli_error($con));
     while ($row = mysqli_fetch_array($result)) {
      $username = $row['username'];
      $id = $row['id'];
      $plan_id = $row['plan_id'];
      $running_days  = $row['running_days'];
      $profit = $row['profit'];
      $plan_name = $row['plan_name'];
      $amount = $row['amount'];
       $user_id = $row['user_id'];
       $profit_days = $row['profit_days'];
       $active = $row['active'];
       $capital_running_hours = $row['capital_running_hours'];
       $status = "";
       if(!$active){
        $status = "Paused";

       }
       $days = round($capital_running_hours /24);
      
    

     ?>

      <tr>
        <td><?php echo $sn++; ?></td>
        <td><?php echo $username; ?> <span class="color:red"><?php echo $status; ?></span></td>
        <!-- <td><?php //echo $balance; ?></td> -->
         <td><?php echo $amount; ?></td>
         <td><?php echo $plan_name; ?></td>
        
        <td><?php echo $days."days " ?>(<?php echo $capital_running_hours." hrs "; ?>)</td>
       
        <td><?php echo round($profit,3); ?></td>
         
        <td> 
          <div class="dropdown ">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
      Action
    </button>
    <div class="dropdown-menu">
     <?php if(!$active) { ?>
      <a class="dropdown-item btn-danger" href="investors.php?a=<?php echo $id ?>">Activate Earning</a>
     <?php } else{ ?>
       <a class="dropdown-item btn-danger" href="investors.php?s=<?php echo $id ?>">Pause Earning</a>
     <?php } ?>
      <a class="dropdown-item " href="investors.php?r=<?php echo $id ?>">Remove</a>
      <a class="dropdown-item"  type="button" class="btn btn-info" data-toggle="modal" data-target="#approveModal<?php echo $id ?>" href="#">Add profit mannualy</a>
    </div>
  </div>
          

         
            <!-- Modal -->
  <div class="modal fade" id="approveModal<?php  echo $id?>" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Profit?</h4>
        </div>
        <div class="modal-body">
          <p>You are about to add  to this profit</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        <div class="modal-footer">
          <form method="POST">
            <input type="hidden" name="investment_id" value="<?php echo $id ?>">
            <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
     <input type="hidden" name="plan_id" value="<?php echo $plan_id ?>">
      <input type="hidden" name="running_days" value="<?php echo $running_days ?>">
      <input type="hidden" name="username" value="<?php echo $username ?>">
      <input type="hidden" name="profit" value="<?php echo $profit ?>">
      <input type="hidden" name="amount" value="<?php echo $amount ?>">
      <input type="hidden" name="profit_days" value="<?php echo $profit_days ?>">
          <button class="btn btn-info" type="submit"  name="add_profit">Confirm  increment</button>
          </form>
        </div>
      </div>
    </div>
  </div>

          




        </td>
        <td>
        <!--  <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal<?php //echo $id ?>"> DELETE </button> -->

  <!-- Modal -->
  <div class="modal fade" id="myModal<?php  echo $id?>" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">DELETE?</h4>
        </div>
        <div class="modal-body">
          <p>You are about to delete this Investment, Delete Can't be reversed</p>
        </div>
        <div class="modal-footer">
         
            
        
          <button type="button" name="delete" class="btn btn-default" data-dismiss="modal">Close</button>
           
        </div>
        <div class="modal-footer">
          <form method="POST">
             <input type="hidden" name="id" value="<?php echo $id ?>">
            
            <button class="btn btn-danger" name="delete" type="submit">Confirm Delete Investment</button>

          </form>
        </div>
      </div>
    </div>
  </div>

          

          </td>
      </tr>




     <?php  }  ?>
     
    </tbody>
  </table>
</div>
</div>
</div>
</div>



<?php
include 'admin_footer2.php';


?>