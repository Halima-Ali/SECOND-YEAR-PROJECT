<!-- sign up php code -->

<?php

// we want to check if the user enteres this page by submitting form

if(isset($_POST['submit'])){

 // create variables
 $name=$_POST['name'];
 $email=$_POST['email'];
 $userName= $_POST['uid'];
 $pwd=$_POST['pwd'];
 $pwdRepeat= $_POST['pwdRepeat'];

 require_once 'db_config.php';
 require_once 'functions.inc.php';

 // error handling
 // did they leave any inputs empty
 // functions returns true if theres an error

 if(emptyInputSignup($name, $email, $userName, $pwd,$pwdRepeat) !== false){
  header("location: ../signup.php?error=emptyinput");
  exit(); //stops script from running
 }

 if(invalidUId($userName) !== false){
  header("location: ../signup.php?error=invaliduid");
  exit(); //stops script from running
 }

 if(invalidEmail($email) !== false){
   header("location: ../signup.php?error=invalidemail");
  exit(); //stops script from running
 }
 


if(pwdMatch($pwd, $pwdRepeat) !== false){
  header("location: ../signup.php?error=passwordsdontmatch");
  exit(); //stops script from running
}

// if the username already exists
if(uidExists($conn, $userName ,$email) !== false){
  header("location: ../signup.php?error=usernametaken");
  exit(); //stops script from running
}
//if this point has been reached the user made no mistakes.
createUser($conn, $name ,$email, $userName, $pwd);

}
else{
//sends them back to the signup page

header("location: ../signup.php");
exit();
}