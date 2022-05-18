<!-- contains the functions -->
<?php

function emptyInputSignup($name1, $email1, $userName1, $pwd1,$pwdRepeat1){

 // checks if the fields are not empty
  $result;// will either be true or false

 if(empty($name1) || empty($userName1) || empty($email1) || empty($pwd1) || empty($pwdRepeat1)){
  $result= true;
 }
 else{
  // no error
  $result= false;

 }
 return $result;
}

function invalidUId($userName1){
  $result;// will either be true or false

 if(!preg_match('/^[a-zA-Z0-9]*$/', $userName1)){
  $result= true;
 }
 else{
  // no error
  $result= false;

 }
 return $result;
}

function invalidEmail($email1){

  $result;// will either be true or false

 if(!filter_var($email1, FILTER_VALIDATE_EMAIL )){
  $result= true;
 }
 else{
  // no error
  $result= false;

 }
 return $result;
}

function pwdMatch($pwd1, $pwdRepeat1){
  $result;// will either be true or false

 if($pwd1!== $pwdRepeat1){
  $result= true;
 }
 else{
  // no error
  $result= false;
 }
 return $result;
 
}

function uidExists($conn, $userName1, $email1){

// checks if the username already exist inside the database
$sql = "SELECT * FROM usersagents WHERE username=? OR Email= ?;";
// ? is a placeholder for the prepared statement to prevent sql injection

$stmt= mysqli_stmt_init($conn);
//initializing a new prepared statement. pass in connection variable
 
// if the prepared statement suceeds or fails
if(!mysqli_stmt_prepare($stmt,$sql)){
 //if there is an error
 header("location: ../agent_signup.php?error=stmtfailed");
}

mysqli_stmt_bind_param($stmt,"ss", $userName1, $email1);
mysqli_stmt_execute($stmt);

$resultData=mysqli_stmt_get_result($stmt);
//we want to get the result from the prepared statemnt up there

if($row = mysqli_fetch_assoc($resultData)){
//fetching the data as an associative array;
  return $row; 

} else{

 $result= false;
 return $result;
}

mysqli_stmt_close($stmt);
}

function createUser($conn, $name1 ,$email1, $userName1, $pwd1){

// inserts data inside the database
$sql = "INSERT INTO usersagents(agentName ,Email, username ,agentpassword) VALUES (?,?,?,?);";
// ? is a placeholder for the prepared statement to prevent sql injection

$stmt= mysqli_stmt_init($conn);
//initializing a new prepared statement. pass in connection variable
 
// if the prepared statement suceeds or fails
if(!mysqli_stmt_prepare($stmt,$sql)){
 //if there is an error
 header("location: ../agent_signup.php?error=stmtfailed");
}

// we want to hash the password
//PASSWORD_DEFAULT we are using the default hashing method
$hashedPwd=password_hash($pwd1, PASSWORD_DEFAULT);

mysqli_stmt_bind_param($stmt,"ssss", $name1, $email1, $userName1 ,$hashedPwd);

mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

header("location:../agent_signup.php?error=signupsuccesful");
}

// login functions
function emptyInputLogin($userName1, $pwd1){

 // checks if the fields are not empty
  $result;// will either be true or false
 if( empty($userName1)  || empty($pwd1)){
  $result= true;
 }
 else{
  // no error
  $result= false;

 }
 return $result;
}

function loginUser($conn, $userName1,$pwd1){

  //check if the username exists
  //either the username or email = sql statement uses an OR
  $uidExists= uidExists($conn, $userName1, $userName1);


  //we want to check if the function returns as false- user doesn't exist
  if($uidExists === false){
    header("location: ../agent_login.php?error=userdoesnoteexist");
    exit();
  }

  // $uidExists is an associative array
  $pwdHashed = $uidExists["agentpassword"];

  $checkpassword=password_verify($pwd1, $pwdHashed);

  if($checkpassword === false){
    header("location: ../agent_login.php?error=wronglogin");
    exit();
  }
  else if($checkpassword === true){
    //we want to start a session 

    session_start();
     
    //we want to create a session variable by referencing $uidExists
    $_SESSION['agentId']= $uidExists['agentId'];
    $_SESSION['agentname']= $uidExists['agentName'];

    header("location: ../agents_profile.php");
    exit();
  }
}