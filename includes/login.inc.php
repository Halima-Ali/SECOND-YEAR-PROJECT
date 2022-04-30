<?php

if(isset($_POST['login-submit'])){

 $userName= $_POST["uid"];
 $pwd= $_POST["pwd"];

 require_once 'db_config.php';
 require_once 'functions.inc.php';
 
 if(emptyInputLogin($userName, $pwd) !== false){
  header("location: ../login.php?error=emptyinput");
  exit(); //stops script from running
 }

 loginUser($conn, $userName,$pwd);

}
else{

 header("location: ../login.php");
  exit();
}