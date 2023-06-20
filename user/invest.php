<?php
require "header.php";

?>
            
            <div class="row ">

    <div class="col-md-6 offset-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title">Invest</h3>
                  <form class="forms-sample" action="" method="post">
                                            
                    <div class="form-group">
                      <label class="form-control-label">Choose Plan: <span class="tx-danger">*</span></label>
                <select name="plan" class="form-control select2" onchange="get_options('plan_id',this.value,'#dsc')">
                    <option label="Choose Plan"></option>
                                        <option value="49">BASIC PLAN</option>
                                        <option value="50">SILVER PLAN</option>
                                        <option value="51">PLATINUM PLAN</option>
                                      </select>
                    </div>
                      
                      <div id='dsc'></div>
                      
                      
                      <div class="form-group">
                      <label class="form-control-label">Wallet Balance: <span class="tx-danger">*</span></label>
                <select name="by" class="form-control select2">
                    <option disabled label="Wallet" value="2">Wallet Balance:</option>
                    <option value="1">USD 0.00</option>
                  </select>
                    </div>
                      
                      
                      <!--
                      <div class="form-group">
                      <label class="form-control-label">Currency: <span class="tx-danger">*</span></label>
                <select name="coin" class="form-control select2">
                    <option label="Choose Currency"></option>
                    <option value="BTC">Bitcoin - BTC</option>
                    <option value="ETH">Ethereum - ETH</option>
                    <option value="BNB">Binance - BNB</option>
                    <option value="LTC">Litecoin - LTC</option>
                    <option value="USDT">Tether USD - USDT</option>
                    <option value="TRX">Tron USD - TRX</option>
                  </select>
                    </div>
                      -->
                    <div class="form-group">
                      <label class="form-control-label">Enter Amount: <span class="tx-danger">*</span></label>
                <input type="number" name='amount' placeholder="0000.00" class="form-control">
                    </div>
                    <button class="btn btn-success btn-block" type="submit" name='invest'>Invest Now</button>
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