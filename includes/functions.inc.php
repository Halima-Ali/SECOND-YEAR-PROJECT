<!-- contains the functions -->
<?php

function emptyInputSignup($name, $email, $userName, $pwd,$pwdRepeat){

 // checks if the fields are not empty
  $result;// will either be true or false

 if(empty($name) || empty($userName) || empty($email) || empty($pwd) || empty($pwdRepeat)){
  $result= true;
 }
 else{
  // no error
  $result= false;

 }
 return $result;
}

function invalidUId($userName){
  $result;// will either be true or false

 if(!preg_match("/^[a-zA-Z0-9]*$/", $userName)){
  $result= true;
 }
 else{
  // no error
  $result= false;

 }
 return $result;
}

function invalidEmail($email){

  $result;// will either be true or false

 if(!filter_var($email, FILTER_VALIDATE_EMAIL )){
  $result= true;
 }
 else{
  // no error
  $result= false;

 }
 return $result;
}

function pwdMatch($pwd, $pwdRepeat){
  $result;// will either be true or false

 if($pwd!== $pwdRepeat){
  $result= true;
 }
 else{
  // no error
  $result= false;
 }
 return $result;
 
}

function uidExists($conn, $userName, $email){

// checks if the username already exist inside the database
$sql = "SELECT * FROM users WHERE userUid=? OR usersEmail= ?;";
// ? is a placeholder for the prepared statement to prevent sql injection

$stmt= mysqli_stmt_init($conn);
//initializing a new prepared statement. pass in connection variable
 
// if the prepared statement suceeds or fails
if(!mysqli_stmt_prepare($stmt,$sql)){
 //if there is an error
 header("location: ../signup.php?error=stmtfailed");
}

mysqli_stmt_bind_param($stmt,"ss", $userName, $email);
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

function createUser($conn, $name ,$email, $userName, $pwd){

// inserts data inside the database
$sql = "INSERT INTO users(userName ,usersEmail, userUid ,usersPwd) VALUES (?,?,?,?);";
// ? is a placeholder for the prepared statement to prevent sql injection

$stmt= mysqli_stmt_init($conn);
//initializing a new prepared statement. pass in connection variable
 
// if the prepared statement suceeds or fails
if(!mysqli_stmt_prepare($stmt,$sql)){
 //if there is an error
 header("location: ../signup.php?error=stmtfailed");
}

// we want to hash the password
//PASSWORD_DEFAULT we are using the default hashing method
$hashedPwd=password_hash($pwd, PASSWORD_DEFAULT);

mysqli_stmt_bind_param($stmt,"ssss", $name, $email, $userName ,$hashedPwd);

mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

header("location:../signup.php?error=signupsuccesful");
}

// login functions
function emptyInputLogin($userName, $pwd){

 // checks if the fields are not empty
  $result;// will either be true or false
 if( empty($userName)  || empty($pwd)){
  $result= true;
 }
 else{
  // no error
  $result= false;

 }
 return $result;
}

function loginUser($conn, $userName,$pwd){

  //check if the username exists
  //either the username or email = sql statement uses an OR
  $uidExists= uidExists($conn, $userName, $userName);


  //we want to check if the function returns as false- user doesn't exist
  if($uidExists === false){
    header("location: ../login.php?error=userdoesnoteexist");
    exit();
  }

  // $uidExists is an associative array
  $pwdHashed = $uidExists["usersPwd"];

  $checkpassword=password_verify($pwd, $pwdHashed);

  if($checkpassword === false){
    header("location: ../login.php?error=wronglogin");
    exit();
  }
  else if($checkpassword === true){
    //we want to start a session 

    session_start();
     
    //we want to create a session variable by referencing $uidExists
    $_SESSION['userid']= $uidExists['usersId'];
    $_SESSION['userUid']= $uidExists['userUid'];
    $_SESSION['type']=$uidExists['type'];

    if($_SESSION['type']=== 1){
      header("location: ../admin.php");
      exit();
    }
    else{
    header("location: ../agents_profile.php");
    exit();
    }


    
  }
}