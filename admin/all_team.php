<?php
include 'admin_head.php';
$msg = "";
if(isset($_POST['delete'])){
  $id = $_POST['d'];

  $sql = "DELETE FROM team where id = '$id'";
$result = mysqli_query($con,$sql) or die("Cant delete ".mysqli_error($con));
   if($result){

            $msg =  '<div class="alert alert-success text-center">SUCCESSFULLY DELETED</div>';
         }else{
            $msg = '<div class="alert alert-danger text-center"> ERROR: USER CANT BE DELETED</div>';
         }

}

?>




<div class="">
 
    <!-- <table class="table table-striped">
    <thead>
      <tr>
        <th>S/N</th>
        <th>username</th>
        <th>referred_by</th>
        <th>registered on</th>
        <th>balance</th>
        <th>referal balance</th>
        <th>bitcoin wallet</th>
        <th>etherum wallet</th>
         <th>Running investment</th>
      </tr>
    </thead>
    <tbody> -->
       <!-- DataTales Example -->
       <div class=""><?php echo $msg ?></div>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">ALL TEAM MEMBER</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                     <th>S/N</th>
        <th>Image</th>
        <!-- <th>referred_by</th> -->
        <!-- <th>registered on</th> -->
        <th>Title</th>
        <th>position</th>
        <!-- <th>bitcoin wallet</th>
        <th>etherum wallet</th> -->
         <th></th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>S/N</th>
                      <th>S/N</th>
        <th>Image</th>
        <!-- <th>referred_by</th> -->
        <!-- <th>registered on</th> -->
        <th>Name</th>
        <th>position</th>
        <!-- <th>bitcoin wallet</th>
        <th>etherum wallet</th> -->
         <th></th>
                    </tr>
                  </tfoot>
                  <tbody>
     <?php  

     $sql = "SELECT * FROM team order by id desc";
      $sn = 1;
     $result = mysqli_query($con,$sql) or die("cant select members ".mysqli_error($con));
     while ($row = mysqli_fetch_array($result)) {
        // $author =  $row['author'];
    //$body = strip_tags($row['body']);
    $name = $row['name'];
    $position = $row['position'];
    $featured_image = $row['featured_image'];
    // $link = $row['title'];
      $id = $row['id'];



        # code...
    

     ?>

      <tr>
        <td><?php echo $sn++; ?></td>
        <td>
          <img src="../uploads/<?php echo $featured_image; ?>" width="50">
        </td>
        <td><?php echo substr($name, 0,30); ?></td>
        <!-- <td><?php //echo $referred_by; ?></td> -->
        <!--  <td><?php //echo $date; ?></td> -->
        
        <td><?php echo $position; ?></td>
        
         
        <td> 
          
           <!--  ////////////////////////ACTION -->
            <div class="dropdown">
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    Action
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="new_team.php?e=<?php echo $id   ?>">Edit</a>
    <a class="dropdown-item" type="button" data-toggle="modal" data-target="#myModal<?php echo $id ?>" >Delete</a>

     
   
  </div>
</div>

<!-- Modal -->
  <div class="modal fade" id="myModal<?php  echo $id?>" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Delete?</h4>
        </div>
        <div class="modal-body">
          <p>You are about to delete this Post</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        <div class="modal-footer">
            <form method="POST">
              <input type="hidden" name="d" value="<?php echo $id ?>">
             <input type="submit" name="delete" value="delete" class="btn btn-danger">
              
            </form>
        </div>
      </div>
    </div>
  </div>
<!-- ///////////////////////////
 -->      </td>
 
      </tr>




     <?php  }  ?>
     
    </tbody>
  </table>
</div>
</div>
</div>
</div>



<?php
include 'admin_footer2.php';


?>