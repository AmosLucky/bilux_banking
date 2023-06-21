<?php
require "header.php";

?>
            
            <div class="row ">

    <div class="col-md-8 offset-md-2 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title">My Referral History</h3>
                  <p><small class="card-description text-info">
                    Share your referral link to your friends and earn a percentage every time they invest
                      </small></p>
                      <div class="row">
                          <div class="col-md-12">
                          <div class="form-group">
                    <div class="input-group">
                        <input type="text" readonly id='ref_cop' class="form-control" value="bitrylnux.com/signup.php?ref=tesabe">
                      <div class="input-group-append">
                          <button class="btn btn-sm btn-primary" id='ref_btn' type="button" onclick="copy_ref('ref_cop','#ref_btn');">Copy Referral Link</button>
                      </div>
                    </div>
                  </div>
                          </div>
                      </div>
                  <div class="row">
                      <div class="col-md-12">
          <div class="table-responsive">
            <table id="datatable2" class="table mg-b-0 tx-12" >
              <thead>
                <tr>
                    <th class="wd-15p">SN</th>
                  <th class="wd-15p">Referral</th>
                  <th class="wd-20p">Bonus</th>
                </tr>
              </thead>
              <tbody>
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
    </div>
      </div><!-- slim-mainpanel -->
      <?php
require "footer.php";

?>