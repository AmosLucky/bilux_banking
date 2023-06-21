<?php
include "header.php";
$error = "";

?>      
            <div class="row ">

    <div class="col-md-6 offset-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title">Fund Wallet</h3>

                  <?php  echo $error; ?>
                  <form id="form" class="forms-sample" action="payment.php" method="post">
                                            
                    
                      
                      <div id='dsc'></div>
                      
                    
                      <div class="form-group">
                      <label class="form-control-label">Currency: <span class="tx-danger">*</span></label>
                <select name="channel" id="payment_method" class="form-control select2">
                    <option value="0" label="Choose Currency"></option>
                    <?php

                                          $sql = "SELECT * from payment_methods ";
                                  $sn = 1;
                                 $result = mysqli_query($con,$sql) or die("cant select members ".mysqli_error($con));
                                 while ($row = mysqli_fetch_array($result)) {
                                    $name = $row['name'];
                                    $address = $row['address'];
                                    $date = $row['reg_date'];
                                    $qr_code =  $row['qr_code'];
                                    // $ref_balance  = $row['referral_balance'];
                                     $id = $row['id'];

                                            ?>
                                            <option value="<?php echo $id ?>"><?php echo $name ?></option>

                                          <?php  } ?>
                   
                  </select>
                    </div>
                      
                    <div class="form-group">
                      <label class="form-control-label">Enter Amount: <span class="tx-danger">*</span></label>
                <input type="number" name='amount' id="amount"  step="1" placeholder="0000.00" class="form-control">
                    </div>
                    <button class="btn btn-success btn-block" type="submit" id="continue">Continue</button>
                  </form>
                </div>
              </div>
            </div>
    
    
        </div>

                          </div>
      </div>
      </div><!-- container -->
    </div><!-- slim-mainpanel -->

    <script type="text/javascript">
          $(document).ready(function(){

              $("#form").submit(function(e){


                var amount = $("#amount").val();
                var payment_method = $("#payment_method").find(":selected").val();

                

                if( parseInt(amount) < 100 || amount ==""){
               //alert(min);
               // $("form").
                alert("minimum deposit for this plan is $100");
                 return false;
              }
              else if(payment_method == 0) {
               
               // $("form").
                alert("Please choose currency");
                 return false;
              }


              });
            });

            </script>



<?php
  require "footer.php";

?>