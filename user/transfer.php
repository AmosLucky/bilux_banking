<?php
require "header.php";

?>
            
            <div class="row ">

    <div class="col-md-6 offset-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title">Transfer Request</h3>
                  <form class="forms-sample" action="" method="post">
                                          <div class="form-group">
                      <label class="form-control-label">Enter Receiver Username: <span class="tx-danger">*</span></label>
                <input onkeyup="getval('smfn','mdname')" id='smfn' name='name' type="text" placeholder="Receiver's Username" class="form-control">
                    </div>
                      <div class="form-group">
                  <label class="form-control-label">Enter Amount: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="number" onkeyup="getval('smam','mdamt')" id='smam' name='amount' placeholder="0000.00">
              </div>
                      
                      <div class="modal fade" id="trns" tabindex="-1" role="dialog" aria-labelledby="trns" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h3 class="">Transfer Details<br><small style="font-size: 12px;" class="text-muted"> Please Confirm your transfer</small></h3>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class=" bg-gray-900">
                <div class="pd-y-30 pd-xl-x-30">
                  
                  <div class="pd-x-30 pd-y-10">
                    
                    <p>You are sending <b class='text-success'>$ <span id='mdamt'></span></b> to <b class='text-success'><span id='mdname'></span></b></p>
                    <br>
                    <button class="btn btn-success btn-block" type="button" onClick="triggerClick('#send_m')">Send</button>
                     <div class="form-group mt-4">
                        <button type="button" class="btn btn-outline-warning btn-block" data-dismiss="modal" aria-label="Close">Cancel</button>
                    </div><!-- form-group -->
                  </div>
                    
                </div><!-- pd-20 -->
              </div>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                      
                      <input type='hidden' name='id' value='778'/>
                      <button id='send_m' type='submit' name='send_m' style="display: none;"></button>
              <a href="#" class="btn btn-primary btn-block"  data-toggle="modal" data-target="#trns">Make Transfer</a>
              </form>
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