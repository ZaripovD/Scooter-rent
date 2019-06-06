<?php require 'php/db.php';?>

 <div class="row" id="session" style="text-align: right; padding-right: 50px;"> 
<?php 

$data = $_POST;
  if (isset ($_SESSION['logged_user'])) {
  	$ses = $_SESSION['logged_user'];
    $sesid = $_SESSION['logged_user']->id;
   if ($_SESSION['logged_user']->id_role == 2) {
     include("includes/header3.php"); 
   echo ('Вы администратор '); echo $_SESSION['logged_user']->login; 

  } else {

    include("includes/header2.php"); 
   echo ('Вы вошли как '); echo $_SESSION['logged_user']->login; 

}
} else {
  error_reporting(0);
    include("includes/header.php"); 
   echo 'Вы вошли как гость';

}


 ?>
</div> 

