<?php

require "header.php";

?>
            
           
            <section class="frontpage-main"   > 
                <div class="frontpage-main__row"> 
                    <div class="frontpage-main__col frontpage-main__col_text animate"> 
                        <h1 class="animate__item animate__item_opacity animate__item_left">Investing <span style="color: #fff">has changed.<span></h1> 
                        <p class="animate__item animate__item_opacity animate__item_left animate__item_delay_1">
						Start today with Scalable Broker.
Invest easily and quickly in <span>stocks, ETFs and crypto.</span>
					</p> 
                                        <div class="frontpage-main__btns animate__item animate__item_opacity animate__item_top animate__item_delay_2"> <a  class="frontpage-main__btn button-bg " href="login" >Login to account</a> <a href="signup" class="frontpage-main__btn button-bordered">Get access</a> </div> 
                    </div> 
                    <div class="frontpage-main__col frontpage-main__col_img"> 
                        <img class="frontpage-main__img" src="template/default/img/Main_card.png" alt=" "> 
                        <img class="frontpage-main__light" src="template/default/img/light.svg" alt=" "> 
                        <div id="movement-trigger" class="frontpage-main__movement-trigger"></div> 
                    </div> 
                </div>  
                <section> 
                   <!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>
  <script type="text/javascript" src="../s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
  {
  "symbols": [
    {
      "description": "",
      "proName": "COINBASE:BTCUSD"
    },
    {
      "description": "",
      "proName": "COINBASE:ETHUSD"
    },
    {
      "description": "",
      "proName": "COINBASE:USDTUSD"
    },
    {
      "description": "",
      "proName": "BITFINEX:XRPUSD"
    },
    {
      "description": "",
      "proName": "COINBASE:SHIBUSD"
    },
    {
      "description": "",
      "proName": "NASDAQ:AAPL"
    },
    {
      "description": "",
      "proName": "NASDAQ:TSLA"
    },
    {
      "description": "",
      "proName": "NASDAQ:AMZN"
    },
    {
      "description": "",
      "proName": "FX:EURUSD"
    },
    {
      "description": "",
      "proName": "FX:GBPUSD"
    },
    {
      "description": "",
      "proName": "OANDA:EURUSD"
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
                    
           </section>  



           <section id="video" class="how-it-works animate"> 
                        <div class=" how-it-works__row"> 
                        
                            <div class="col-lg-6 animate"> 
                                <div class="how-it-works__col animate__item animate__item_opacity animate__item_top"> 
                                    <div class="how-it-works__text"> 
                                    <div class="video"> 
                            <img src="img/about.png" alt="png"> 
                        </div>
                                        <h3>About Us</h3> 
                                        <p>Our drive: to give all people the opportunity to consciously determine their own financial future.
                                         
As a leading investment platform in Europe, we do everything we can to enable access to the capital market through smart technologies, ease of use and low costs. We believe in entry opportunities, not entry barriers.
..<a href="about"><span>Learn More</span></a></p>

</div> 
                                </div> 
                            </div> 
                        </div> 
            </section> 



            <section id="video" class="how-it-works animate"> 
                        <div class=" how-it-works__row"> 
                        
                            <div class="col-lg-6 animate"> 
                                <div class="how-it-works__col animate__item animate__item_opacity animate__item_top"> 
                                    <div class="how-it-works__text"> 
                                    <div class="video"> 
                            <img src="img/crypto.png" alt="png"> 
                        </div>
                                        <h3>Explore Stock, Crypto investment</h3> 
                                        <p>At <?php echo $company_name ?>, Our international team, which is based in Munich, Berlin and London, combines comprehensive knowledge of the capital market and financial industry with decades of research experience in risk modelling, expertise in digital business models as well as technical and legal knowledge.<a href="service.php"><span>Learn More</span></a></p>

</div> 
                                </div> 
                            </div> 
                        </div> 
            </section> 




            <section id="steps" class="steps"> 
                <div class="tab-content"> 
                    <div id="pills-lender" class="scrolling steps__row steps__row_active tab-pane fade active show" role="tabpanel" aria-labelledby="pills-lender-tab"> 
                        <div class="steps__card flip-card"> 
                            <div class="flip-card-inner"> 
                                <div class="flip-card-front"> 
                                    <div class="steps__icon steps__icon_lender1"></div> 
                                    <div class="steps__title"> 
                                        <span>Create an account</span>
                                        <br />on our platform
								
                                    </div> 
                                    <div class="steps__arrow"> <div></div> </div> 
                                </div> 
                                <div class="flip-card-back"> 
                                    <div class="steps__icon steps__icon_borrower1"></div> 
                                    <div class="steps__title"> <span>Choose a plan</span><br />to start investment</div> 
                                    <div class="steps__arrow"> <div></div> </div> 
                                </div> 
                            </div> 
                        </div> 
                        <div class="steps__card flip-card"> 
                            <div class="flip-card-inner flip-card-inner_delay-1"> 
                                <div class="flip-card-front"> 
                                    <div class="steps__icon steps__icon_lender2"></div> 
                                    <div class="steps__title"> <span>Make Deposit</span><br />which suits you
								
                                    </div> 
                                    <div class="steps__arrow"> 
                                        <div>
                                            
                                        </div> 
                                    </div> 
                                </div> 
                                <div class="flip-card-back"> 
                                    <div class="steps__icon steps__icon_borrower2"></div> 
                                    <div class="steps__title"> <span>Get Confirmation</span><br />of your Deposit
								</div> 
                                    <div class="steps__arrow"> <div></div> </div> 
                                </div> 
                            </div> 
                        </div> 
                        <div class="steps__card flip-card"> 
                            <div class="flip-card-inner flip-card-inner_delay-2"> 
                                <div class="flip-card-front"> 
                                    <div class="steps__icon steps__icon_lender3"></div> 
                                    <div class="steps__title"> <span>Add wallets</span><br />fast and safe
								</div> 
                                    <div class="steps__arrow"> 
                                        <div>
                                            
                                        </div> 
                                    </div> 
                                </div> 
                                <div class="flip-card-back"> 
                                    <div class="steps__icon steps__icon_borrower3"></div> 
                                    <div class="steps__title"> <span>Get funds</span><br />straightly on balance
								</div> 
                                    <div class="steps__arrow"> <div></div> </div> 
                                </div> 
                            </div> 
                        </div> 
                        <div class="steps__card flip-card"> 
                            <div class="flip-card-inner flip-card-inner_delay-3"> 
                                <div class="flip-card-front"> 
                                    <div class="steps__icon steps__icon_lender4"></div> 
                                    <div class="steps__title"> <span>Get daily profit</span><br />from Investment
								</div> 
                                    <div class="steps__arrow"> <div></div> </div> 
                                </div> 
                                <div class="flip-card-back"> 
                                    <div class="steps__icon steps__icon_borrower4"></div> 
                                    <div class="steps__title"> <span>Withdraw</span><br />Investment
								</div> 
                                    <div class="steps__arrow"> <div></div> </div> 
                                </div> 
                            </div> 
                        </div> 
                    </div> 
                </div> 
                <ul class="nav nav-pills"> 
                    <li class="nav-item active"> 
                        <a class="nav-link active nav-pills__link" id="pills-lender-tab" data-toggle="pill" href="#pills-lender" role="tab" aria-controls="pills-lender" aria-selected="true">For Beginner</a> </li> 
                    <li class="nav-item"> 
                        <a class="nav-link nav-pills__link" id="pills-borrower-tab" data-toggle="pill" href="#pills-borrower" role="tab" aria-controls="pills-borrower" aria-selected="false">For investor</a> 
                    </li> 
                    <li class="nav-item__slider" role="presentation"></li> 
                </ul> 
                <div class="steps__text">
				For over 5 years, we pride ourselves on our commitment to excellence, as well as our ability to create funds for our investors.
			</div> 
            </section> 

           


            <section id="video" class="how-it-works animate"> 
                            <h3 class="how-it-works__title animate__item animate__item_opacity animate__item_top">
                                <?php echo $company_name ?></h3> 
                            <p class="how-it-works__posttitle animate__item animate__item_opacity animate__item_top animate__item_delay_1">
				Take advantage of proven solutions to achieve cryptocoin success
			</p> 
                        <div class="video"> 
                            <video src="img/crypto.mp4" alt="Video"></video> 
                            <div class="ceo-quote animate__item animate__item_opacity animate__item_top animate__item_delay_2"> 
                                <p class="ceo-quote__text">"<?php echo $company_name ?> - get new opportunities today!"</p> 
                            </div> 
                        </div> 
                        <div class="animate__item animate__item_opacity animate__item_top animate__item_delay_3"> 
                            <a href="signup" class="button-bg">Registration</a> 
                        </div> 
                        <div class=" how-it-works__row"> 
                            <div class="col-lg-6 animate"> 
                                <div class="how-it-works__col animate__item animate__item_opacity animate__item_top"> 
                                    <div class="how-it-works__text"> 
                                        <h3>Recent Verified Deposits</h3> 
                                        <p>
								Below is a live update of Deposits from our clients, it is updated every 5 minutes.
							</p> 
                                    </div> 
                                    <div class="how-it-works__cards"> 
                                        <div class="how-it-works__decor"> 
                                            <div class="how-it-works__decor-item"></div> 
                                            <div class="how-it-works__decor-item"></div> 
                                        </div> 
                                        
                                        
                                                                                
                                        <div class="how-it-works__card how-it-works__card_third animate__item animate__item_opacity animate__item_right  animate__item_delay_3"> 
                                            
                                            <div class="how-it-works__description"> 
                                                <div class="how-it-works__name">tesabe</div> 
                                                <p class="how-it-works__action">
										invested <span class="how-it-works__action_marked">$100.00</span>
									</p> 
                                            </div> 
                                        </div> 
                                        
                                                                                 
                                        <div class="how-it-works__card how-it-works__card_third animate__item animate__item_opacity animate__item_right  animate__item_delay_3"> 
                                            
                                            <div class="how-it-works__description"> 
                                                <div class="how-it-works__name"></div> 
                                                <p class="how-it-works__action">
										invested <span class="how-it-works__action_marked">$100.00</span>
									</p> 
                                            </div> 
                                        </div> 
                                        
                                                                                 
                                        <div class="how-it-works__card how-it-works__card_third animate__item animate__item_opacity animate__item_right  animate__item_delay_3"> 
                                            
                                            <div class="how-it-works__description"> 
                                                <div class="how-it-works__name">Kido</div> 
                                                <p class="how-it-works__action">
										invested <span class="how-it-works__action_marked">$456.00</span>
									</p> 
                                            </div> 
                                        </div> 
                                        
                                                                                 
                                        
                                    </div> 
                                </div> 
                            </div> 
                            <div class="col-lg-6 animate"> 
                                <div class="how-it-works__col animate__item animate__item_opacity animate__item_top"> 
                                    <div class="how-it-works__text"> 
                                        <h3>Recent Verified Withdrawals</h3> 
                                        <p>
								Below is a live update of Withdrawals from our clients, it is updated every 5 minutes.
							</p> 
                                    </div> 
                                    <div class="how-it-works__cards"> 
                                        <div class="how-it-works__decor"> 
                                            <div class="how-it-works__decor-item"></div> 
                                            <div class="how-it-works__decor-item"></div> 
                                        </div> 
                                        
                                        
                                                                                
                                        
                                    </div> 
                                </div> 
                            </div> 
                        </div> 
                        </section> 
            
            
                                                
    <section class="plans animate"> 
                
                <h3 class="plans__title animate__item animate__item_opacity animate__item_top">Investment plans</h3> <p class="plans__posttitle animate__item animate__item_opacity animate__item_top animate__item_delay_1">
				We understand the needs of our customers very much that our investment plans covers the widest range of benefits.
			</p> 
                        <ul class="nav nav-pills plans__pills"> <li class="nav-item active"> 
                                <a class="nav-link active nav-pills__link" id="pills-plans-1-tab" data-toggle="pill" href="#pills-plans-1" role="tab" aria-controls="pills-plans-1" aria-selected="true">
						Plans
					</a> 
                            </li> 
                            <li class="nav-item__slider" role="presentation"></li> 
                        </ul> 
                        <div class="tab-content"> 
                            <div id="pills-plans-1" class="scrolling steps__row steps__row_active tab-pane fade active show" role="tabpanel" aria-labelledby="pills-lender-tab"> 
                                <div class="plans__row row scrolling"> 
                                    
                                                                        
                                    
                                    
                                    <div class="col-md-4 animate__item animate__item_opacity animate__item_top animate__item_delay_2"> 
                                        <div class="plans__item"> 
                                            <div class="plans__name"> 
                                                <div class="plan-icon plan-icon_c"></div> 
                                                <h5>PLATINUM PLAN</h5> 
                                            </div> 
                                            <div class="plans__info info-row"> 
                                                <div class="info-row__label"><span class="icon icon_percent"></span>Referral Bonus</div> 
                                                <div class="info-row__data info-row__data_marked">10%</div> 
                                            </div> 
                                            <div class="plans__info info-row"> 
                                                <div class="info-row__label"><span class="icon icon_period"></span>Investment period</div> 
                                                <div class="info-row__data">10 Day(s)</div> 
                                            </div>  
                                            <div class="plans__info info-row"> 
                                                <div class="info-row__label"><span class="icon icon_profit"></span>Daily profit</div> 
                                                <div class="info-row__data info-row__data_marked">10.0%</div> 
                                            </div> 
                                            <div class="plans__info info-row"> 
                                                <div class="info-row__label"><span class="icon icon_month-prof"></span>Total profit:</div> 
                                                <div class="info-row__data">100%</div> 
                                            </div> 
                                            <div class="plans__info info-row"> 
                                                <div class="info-row__label"><span class="icon icon_depo"></span>Deposit :</div> 
                                                <div class="info-row__data">Included in payments</div> 
                                            </div> 
                                            <div class="plans__info info-row"> 
                                                <div class="info-row__label"><span class="icon icon_limits"></span>Investment limits:</div> 
                                                <div class="info-row__data">$100,000.00 - $1,000,000.00</div> 
                                            </div> 
                                        </div> 
                                    </div>
                                    
                                    
                                                                        
                                    
                                    
                                    <div class="col-md-4 animate__item animate__item_opacity animate__item_top animate__item_delay_2"> 
                                        <div class="plans__item"> 
                                            <div class="plans__name"> 
                                                <div class="plan-icon plan-icon_c"></div> 
                                                <h5>SILVER PLAN</h5> 
                                            </div> 
                                            <div class="plans__info info-row"> 
                                                <div class="info-row__label"><span class="icon icon_percent"></span>Referral Bonus</div> 
                                                <div class="info-row__data info-row__data_marked">10%</div> 
                                            </div> 
                                            <div class="plans__info info-row"> 
                                                <div class="info-row__label"><span class="icon icon_period"></span>Investment period</div> 
                                                <div class="info-row__data">10 Day(s)</div> 
                                            </div>  
                                            <div class="plans__info info-row"> 
                                                <div class="info-row__label"><span class="icon icon_profit"></span>Daily profit</div> 
                                                <div class="info-row__data info-row__data_marked">6.0%</div> 
                                            </div> 
                                            <div class="plans__info info-row"> 
                                                <div class="info-row__label"><span class="icon icon_month-prof"></span>Total profit:</div> 
                                                <div class="info-row__data">60%</div> 
                                            </div> 
                                            <div class="plans__info info-row"> 
                                                <div class="info-row__label"><span class="icon icon_depo"></span>Deposit :</div> 
                                                <div class="info-row__data">Included in payments</div> 
                                            </div> 
                                            <div class="plans__info info-row"> 
                                                <div class="info-row__label"><span class="icon icon_limits"></span>Investment limits:</div> 
                                                <div class="info-row__data">$10,000.00 - $100,000.00</div> 
                                            </div> 
                                        </div> 
                                    </div>
                                    
                                    
                                                                        
                                    
                                    
                                    <div class="col-md-4 animate__item animate__item_opacity animate__item_top animate__item_delay_2"> 
                                        <div class="plans__item"> 
                                            <div class="plans__name"> 
                                                <div class="plan-icon plan-icon_c"></div> 
                                                <h5>BASIC PLAN</h5> 
                                            </div> 
                                            <div class="plans__info info-row"> 
                                                <div class="info-row__label"><span class="icon icon_percent"></span>Referral Bonus</div> 
                                                <div class="info-row__data info-row__data_marked">10%</div> 
                                            </div> 
                                            <div class="plans__info info-row"> 
                                                <div class="info-row__label"><span class="icon icon_period"></span>Investment period</div> 
                                                <div class="info-row__data">10 Day(s)</div> 
                                            </div>  
                                            <div class="plans__info info-row"> 
                                                <div class="info-row__label"><span class="icon icon_profit"></span>Daily profit</div> 
                                                <div class="info-row__data info-row__data_marked">3.0%</div> 
                                            </div> 
                                            <div class="plans__info info-row"> 
                                                <div class="info-row__label"><span class="icon icon_month-prof"></span>Total profit:</div> 
                                                <div class="info-row__data">30%</div> 
                                            </div> 
                                            <div class="plans__info info-row"> 
                                                <div class="info-row__label"><span class="icon icon_depo"></span>Deposit :</div> 
                                                <div class="info-row__data">Included in payments</div> 
                                            </div> 
                                            <div class="plans__info info-row"> 
                                                <div class="info-row__label"><span class="icon icon_limits"></span>Investment limits:</div> 
                                                <div class="info-row__data">$50.00 - $10,000.00</div> 
                                            </div> 
                                        </div> 
                                    </div>
                                    
                                    
                                                                        
                                      
                                </div> 
                            </div> 
                          
            </section> 
            
            
            
            <section class="calc"> 
                
                
                <!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>
  <script type="text/javascript" src="../s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
  {
  "symbols": [
    {
      "description": "",
      "proName": "COINBASE:BTCUSD"
    },
    {
      "description": "",
      "proName": "COINBASE:ETHUSD"
    },
    {
      "description": "",
      "proName": "COINBASE:USDTUSD"
    },
    {
      "description": "",
      "proName": "BITFINEX:XRPUSD"
    },
    {
      "description": "",
      "proName": "COINBASE:SHIBUSD"
    },
    {
      "description": "",
      "proName": "NASDAQ:AAPL"
    },
    {
      "description": "",
      "proName": "NASDAQ:TSLA"
    },
    {
      "description": "",
      "proName": "NASDAQ:AMZN"
    },
    {
      "description": "",
      "proName": "FX:EURUSD"
    },
    {
      "description": "",
      "proName": "FX:GBPUSD"
    },
    {
      "description": "",
      "proName": "OANDA:EURUSD"
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
                
            
            </section> 
            
            
            
            <div class="milestones-animate animate"> 
                <section class="milestones"> <div class="milestones__row"> <div class="milestones__item animate__item animate__item_delay_1"> <div> <div class="milestones__title">Q3 2009</div> <div class="milestones__text">Domain registration <br><?php echo $company_name ?>.com</div> </div> <svg width="2" height="404" viewBox="0 0 2 404" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M1 0V403.5" stroke="url(#paint0_linear_3959_893)" stroke-dasharray="2.2 2.2"/> <defs> <linearGradient id="paint0_linear_3959_893" x1="1.5" y1="0" x2="1.5" y2="403.5" gradientUnits="userSpaceOnUse"> <stop stop-color="#51497A" stop-opacity="0.5"/> <stop offset="0.661458" stop-color="#0F092E"/> </linearGradient> </defs> </svg> </div> <div class="milestones__item animate__item animate__item_delay_3"> <div> <div class="milestones__title">Q4 2010</div> <div class="milestones__text">Forming of qualified<br>Top managers team</div> </div> <svg width="2" height="404" viewBox="0 0 2 404" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M1 0V403.5" stroke="url(#paint0_linear_3959_893)" stroke-dasharray="2.2 2.2"/> <defs> <linearGradient id="paint0_linear_3959_893" x1="1.5" y1="0" x2="1.5" y2="403.5" gradientUnits="userSpaceOnUse"> <stop stop-color="#51497A" stop-opacity="0.5"/> <stop offset="0.661458" stop-color="#0F092E"/> </linearGradient> </defs> </svg> </div> <div class="milestones__item animate__item animate__item_delay_5"> <div> <div class="milestones__title">Q4 2016</div> <div class="milestones__text">Company registration<br>in England</div> </div> <svg width="2" height="404" viewBox="0 0 2 404" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M1 0V403.5" stroke="url(#paint0_linear_3959_893)" stroke-dasharray="2.2 2.2"/> <defs> <linearGradient id="paint0_linear_3959_893" x1="1.5" y1="0" x2="1.5" y2="403.5" gradientUnits="userSpaceOnUse"> <stop stop-color="#51497A" stop-opacity="0.5"/> <stop offset="0.661458" stop-color="#0F092E"/> </linearGradient> </defs> </svg> </div> <div class="milestones__item milestones__item_unactive"> <div> <div class="milestones__title">Q4 2024</div> <div class="milestones__text">Request Loan<br>Beta testing</div> </div> <svg width="2" height="404" viewBox="0 0 2 404" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M1 0V403.5" stroke="url(#paint0_linear_3959_893)" stroke-dasharray="2.2 2.2"/> <defs> <linearGradient id="paint0_linear_3959_893" x1="1.5" y1="0" x2="1.5" y2="403.5" gradientUnits="userSpaceOnUse"> <stop stop-color="#51497A" stop-opacity="0.5"/> <stop offset="0.661458" stop-color="#0F092E"/> </linearGradient> </defs> </svg> </div> <div class="milestones__item milestones__item_unactive"> <div> <div class="milestones__title">Q3 2025</div> <div class="milestones__text"><?php echo $company_name ?> Metaverse<br>Beta version</div> </div> <svg width="2" height="404" viewBox="0 0 2 404" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M1 0V403.5" stroke="url(#paint0_linear_3959_893)" stroke-dasharray="2.2 2.2"/> <defs> <linearGradient id="paint0_linear_3959_893" x1="1.5" y1="0" x2="1.5" y2="403.5" gradientUnits="userSpaceOnUse"> <stop stop-color="#51497A" stop-opacity="0.5"/> <stop offset="0.661458" stop-color="#0F092E"/> </linearGradient> </defs> </svg> </div> </div> <div class="milestones__row"> <div class="milestones__item animate__item animate__item_delay_2"> <div> <div class="milestones__title">Q2 2010</div> <div class="milestones__text"> Preparation and<br>Platform designing</div> </div> <svg width="1" height="404" viewBox="0 0 1 404" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M0.5 403.5L0.499965 0" stroke="url(#paint0_linear)" stroke-dasharray="2.2 2.2" /> <defs> <linearGradient id="paint0_linear" x1="0" y1="403.5" x2="-3.52751e-05" y2="4.37114e-08" gradientUnits="userSpaceOnUse"> <stop stop-color="#51497A" stop-opacity="0.5" /> <stop offset="0.661458" stop-color="#0F092E" /> </linearGradient> </defs> </svg> </div> <div class="milestones__item animate__item animate__item_delay_4"> <div> <div class="milestones__title">Q1 2011</div> <div class="milestones__text">Platform development <br> Process started</div> </div> <svg width="1" height="404" viewBox="0 0 1 404" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M0.5 403.5L0.499965 0" stroke="url(#paint0_linear)" stroke-dasharray="2.2 2.2" /> <defs> <linearGradient id="paint0_linear" x1="0" y1="403.5" x2="-3.52751e-05" y2="4.37114e-08" gradientUnits="userSpaceOnUse"> <stop stop-color="#51497A" stop-opacity="0.5" /> <stop offset="0.661458" stop-color="#0F092E" /> </linearGradient> </defs> </svg> </div> <div class="milestones__item animate__item animate__item_delay_6"> <div> <div class="milestones__title">Q1 2017</div> <div class="milestones__text">Platform opening<br> For online users</div> </div> <svg width="1" height="404" viewBox="0 0 1 404" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M0.5 403.5L0.499965 0" stroke="url(#paint0_linear)" stroke-dasharray="2.2 2.2" /> <defs> <linearGradient id="paint0_linear" x1="0" y1="403.5" x2="-3.52751e-05" y2="4.37114e-08" gradientUnits="userSpaceOnUse"> <stop stop-color="#51497A" stop-opacity="0.5" /> <stop offset="0.661458" stop-color="#0F092E" /> </linearGradient> </defs> </svg> </div> <div class="milestones__item milestones__item_unactive"> <div> <div class="milestones__title">Q1 2023</div> <div class="milestones__text">LQDC Token<br>At PancakeSwap</div> </div> <svg width="1" height="404" viewBox="0 0 1 404" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M0.5 403.5L0.499965 0" stroke="url(#paint0_linear)" stroke-dasharray="2.2 2.2" /> <defs> <linearGradient id="paint0_linear" x1="0" y1="403.5" x2="-3.52751e-05" y2="4.37114e-08" gradientUnits="userSpaceOnUse"> <stop stop-color="#51497A" stop-opacity="0.5" /> <stop offset="0.661458" stop-color="#0F092E" /> </linearGradient> </defs> </svg> </div> </div> <svg width="1920" height="495" viewBox="0 0 1920 495" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M0.5 494L485 260L600 329L723.5 229L840 359L963 260L1080 329L1203 229L1319.5 359L1445 260L1548.5 329L1920 1" stroke="#352D61" stroke-width="2" /> </svg> <svg width="1920" height="875" viewBox="0 0 1920 875" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M485 259L0.5 493V875H1920V0L1548.5 328L1445 259L1319.5 358L1203 228L1080 328L963 259L840 358L723.5 228L600 328L485 259Z" fill="url(#paint0_linear_3343:495)" /> <defs> <linearGradient id="paint0_linear_3343:495" x1="960.25" y1="0" x2="960.25" y2="875" gradientUnits="userSpaceOnUse"> <stop offset="0.0001" stop-color="white" stop-opacity="0.04" /> <stop offset="1" stop-color="white" stop-opacity="0" /> </linearGradient> </defs> </svg> <svg width="1121" height="268" viewBox="0 0 1121 268" fill="none" xmlns="http://www.w3.org/2000/svg" class="milestones__progress"> <path stroke-dasharray="3000 3000" stroke-dashoffset="0" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" d="M0.5 267L485 33L600 102L723.5 2L840 132L963 33L1080 102L1120 69.4797" stroke="#FED501" stroke-width="2"> <animate id="animated-svg" class="active" attributeName="stroke-dashoffset" begin="trigger.click" from="3000" to="0" dur="3.5s" fill="freeze"></animate> </path> </svg> <svg width="1924" height="614" viewBox="0 0 1924 614" fill="none" xmlns="http://www.w3.org/2000/svg" class="milestones__line_mobile"> <path d="M1 612.5L543.64 281.598C548.914 278.382 555.379 277.783 561.153 279.976L749.5 351.5L951.5 210L1151.5 304L1352.5 157L1547 261.5L1922.5 1" stroke="#352D61" stroke-width="2" /> <path d="M1 612.5L543.64 281.598C548.914 278.382 555.379 277.783 561.153 279.976L749.5 351.5L951.5 210L1151.5 304L1252 230.5" stroke="#FED501" stroke-width="2" /> </svg> <svg width="1922" height="1234" viewBox="0 0 1922 1234" fill="none" xmlns="http://www.w3.org/2000/svg" class="milestones__line_mobile"> <path d="M551 276L0 612V1234H1922L1921.5 0.5L1546 261L1351.5 156.5L1150.5 303.5L950.5 209.5L748.5 351L551 276Z" fill="url(#paint0_linear_1993:473)" /> <defs> <linearGradient id="paint0_linear_1993:473" x1="961" y1="0.5" x2="961" y2="1234" gradientUnits="userSpaceOnUse"> <stop offset="0.0001" stop-color="white" stop-opacity="0.04" /> <stop offset="1" stop-color="white" stop-opacity="0" /> </linearGradient> </defs> </svg> </section> 
                <section class="graychain"> <p class="graychain__text animate__item animate__item_opacity animate__item_top animate__item_delay_2">
					With <?php echo $company_name ?>, Crypto investment will be<br>available for everyone <span> and have no limits</span> </p> <div class="graychain__wrap"> <div class="graychain__item animate__item animate__item_opacity animate__item_delay_4"> <div class="graychain__flag graychain__flag_en"></div> <div class="graychain__sum">$ 687,800,000.00</div> <div class="graychain__label">investment received</div> </div> <div class="graychain__item animate__item animate__item_opacity animate__item_delay_4"> <div class="graychain__flag graychain__flag_ru"></div> <div class="graychain__sum">111,767</div> <div class="graychain__label">Card Issued</div> </div> <div class="graychain__map animate__item animate__item_opacity animate__item_top animate__item_delay_3"></div> </div> </section> 
            </div> 
            
            
            
           
            
            
            
           <!-- <section class="team animate"> <h3 class="animate__item animate__item_opacity animate__item_top"> Team</h3> <div class="team__row scrolling"> <div class="team__col animate__item animate__item_opacity animate__item_top animate__item_delay_1"> <div class="team__item"> <img src="template/default/img/team-3.png" alt=" "> <div class="team__info"> <h5>Sean Hanson</h5> <p>CTO</p> </div> <div class="team__info"> <h5>Education</h5> <p>Melbourne University </p> </div> <div class="team__info"> <h5>Working experience</h5> <p>Electronic Arts</p> </div> </div> </div> <div class="team__col animate__item animate__item_opacity animate__item_top animate__item_delay_2"> <div class="team__item"> <img src="template/default/img/team-2.png" alt=" "> <div class="team__info"> <h5>Alexander Walker</h5> <p>CFO</p> </div> <div class="team__info"> <h5>Education</h5> <p>Imperial College London </p> </div> <div class="team__info"> <h5>Working experience</h5> <p>Bank of England</p> </div> </div> </div> <div class="team__col animate__item animate__item_opacity animate__item_top animate__item_delay_3"> <div class="team__item team__item_main"> <img src="template/default/img/ceo_img.png" alt=" "> <div class="team__info"> <h5>Tom Dyer</h5> <p>CEO</p> </div> <div class="team__info"> <h5>Education</h5> <p>Boston University</p> </div> <div class="team__info"> <h5>Working experience</h5> <p>Microsoft</p> </div>  </div> </div> <div class="team__col animate__item animate__item_opacity animate__item_top animate__item_delay_4"> <div class="team__item"> <img src="template/default/img/team-1.png" alt=" "> <div class="team__info"> <h5>Morgan Lucas</h5> <p>CMO</p> </div> <div class="team__info"> <h5>Education</h5> <p>Sydney University</p> </div> <div class="team__info"> <h5>Working experience</h5> <p>Telestra</p> </div> </div> </div> <div class="team__col animate__item animate__item_opacity animate__item_top animate__item_delay_5"> <div class="team__item"> <img src="template/default/img/team-4.png" alt=" "> <div class="team__info"> <h5>Harley Owens</h5> <p>HR</p> </div> <div class="team__info"> <h5>Education</h5> <p>University of Edinburgh </p> </div> <div class="team__info"> <h5>Working experience</h5> <p>Amazon</p> </div> </div> </div> </div> 
            </section> --> 
            
            
            
            
            <section class="documents animate"> <h3 class="documents__title animate__item animate__item_opacity animate__item_top">Company documents</h3> <p class="documents__posttitle animate__item animate__item_opacity animate__item_top animate__item_delay_1">
				Our company is registered in England and you can check <br> our documents in the official England registry.
                </p> <div class="documents__row"> <div class="documents__item animate__item animate__item_opacity animate__item_top animate__item_delay_3"> <div class="documents__info"> <div class="documents__label"><span class="documents__icon icon icon_user"></span>Company founder</div> <div class="documents__value">Charles McKenzie</div> </div> <div class="documents__info"> <div class="documents__label"><span class="documents__icon icon icon_overpay"></span>Compamy name</div> <div class="documents__value"><?php echo $company_name ?> PTY LTD</div> </div> <div class="documents__info"> <div class="documents__label"><span class="documents__icon icon icon_date"></span>Founded in</div> <div class="documents__value">29 Nov 2016</div> </div> </div> <!-- <div class="documents__item animate__item animate__item_opacity animate__item_top animate__item_delay_2"> <img src="img/cert.jpg" alt=" "> <a href="img/cert.jpg" class="button-bg" target="_blank">Show document</a> </div>--> <div class="documents__item animate__item animate__item_opacity animate__item_top animate__item_delay_3"> <div class="documents__info"> <div class="documents__label"><span class="documents__icon icon icon_doc"></span>Reg.Number</div> <div class="documents__value">138898</div> </div> <div class="documents__info"> <div class="documents__label"><span class="documents__icon icon icon_country"></span>Office address</div> <div class="documents__value">
							64 Thornton StHURSLEYSO21 1NS						</div> </div>  </div> </div> 
            </section> 
            
            
            <section class="finfreedom animate"> <h3 class="finfreedom__title animate__item animate__item_opacity animate__item_top">Financial freedom with <?php echo $company_name ?></h3> <p class="finfreedom__posttitle animate__item animate__item_opacity animate__item_top animate__item_delay_1">
				We care for our clients
			</p> <div class="row"> <div class="finfreedom__col animate__item animate__item_opacity animate__item_top animate__item_delay_2"> <div class="finfreedom__card finfreedom__card_lender"> <div class="finfreedom__triangle finfreedom__triangle_lender">For investor</div> <div class="finfreedom__item"> <div class="finfreedom__icon finfreedom__icon_garantee"></div> <div> <div class="finfreedom__name">
									Return guarantee
								</div> <div class="finfreedom__text">
									Investments accruals is guaranteed by stability fund
								</div> </div> </div> <div class="finfreedom__item"> <div class="finfreedom__icon finfreedom__icon_insurance"></div> <div> <div class="finfreedom__name">
									Investment reliability
								</div> <div class="finfreedom__text">
									We monitor our systems 24 hours daily, user data is encrypted and protected <a href="#" class="finfreedom__link" target="_blank"></a> </div> </div> </div> <div class="finfreedom__item"> <div class="finfreedom__icon finfreedom__icon_passive"></div> <div> <div class="finfreedom__name">
									Passive income
								</div> <div class="finfreedom__text">
									Once you invest, all that you need is to withdraw profit from account
                                                                </div> <a href="signup" class="button-bg" target="_blank">Become an investor</a> </div> </div> </div> </div> <div class="finfreedom__col animate__item animate__item_opacity animate__item_top animate__item_delay_3"> <div class="finfreedom__card finfreedom__card_borrower"> <div class="finfreedom__triangle finfreedom__triangle_borrower"></div> <div class="finfreedom__item"> <div class="finfreedom__icon finfreedom__icon_conditions"></div> <div> <div class="finfreedom__name">
									Flexible conditions
								</div> <div class="finfreedom__text">
									<?php echo $company_name ?> is a safe and secured option, which ensures steady growth on your investments with daily returns on an ongoing basis with no hustle and instantly
								</div> </div> </div> <div class="finfreedom__item"> <div class="finfreedom__icon finfreedom__icon_history" alt=" "></div> <div> <div class="finfreedom__name">
									User Support
								</div> <div class="finfreedom__text">
									<?php echo $company_name ?> is backed by team of professionals, experts and specialist of trading market providing 24/7 guidance and support to the users ensuring a reliable system.
								</div> </div> </div> <div class="finfreedom__item"> <div class="finfreedom__icon finfreedom__icon_easy"></div> <div> <div class="finfreedom__name">
									Fast using
								</div> <div class="finfreedom__text">
									The most advanced intelligent monitoring technology with high level of professionalism of <?php echo $company_name ?> provides safe returns on your investments ensuring maximum efficiency.
								</div> <a href="about" class="button-bordered" target="_blank">Read more</a> </div> </div> </div> </div> </div> 
            </section> 
            
            
            
              
        </div> 
    </main> 
    
  <?php

  require "footer.php";
  
  ?>