<?php

require "header.php";

$msg = "";

if(isset($_POST['delete'])){
$id = $_POST['id'];

$sql = "DELETE FROM  members where id = '$id' ";

$result = mysqli_query($con,$sql) or die("Cant delete ".mysqli_error($con));
if($result){

$msg = '<div class="alert alert-success text-center">SUCCESSFULLY DELETED</div>';
}else{
$msg = '<div class="alert alert-danger text-center"> ERROR: USER CANT BE DELETED</div>';
}

}

if(isset($_POST['deactivate'])){
$id = $_POST['id'];

$sql = "UPDATE members set deleted = '1'  where id = '$id' order by id desc";
$result = mysqli_query($con,$sql) or die("Cant delete ".mysqli_error($con));
if($result){

$msg = '<div class="alert alert-success text-center">SUCCESSFULLY DEACTIVATED</div>';
}else{
$msg = '<div class="alert alert-danger text-center"> ERROR: USER CANT BE DELETED</div>';
}

}

if(isset($_POST['activate'])){
$id = $_POST['id'];
$sql = "UPDATE members set deleted = '0'  where id = '$id' order by id desc";
$result = mysqli_query($con,$sql) or die("Cant delete ".mysqli_error($con));
if($result){

$msg = '<div class="alert alert-success text-center">SUCCESSFULLY RESTORED</div>';
}else{
$msg = '<div class="alert alert-danger text-center"> ERROR: USER CANT BE DELETED</div>';
}

}


if(isset($_POST['update_password'])){

   $user_id = $_POST['user_id'];
    $new_password = $_POST['new_password'];
    $confirm = $_POST['new_passwordv'];

    if(strlen($new_password) > 5 && strlen($confirm) > 5){

      if($new_password == $confirm){

       

         if(1 == 1){

          $sql = "UPDATE members set password = '$new_password' WHERE id = '$user_id'";
         $result = mysqli_query($con,$sql)  or die("Error getting transactions ".mysqli_error($con));
         if($result){

        
$msg = '<div class="alert alert-success text-center">
Your password has been changed successfully

</div>';

///// to do errorr///////

}




         }else{
$msg = '<div class="alert alert-danger text-center">
Error: The old password You entered is incorrect 

</div>';

///// to do errorr///////

}



         }else{
$msg = '<div class="alert alert-danger text-center">
Error: Password does not match its comfirmation

</div>';

///// to do errorr///////

}



      }else{
$error = '<div class="alert alert-danger text-center">

Password must be greater than 5 characters

</div>';

///// to do errorr///////

}



    }








if(isset($_GET['v'])){
$id = $_GET['v'];
$user_id = $_GET['v'];

$sql = "select * from members where id = '$id'";
$result = mysqli_query($con,$sql) or die("cant select ".mysqli_error($con));
$checkuser = mysqli_num_rows($result);
if($checkuser == 1){
while ($row = mysqli_fetch_array($result)) {
$id = $row['id'];
$username =$row['username'];
// $_SESSION['balance'] = $row['balance'];
$email =$row['email'];
$phonenumber = $row['phonenumber'];
$city =$row['city'];
$state =$row['state'];
$gender = $row['gender'];
$profit = $row['profit'];

$date =$row['date'];
$active =$row['active'];
if($active == '1'){
$status = "Active";
}else{
$status = "Deactive";

}

$referree= $row['referred_by'];
$firstname = $row['firstname'];
$lastname = $row['lastname'];
$password = $row['password'];
$balance = $row['balance'];
$ref_balance = $row['referral_balance'];

$bitcoin_wallet = $row['bitcoin_wallet'];
$etherum_wallet = $row['etherum_wallet'];
$running_invest = $row['running_invest'];





    ///////

    $total_deposit = 0;
$total_withdrawal = 0;
$total_bonus = 0;


$sql = "SELECT * FROM transactions WHERE id = '$user_id'";
$result =  mysqli_query($con,$sql) or mysqli_error($con);



while ($row = mysqli_fetch_array($result)) {
  $status = $row['status'];
  $amount = $row['amount'];
  $transaction_type = $row['transaction_type'];
  if($transaction_type == 'Withdrawal'){
    $total_withdrawal += $amount;
    

  }else if($transaction_type == 'Deposit'){
    $total_deposit += $amount;

    


  }else if($transaction_type == 'Bonus'){
    $total_bonus += $amount;

  }
  
  // else if($status == 'Withdrawal'){

  // }

//   $sql = "SELECT * FROM requests ";
// $result =  mysqli_query($con,$sql) or mysqli_error($con);



// while ($row = mysqli_fetch_array($result)) {
//   $status = $row['status'];
//   $amount = $row['amount'];
//   $all_withdrawal += $amount;

//   if($status == "pending"){
//     $pending_withdrawal += $amount;
//   }

// }
  
}



    ////////


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="continer mx-5">
    <?php echo $msg ?>
    </div>
    <!-- Content Header (Page header) -->
    <div class="content-header">

        <div class="row mb-3">
            <div class="container"
                style="display: flex; justify-content: space-between;width:100%">
                <div>
                    <form method="POST">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <button type="submit" name="deactivate"
                            class="btn btn-primary">Deactivate</button>
                    </form>
                </div>
                <div>

                    <form method="POST">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <button type="submit" name="activate"
                            class="btn btn-success">Activate</button>
                    </form>

                </div>


            </div>

        </div>
        <div>
            <!-- /.row -->

            <div class="row mb-3">
            <div class="container"
                style="display: flex; justify-content: space-between;width:100%">
              

                <div>

                    <a href="add_bonus.php?v=<?php echo $id ?>&n=<?php echo $username ?>">
                        <button type="submit" name
                            class="btn btn-success">Bonus</button>
                    </a>

                </div>
                <div>
                    <form method="POST" action="members.php">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <button type="submit" name="delete_user"
                            class="btn btn-danger">Delete</button>
                    </form>
                </div>

            </div>

        </div>
        <div>
            <!---ned -->

            <div class="row mb-3">
                <div class="col-xl-6">
                    <div class="card custom-card">
                        <div
                            class="card-header justify-content-between blue-head"
                            style="background-color: blue !important; color: white !important;">
                            <div class="card-title"> ACCOUNT INFORMATION
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST">
                                <div class="form-group mb-3">
                                    <div></div>

                                </div>
                                <input type="hidden" name="id"
                                    value="<?php echo $id ?>">

                                <div class="form-group mb-3">
                                    <label>Username</label>
                                    <input type="username" name="username"
                                        value="<?php echo $username   ?>"
                                        class="form-control" placeholder>

                                </div>
                                <div class="form-group mb-3">
                                    <label>Password</label>
                                    <input class="form-control"
                                        value="<?php echo $password   ?>"
                                        type="text" name="password">

                                </div>
                                <div class="form-group mb-3">
                                    <label>Email address</label>
                                    <input type="email" name="email"
                                        value="<?php echo $email   ?>"
                                        class="form-control" placeholder>

                                </div>
                                <div class="form-group mb-3">
                                    <label>Address</label>
                                    <textarea class="form-control"
                                        name="country"><?php echo
                                        $state ?></textarea>

                                </div>
                                <div class="form-group mb-3">
                                    <label>Status</label>
                                    <input class="form-control"
                                        name="status" type="text" readonly
                                        value="<?php echo $status ?>">

                                </div>
                                <div class="form-group mb-3">
                                    <label>Created On</label>
                                    <input class="form-control"
                                        name="status" type="text" readonly
                                        value="<?php echo $date ?>">

                                </div>

                                <!-- Input Field Ends -->
                                <!-- Input Field Starts -->

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <button type="submit" name="update"
                                        class="btn btn-primary">Update Profile</button>
                                    <div id="msgSubmit" class="h3 hidden"></div>
                                    <div class="clearfix"></div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>

                <!-- /////////////SECOND ROW//////// -->
                <div class="col-xl-6">
                    <div class="card custom-card">
                        <div
                            class="card-header justify-content-between blue-head"
                            style="background-color: blue !important; color: white !important;">
                            <div class="card-title"> TRANSACTION SUMRRY
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST">
                                <div class="form-group mb-3">
                                    <div></div>

                                </div>

                                <!-- <div class="form-group mb-3">
                                    <label>System Balance</label>
                                    <br>
                                    <b>$0</b>

                                </div> -->
                                <div class="form-group mb-3">
                                    <label>Available Balance</label>
                                    <br>
                                    <b>$<?php echo number_format($balance) ?></b>

                                </div>
                                <div class="form-group mb-3">
                                    <label>Total Deposit</label>
                                    <br>
                                    <b>$<?php echo number_format($total_deposit) ?></b>

                                </div>
                                <div class="form-group mb-3">
                                    <label>Total Withdrawal</label>
                                    <br>
                                    <b>$<?php echo number_format($total_withdrawal) ?></b>

                                </div>
                                <div class="form-group mb-3">
                                    <label>Total Bonuses</label>
                                    <br>
                                    <b>$<?php echo number_format($total_withdrawal) ?></b>

                                </div>
                                <!-- <div class="form-group mb-3">
                                    <label>Total Earning</label>
                                    <br>
                                    <b>$0</b>

                                </div> -->

                                <!-- Input Field Ends -->
                                <!-- Input Field Starts -->

                                <!-- <div class="col-md-12 col-sm-12 col-xs-12">
                                    <button type="submit" name="update"
                                        class="btn btn-primary">Update Profile</button>
                                    <div id="msgSubmit" class="h3 hidden"></div>
                                    <div class="clearfix"></div>
                                </div> -->

                            </form>

                        </div>
                    </div>
                </div>
            </div>

            <!-- //Row/// -->

            <div class="row">
                <!-- /////////////SECOND ROW//////// -->
                <div class="col-xl-6">
                    <div class="card custom-card">
                        <div
                            class="card-header justify-content-between blue-head"
                            style="background-color: blue !important; color: white !important;">
                            <div class="card-title"> TRANSACTIONS FROM <?php
                                echo $username ?>
                            </div>
                        </div>

                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered"
                                        id="dataTable" width="100%"
                                        cellspacing="0">
                                        <thead>

                                            <tr>
                                                <th>S/N</th>
                                                <th>user</th>
                                                <th>amount</th>

                                                <th>Transaction Type</th>
                                                <th>Status</th>

                                                <th>date</th>

                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>S/N</th>
                                                <th>user</th>
                                                <th>amount</th>

                                                <th>Transaction Type</th>
                                                <th>Status</th>

                                                <th>date</th>

                                            </tr>
                                        </tfoot>
                                        <tbody>

                                            <?php

                                            $sql =
                                            "select * from  transactions where user_id = '$user_id' order by id desc";

                                            $result = mysqli_query($con,$sql) or
                                            die("Error getting transactions ".mysqli_error($con));
                                            $sn = 0;
                                            while ($row =
                                            mysqli_fetch_array($result)) {

                                            $sn++;
                                            $user = "";

                                            # code...
                                            $date = $row['invest_date'];
                                            $amount = $row['amount'];
                                            $type = $row['transaction_type'];
                                            $wallet = $row['wallet_type'];
                                            $status = $row['status'];
                                            $user_id = $row['user_id'];
                                            $id = $row['id'];

                                            $sql1 =
                                            "SELECT username from members where id = '$user_id'";
                                            $result1 = mysqli_query($con,$sql1)
                                            or die("Error getting transactions ".mysqli_error($con));
                                            while ( $row1 =
                                            mysqli_fetch_array($result1)) {
                                            $user = $row1['username'];
                                            # code...
                                            }

                                            ?>

                                            <tr>
                                                <td><?php echo $sn ?></td>
                                                <td><?php echo $user ?></td>
                                                <td><?php echo "$".$amount ?></td>
                                                <td><?php echo $type ?></td>
                                                <td><?php echo $status ?></td>
                                                <td><?php echo $wallet ?></td>
                                            </tr>

                                            <?php
                                            }

                                            ?>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!-- //// -->
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="card custom-card">
                        <div
                            class="card-header justify-content-between blue-head"
                            style="background-color: blue !important; color: white !important;">
                            <div class="card-title"> ACCOUNT INFORMATION
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST">
                                <input name="user_id" type="hidden" value="<?php echo $user_id ?>">

                                <div class="form-group mb-3">
                                    <label>New Password</label>
                                    <input class="form-control" value
                                        type="text" name="new_password">

                                </div>
                                <div class="form-group mb-3">
                                    <label>Reypr new password</label>
                                    <input type="text" name="new_passwordv"
                                        value
                                        class="form-control" placeholder>

                                </div>

                                <!-- Input Field Ends -->
                                <!-- Input Field Starts -->

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <button type="submit" name="update_password"
                                        class="btn btn-warning">Update Password</button>
                                    <div id="msgSubmit" class="h3 hidden"></div>
                                    <div class="clearfix"></div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-xl-6">
                    <div class="card custom-card">
                        <div
                            class="card-header justify-content-between blue-head"
                            style="background-color: blue !important; color: white !important;">
                            <div class="card-title"> WALLET ADDRESSES
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="datatable2"
                                    class="table mg-b-0 tx-12">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p">SN</th>
                                            <th class="wd-15p">Type/Address</th>
                                            <!-- <th class="wd-20p">Delete</th> -->
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <?php

                                        $sql =
                                        "SELECT * from wallets where user_id = '$user_id' order by id desc ";
                                        $sn = 0;
                                        $result = mysqli_query($con,$sql) or
                                        die("cant select members ".mysqli_error($con));
                                        while ($row =
                                        mysqli_fetch_array($result)) {
                                        $type = $row['type'];
                                        $address = $row['wallet'];
                                        // $date = $row['reg_date'];
                                        // $qr_code = $row['qr_code'];
                                        // $ref_balance = $row['referral_balance'];
                                        $id = $row['id'];
                                        $sn++;

                                        ?>
                                        <tr>
                                            <td><?php echo $sn; ?></td>
                                            <td><?php echo $type.": ".$address;
                                                ?></td>
                                            <td>
                                                <!-- <form method="post">
                                                    <input type="hidden"
                                                        value="<?php// echo $id ?>">
                                                    <button
                                                        class="btn btn-danger"
                                                        type="submit"
                                                        name="delete">Delete
                                                        wallet</button>
                                                </form> -->
                                            </td>

                                        </tr>

                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <?php
    }}else{
    echo "YOU DID NOT CLICK ON ANY USER";
    }
    }else{
    echo "YOU DID NOT CLICK ON ANY USER";
    }

    require "footer.php";

    ?>