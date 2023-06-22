<?php
include "header.php";
$error = "";



$username = $_SESSION['user'];
$user_id = $_SESSION['id'];

if(isset($_POST['add_wallet'])){
    $address = $_POST['address'];
    $wallet_type =  $_POST['wallet_type'];
    if(strlen( $address) > 5){
        if(strlen($wallet_type)>2){

            $sql = "Insert into wallets (user_id,wallet,type) values('$user_id','$address','$wallet_type')";
            $result = mysqli_query($con,$sql) or die("can not insert ".mysqli_error($con));
            if($result){
                 $error = '<div class="alert alert-success text-center">
     Wallet succefully saved (this wallet will be an option when you will request for withdraw)

     </div>';

            }


        }else{
             $error = '<div class="alert alert-danger text-center">
     Invalid type

     </div>';
        }

    }else{
        $error = '<div class="alert alert-danger text-center">
     Invalid wallet address

     </div>';
    }

}

if(isset($_POST['delete'])){
  $id = $_POST['id'];
  $sqli = "DELETE from wallets where id = '$id'";
  $result = mysqli_query($con,$sqli);
  if($result){

    $error = '<div class="alert alert-success text-center">
     successfully deleted

     </div>';

  }else{
    $error = '<div class="alert alert-danger text-center">
     An error occoured

     </div>';
  }
}



?>
                      
            <div class="row ">

    <div class="col-md-8 offset-md-2 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title">My Wallet History</h3>
                  <p><small class="card-description">
                    Click on + Add Wallet to add a withdrawal wallet address
                      </small></p>
                  <div class="modal fade" id="modaldemo6" tabindex="-1" role="dialog" aria-labelledby="tlabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="">Add Your Wallet<br><small style="font-size: 12px;" class="text-muted"> Add your wallet address to receive your withdrawal.</small></h3>
                            
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="">
                    
                    <form action="" method="post">
                    <div class="form-group">
                      <label class="form-control-label">Choose Wallet Type <span class="tx-danger">*</span></label>
                <select name="wallet_type" class="form-control select2">
                    <option label="Choose Wallet Type"></option>
                    <option value="Bitcoin">Bitcoin</option>
                    <option value="Ethereum">Ethereum</option>
                    <option value="Binance">Binance coin</option>
                    <option value="Litecoin">Litecoin</option>
                    <option value="Tehter">Tether USD</option>
                  </select>
                    </div><!-- form-group -->
                    <input type="hidden" value="778" name="id">
                    <div class="form-group mg-b-20">
                        <label class="form-control-label">Enter Your Wallet Address <span class="tx-danger">*</span></label>
                      <input type="text" placeholder="Wallet Address" name="address" class="form-control" >
                    </div><!-- form-group -->

                    <button class="btn btn-success btn-block" type="submit" name="add_wallet">Add Wallet</button>
                    </form><!-- form-group -->
                  </div>
                    
                        </div>
                        <div class="modal-footer">
                          <div class="form-group">
                        <button type="button" class="btn btn-outline-warning btn-block" data-dismiss="modal" aria-label="Close">Go Back</button>
                    </div>
                        </div>
                      </div>
                    </div>
                  </div>
                      <div class="form-group">
                  <a href="#" class="btn btn-outline-success btn-block mg-b-10 " data-toggle="modal" data-target="#modaldemo6"><i class="fa fa-plus mg-r-5"></i> Add Wallet</a>
              </div>
              <?php echo $error ?>
                      <div class="row">
          <div class="table-responsive">
            <table id="datatable2" class="table mg-b-0 tx-12" >
              <thead>
                <tr>
                    <th class="wd-15p">SN</th>
                  <th class="wd-15p">Type/Address</th>
                  <th class="wd-20p">Delete</th>
                </tr>

              </thead>
              <tbody>
                <?php

$sql = "SELECT * from wallets where user_id = '$user_id' order by id desc ";
$sn = 0;
$result = mysqli_query($con,$sql) or die("cant select members ".mysqli_error($con));
while ($row = mysqli_fetch_array($result)) {
$type = $row['type'];
$address = $row['wallet'];
// $date = $row['reg_date'];
// $qr_code =  $row['qr_code'];
// $ref_balance  = $row['referral_balance'];
$id = $row['id'];
$sn++;

  ?>
  <tr>
    <td><?php echo $sn; ?></td>
    <td><?php echo $type.": ".$address; ?></td>
    <td>
      <form method="post">
        <input type="hidden" value="<?php echo $id ?>">
        <button class="btn btn-danger" type="submit" name="delete">Delete wallet</button>
</form>
    </td>

  </tr>



<?php  } ?>


                                </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div>
                </div>
              </div>
            </div>
    
    
        </div>

        
      </div>
      </div><!-- container -->
    </div>
      </div><!-- slim-mainpanel -->

      <?php
require "footer.php";

?>