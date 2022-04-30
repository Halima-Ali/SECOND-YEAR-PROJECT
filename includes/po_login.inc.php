<?php

if(isset($_POST['po_login-submit'])){

 $userName= $_POST["po_uid"];
 $pwd= $_POST["po_pwd"];

 require_once 'db_config.php';
 require_once 'functionp_o.php';
 
 if(emptyInputLogin($userName, $pwd) !== false){
  header("location: ../po_login.php?error=emptyinput");
  exit(); //stops script from running
 }

 loginUser($conn, $userName,$pwd);

}
else{

 header("location: ../po_login.php");
  exit();
}