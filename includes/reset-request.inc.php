<?php

//WE WANT TO CREATE TE TOKEN AND SEND THE EMAIL

if(isset($_POST["reset-request-submit"])){

// token has to be made crypographically secure
// 2tokens - one for the authenticating the user and authenticating the token
// prevents timing attacks

$selector= bin2hex(random_bytes(8));
//convert into hexadecimal format using bin2hex
//we need to also convert it into binary

$token =random_bytes(32);
//is longer to ensure it is more secure
//to authenticate user

$url="www."
}
else{

 header("location: ../index.php");
 exit();
}