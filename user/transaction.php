<?php
require "header.php";

?>
            
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Transactions History</h4>
                  <p class=" text-info">
                    <?php
                  if(isset($_GET['t'])){
                        $type = $_GET['t'];
                        switch($type){
                          case "1":
                            $transact_type = "Deposits";
                            break;
                            
                          case "2":
                            $transact_type = "Withdrawals";
                            break;
                          case "3":
                            $transact_type = "Investments";
                            break;
                          case "4":
                            $transact_type = "Bonuses";
                            break;
                          case "5":
                            $transact_type = "Transfers";
                            break;
                          default:
                          $transact_type = "All transaction";

                        }
                        echo  $transact_type;
                      }
                    ?>
                  </p>
                  <div class="table-responsive">
                    <table id="order-listing" class="table table-hover table-striped">
                      <thead>
                        <tr>
                          <th>Type</th>
                          <th>Amount</th>
                          <th>View</th>
                        </tr>
                      </thead>
                      <tbody>

                      <?php

                      if(isset($_GET['t'])){
                        $type = $_GET['t'];
                        switch($type){
                          case "1":
                            $transact_type = "Deposit";
                            break;
                            
                          case "2":
                            $transact_type = "Withdrawal";
                            break;
                          case "3":
                            $transact_type = "Investment";
                            break;
                          case "4":
                            $transact_type = "Bonus";
                            break;
                          case "5":
                            $transact_type = "Transfer";
                            break;

                        }

                        $sql = "select * from  transactions where user_id = '$user_id' && transaction_type = '$transact_type' order by id desc"; 

                      }else{

                        $sql = "SELECT * from  transactions where user_id = '$user_id' order by id desc"; 

                      }
      


     
      $result = mysqli_query($con,$sql)  or die("Error getting transactions ".mysqli_error($con));
      $sn = 0;
      while ($row = mysqli_fetch_array($result)) {

        $sn++;

        # code...
        $date = $row['invest_date'];
        $amount = $row['amount'];
        $type = $row['transaction_type'];
        $wallet = $row['wallet_type'];
        $status =  $row['status'];
         $id =  $row['id'];

        $color = "text-danger";
        if($status != "pending"){
        	 $color = "text-success";

        }
      

      ?>



                        
                                                  
                      <tr>
                            <td><?php  echo $type ?><br>
                          <small class="d-block mt-2 text-warning">
                            <i class="fa fa-clock-o"></i>
                           <?php  echo $status ?></small>
                          </td>
                          <td class="text-">USD <?php  echo number_format($amount,2) ?></td>
                         
                          
                          <td><button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" 
                          data-target="#t<?php echo $id ?>">
                          View</button></td>
                      </tr>



                      <div class="modal fade" id="t<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="tlabel<?php echo $id ?>" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title " id="tlabel<?php echo $id ?>"><span class="text-"><?php echo $type ?> | </span><small >USD <?php  echo number_format($amount,2) ?> </small> 
                          </h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          
                    <ul class="list-group">
                            <li class="list-group-item"><span>Status</span> <span class='float-right badge badge-warning'><?php  echo $status ?></span></li>
                            <li class="list-group-item"><span>Initiated on</span> <span class='float-right'><?php  echo $date ?></span></li>
                            <li class="list-group-item"><span>Payment Method</span> <span class='float-right'><?php  echo $wallet ?></span></li>
                          </ul>
                    <br>
                                            </div>
                        <div class="modal-footer">
                          <div class="form-group mt-4">
                        <button type="button" class="btn btn-outline-warning btn-block" data-dismiss="modal" aria-label="Close">Go Back</button>
                    </div>
                        </div>
                      </div>
                    </div>
                  </div>

<?php 

      }

?>

                        
                                                
                      </tbody>
                    </table>
                      
                  </div>
                  
                </div>
              </div>
            </div>
                
            </div>
            
        

        
      </div><!-- container -->
    </div>
    </div>
      </div><!-- slim-mainpanel -->

      <?php
require "footer.php";

?>