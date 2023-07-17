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
                        <input type="text" readonly id='ref_cop' class="form-control" value="<?php echo $company_url ?>/signup?ref=<?php echo $user ?>">
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
              <?php
      


      $sql = "select * from  members where referred_by = '$user' and paid = '1' order by id desc"; 
      $result = mysqli_query($con,$sql)  or die("Error getting transactions ".mysqli_error($con));
      
      $sn = 0;
      while ($row = mysqli_fetch_array($result)) {

        $sn++;

        # code...
        $user = $row['username'];
        $amount = 0;
        //$state = $row['state'];
       // $date = $row['date'];
        $ref_id = $row['id'];

        $my_sql = "SELECT amount from transactions where user_id = '$ref_id' and transaction_type = 'Deposit' and status = 'approved' LIMIT 1";
        $res = mysqli_query($con,$my_sql);
       while( $r = mysqli_fetch_array($res)){
        $amount = $r['amount']/10;
       }
        


       
      

      ?>

      <tr>
      <td><?php  echo $sn ?></td>
        <td><?php  echo $user ?></td>
        <td>$<?php  echo $amount ?></td>
        
      </tr>
      

      <?php
      }


      ?>


                                
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