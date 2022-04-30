<?php

if(isset($_POST['agentlogin-submit'])){

 $userName1= $_POST["agentname"];
 $pwd1= $_POST["password"];

 require_once 'db_config.php';
 require_once 'functionsagents.inc.php';
 
 if(emptyInputLogin($userName1, $pwd1) !== false){
  header("location: ../agent_login.php?error=emptyinput");
  exit(); //stops script from running
 }

 loginUser($conn, $userName1,$pwd1);

}
else{

 header("location: ../agent_login.php");
  exit();
}