<?php
require "header.php";

?>
            
            <div class="row ">

    <div class="col-md-6 offset-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title">Fund Wallet</h3>
                  <form class="forms-sample" action="" method="post">
                                            
                    
                      
                      <div id='dsc'></div>
                      
                    
                      <div class="form-group">
                      <label class="form-control-label">Currency: <span class="tx-danger">*</span></label>
                <select name="coin" class="form-control select2">
                    <option label="Choose Currency"></option>
                    <option value="BTC">Bitcoin - BTC</option>
                    <option value="ETH">Ethereum - ETH</option>
                    <option value="USDT">Tether USD - USDT-Trc20</option>
                  </select>
                    </div>
                      
                    <div class="form-group">
                      <label class="form-control-label">Enter Amount: <span class="tx-danger">*</span></label>
                <input type="number" name='amount' step="1" placeholder="0000.00" class="form-control">
                    </div>
                    <button class="btn btn-success btn-block" type="submit" name='deposit'>Make Deposit</button>
                  </form>
                </div>
              </div>
            </div>
    
    
        </div>

                          </div>
      </div>
      </div><!-- container -->
    </div><!-- slim-mainpanel -->
<?php
  require "footer.php";

?>