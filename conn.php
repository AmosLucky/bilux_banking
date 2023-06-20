<?php
$url = "https://www.greenedgeinvestmentventures.com";
 $company_logo = "<div style='padding: 20px; background-color:white!important'>
      <img src='https://www.greenedgeinvestmentventures.com/assets/images/logo.png'>
      </div>";

      $company_logo2 = $company_logo;


// $company_name = "Credence Wealth";
// $company_address = "22 Baker Street,
// London, United Kingdom,
// W1U 3BW";
// $company_phoneNumber = "12345678";
// $company_email = "support@credencewealth.net";


require 'model/model.php';
// $con = mysqli_connect("localhost","u341355510_greenedge","greenedge1@gmail.COM","u341355510_greenedge");
$con = mysqli_connect("localhost","root","","crypto");
$model = new Model($con);
$company = $model -> selectFromTable("company","id = '1'")['msg'][0];
//print_r($company);


//$company_logo = "uploads/".$company['company_logo'];
$domain = $company['domain'];
$company_name = $company['company_name'];
$company_address = $company['company_address'];
$company_phoneNumber = $company['company_phone'];
$company_phone = $company['company_phone'];
$company_email = $company['company_email'];
$company_contact_widget = $company['company_contact_widget'];
$company_title = $company['company_title'];
$company_telegram = "";

 $company_logo_link = "https://".$domain."/".$company_logo;
 $company_url = "https://".$domain






?>