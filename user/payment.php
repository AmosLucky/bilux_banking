<?php
require "header.php";

?>
            <div class="row">
            <div class="col-md-6 offset-md-3 grid-margin stretch-card">
                
          <div class="card card-body pd-20 mg-t-10 text-center">
              <h1 class="card-title text-center" >
                  <img src="../images/BTC.png" style="width: 80px; height: auto;" alt="logo"/>
              </h1>
              <h6 class="slim-card-title text-muted mg-b-20">Please Make The Deposit Of</h6>
              <h2 class="text-primary mg-b-20">USD 700.00<br>
              </h2>
              <h6 class="text-primary mg-b-20"> BTC  -  $700<br></h6>
              
              <hr>
              <div class="image-area mt-2"><img id="imageResult" src="../img/BTC.png" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div><br>
              <h5 class="mg-b-20 tx-primary">bc1qe08dvcfplw6a3m0evzxfqwwl49nw4q75qrus5v</h5>
              <br>
              <div class="form-group">
                    <div class="input-group">
                        <input type="text" readonly id='ref_cop' class="form-control" value="bc1qe08dvcfplw6a3m0evzxfqwwl49nw4q75qrus5v">
                      <div class="input-group-append">
                          <button class="btn btn-sm btn-primary" id='ref_btn' type="button" onclick="copy_ref('ref_cop','#ref_btn');">Copy Wallet Address <i class="fa fa-copy"></i></button>
                      </div>
                    </div>
                  </div>
              <p class="text-muted">Please this wallet address accepts only BTC payment.</p><br>
              <div class="form-group row">
                      <div class="col-6">
                        <a href="transaction.php" class="btn btn-success btn-block text-white btn-md rounded-0 mb-4"><i class="fas fa-upload"></i>Fund Wallet</a>
                      </div>
                      <div class="col-6">
                        <a href="transaction.php" class="btn btn-warning btn-block text-white btn-md rounded-0 mb-4"><i class="fas fa-exchange"></i> History</a>
                      </div>
                    </div>
              <a class="" href="index.php">Back To Home </a>
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