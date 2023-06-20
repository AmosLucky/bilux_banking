<?php 
if(!isset($_SESSION['admin'])){
   echo " <script>
        window.location.href='../login.php';
        </script>";

}

?>