<!-- agents stuff -->

<!-- sign up php code -->
<?php
// we want to check if the user enteres this page by submitting form

if(isset($_POST['agent-submit'])){

 // create variables
 $name1=$_POST['agentname'];
 $email1=$_POST['email'];
 $userName1= $_POST['username'];
 $pwd1=$_POST['password'];
 $pwdRepeat1= $_POST['passwordRepeat'];

 require_once 'db_config.php';
 require_once 'functionsagents.inc.php';

 // error handling
 // did they leave any inputs empty
 // functions returns true if theres an error

 if(emptyInputSignup($name1, $email1, $userName1, $pwd1,$pwdRepeat1) !== false){
  header("location: ../agent_signup.php?error=emptyinput");
  exit(); //stops script from running
 }

 if(invalidUId($userName1) !== false){
  header("location: ../agent_signup.php?error=invaliduid");
  exit(); //stops script from running
 }

 if(invalidEmail($email1) !== false){
   header("location: ../agent_signup.php?error=invalidemail");
  exit(); //stops script from running
 }
 


if(pwdMatch($pwd1, $pwdRepeat1) !== false){
  header("location: ../agent_signup.php?error=passwordsdontmatch");
  exit(); //stops script from running
}

// if the username already exists
if(uidExists($conn, $userName1 ,$email1) !== false){
  header("location: ../agent_signup.php?error=usernametaken");
  exit(); //stops script from running
}
//if this point has been reached the user made no mistakes.
createUser($conn, $name1 ,$email1, $userName1, $pwd1);

}
else{
//sends them back to the signup page

header("location: ../agent_signup.php");
exit();
}