<?php 

require "header.php";

?>
   <div class="alert  alert-solid alert-success" role="alert">
    Welcome, <?php echo $user ?>          </div>
                    <div class="row">
                         <!-- demacate -->
                <!-- demacate -->
                <!-- demacate -->
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-baseline">
                    <p class="card-title mb-1"> Balance</p>
                  </div>
                  <h2 class="mb-2 mt-1">$<?php  echo  number_format($balance,2)  ?></h2>
                  <!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
  {
  "symbols": [
    {
      "proName": "FOREXCOM:SPXUSD",
      "title": "S&P 500"
    },
    {
      "proName": "FOREXCOM:NSXUSD",
      "title": "US 100"
    },
    {
      "proName": "FX_IDC:EURUSD",
      "title": "EUR/USD"
    },
    {
      "proName": "BITSTAMP:BTCUSD",
      "title": "Bitcoin"
    },
    {
      "proName": "BITSTAMP:ETHUSD",
      "title": "Ethereum"
    }
  ],
  "showSymbolLogo": true,
  "colorTheme": "dark",
  "isTransparent": true,
  "displayMode": "adaptive",
  "locale": "en"
}
  </script>
</div>
<!-- TradingView Widget END -->
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-baseline">
                    <p class="card-title mb-1">Investment Balance</p>
                  </div>
                  <h2 class="mb-2 mt-1">$<?php  echo number_format($running_invest,2) ?></h2>
                  <!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
  {
  "symbols": [
    {
      "proName": "FOREXCOM:SPXUSD",
      "title": "S&P 500"
    },
    {
      "proName": "FOREXCOM:NSXUSD",
      "title": "US 100"
    },
    {
      "proName": "FX_IDC:EURUSD",
      "title": "EUR/USD"
    },
    {
      "proName": "BITSTAMP:BTCUSD",
      "title": "Bitcoin"
    },
    {
      "proName": "BITSTAMP:ETHUSD",
      "title": "Ethereum"
    }
  ],
  "showSymbolLogo": true,
  "colorTheme": "dark",
  "isTransparent": true,
  "displayMode": "adaptive",
  "locale": "en"
}
  </script>
</div>
<!-- TradingView Widget END -->
                </div>
              </div>
            </div>



             <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-baseline">
                    <p class="card-title mb-1">Profite Balance</p>
                  </div>
                  <h3 class="mb-2 mt-1">$<?php  echo number_format($profit,2);   ?></h3>
                   <!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
  {
  "symbols": [
    {
      "proName": "FOREXCOM:SPXUSD",
      "title": "S&P 500"
    },
    {
      "proName": "FOREXCOM:NSXUSD",
      "title": "US 100"
    },
    {
      "proName": "FX_IDC:EURUSD",
      "title": "EUR/USD"
    },
    {
      "proName": "BITSTAMP:BTCUSD",
      "title": "Bitcoin"
    },
    {
      "proName": "BITSTAMP:ETHUSD",
      "title": "Ethereum"
    }
  ],
  "showSymbolLogo": true,
  "colorTheme": "dark",
  "isTransparent": true,
  "displayMode": "adaptive",
  "locale": "en"
}
  </script>
</div>
<!-- TradingView Widget END -->
                </div>
              </div>
            </div>
                       <!-- demacate -->
                <!-- demacate -->
                <!-- demacate -->
            </div>

<div class="row">
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body text-center">
                  <div class="col-md-12 text-center">
                      <a href="deposit.php" class="btn badge-success text-white btn-md rounded-0 mb-4">Fund Wallet</a>
                      <a href="invest.php" class="btn badge-success text-white btn-md rounded-0 mb-4">Start Investment</a>
                  </div>
                 </div>
              </div>
            </div>
          </div>
            
                       <!-- demacate -->
                <!-- demacate -->
                <!-- demacate -->
          </div>
            
            <div class="row d-none">
                           <!-- demacate -->
                <!-- demacate -->
                <!-- demacate -->
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center flex-wrap" style="float: left">
                    <div class="d-flex align-items-center">
                      <div class="badge badge-primary"><img src="../images/BTC.png" style="width: 25px; height: auto;" alt="logo"/></div>
                    </div>
                  </div>
                  <div class="d-flex justify-content-between align-items-center flex-wrap" style="float: right"><br>
                  <h4 class="mb-2 mt-1"><p class="mb-0 text-warning">1 BTC</p>$ 26,414.00</h4>
                  </div>
                </div>
              </div>
            </div>
                       <!-- demacate -->
                <!-- demacate -->
                <!-- demacate -->
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center flex-wrap" style="float: left">
                    <div class="d-flex align-items-center">
                      <div class="badge badge-primary"><img src="../images/ETH.png" style="width: 25px; height: auto;" alt="logo"/></div>
                    </div>
                  </div>
                  <div class="d-flex justify-content-between align-items-center flex-wrap" style="float: right"><br>
                  <h4 class="mb-2 mt-1"><p class="mb-0 text-warning">1 ETH</p>$ 0.00</h4>
                  </div>
                </div>
              </div>
            </div>
                       <!-- demacate -->
                <!-- demacate -->
                <!-- demacate -->
            
                       <!-- demacate -->
                <!-- demacate -->
                <!-- demacate -->
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center flex-wrap" style="float: left">
                    <div class="d-flex align-items-center">
                      <div class="badge badge-primary"><img src="../images/USDT.png" style="width: 25px; height: auto;" alt="logo"/></div>
                    </div>
                  </div>
                  <div class="d-flex justify-content-between align-items-center flex-wrap" style="float: right"><br>
                  <h4 class="mb-2 mt-1"><p class="mb-0 text-warning">1 USDT</p>$ 0.00</h4>
                  </div>
                </div>
              </div>
            </div>
                       <!-- demacate -->
                <!-- demacate -->
                <!-- demacate -->
            
                       <!-- demacate -->
                <!-- demacate -->
                <!-- demacate -->
            </div>
                       <!-- demacate -->
                <!-- demacate -->
                <!-- demacate -->
            
                           <!-- demacate -->
                <!-- demacate -->
                <!-- demacate -->
                
                
            
            
            
            
            <div class="row">
                <!-- demacate -->
                <!-- demacate -->
                <!-- demacate -->
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-baseline">
                      <ion-icon class="text-success" name="arrow-down-circle-outline"></ion-icon>
                    <p class="card-title mb-1">Total Deposits</p>
                  </div>
                  <h4 class="mb-2 mt-1">$ 0.00</h4>
                  <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <p class="mb-0 text-warning">0.0000 BTC</p>
                    
                  </div>
                </div>
              </div>
            </div>
                      <!-- demacate -->
                <!-- demacate -->
                <!-- demacate -->
                        <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-baseline">
                      <ion-icon class="text-success" name="add-circle-outline"></ion-icon>
                    <p class="card-title mb-1">Total Investments</p>
                  </div>
                  <h4 class="mb-2 mt-1">$ 0.00</h4>
                  <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <p class="mb-0 text-warning">0.0000 BTC</p>
                    
                  </div>
                </div>
              </div>
            </div>
                     <!-- demacate -->
                <!-- demacate -->
                <!-- demacate -->
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-baseline">
                      <ion-icon class="text-warning" name="arrow-up-circle-outline"></ion-icon>
                    <p class="card-title mb-1">Total Withdrawals</p>
                  </div>
                  <h4 class="mb-2 mt-1">$ <?php  echo number_format($running_invest,2) ?></h4>
                  <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <p class="mb-0 text-warning">0.0000 BTC</p>
                    
                  </div>
                </div>
              </div>
            </div>
                       <!-- demacate -->
                <!-- demacate -->
                <!-- demacate -->
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-baseline">
                      <ion-icon class="text-danger" name="gift-outline"></ion-icon>
                    <p class="card-title mb-1">BONUS &#127873;</p>
                  </div>
                  <h4 class="mb-2 mt-1">$  <?php echo $blocked_reward.".0"  ?></h4>
                  <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <p class="mb-0 text-warning">0.0000 BTC</p>
                    
                  </div>
                </div>
              </div>
            </div>
            
           <!-- demacate -->
                <!-- demacate -->
                <!-- demacate -->
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-baseline">
                      <ion-icon class="text-danger" name="gift-outline"></ion-icon>
                    <p class="card-title mb-1">Total Referral Earning</p>
                  </div>
                  <h4 class="mb-2 mt-1">$ <?php  echo number_format($referral_balance,2) ?></h4>
                  <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <p class="mb-0 text-warning">0.0000 BTC</p>
                    
                  </div>
                </div>
              </div>
            </div>
                        <!-- demacate -->
                <!-- demacate -->
                <!-- demacate -->
                <!-- <div class="col-md-3 grid-margin stretch-card">
                   <div class="card">
                       <div class="card-body">
                          <div class="d-flex align-items-baseline">
                              <ion-icon class="text-primary" name="swap-horizontal-outline"></ion-icon>
                             <p class="card-title mb-1">Total Transactions</p>
                           </div>
                           <h4 class="mb-2 mt-1">$ 0.00</h4>
                            <div class="d-flex justify-content-between align-items-center flex-wrap">
                                  <p class="mb-0 text-warning">0.0000 BTC</p>
                   
                            </div>
                        </div>
                    </div>
                </div> -->
                       <!-- demacate -->
                <!-- demacate -->
                <!-- demacate -->
          </div>
          
          
          
          
            
            
            
            <!--remove DIV her -->
        <!--  </div>


           
                
            
          
          

      </div>
      </div>
      </div>
    </div>


     -->

     <?php 

require "footer.php";

?>
