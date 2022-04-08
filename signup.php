<?php
$userName=$email=$password=$passwordRepeat='';
$errors=array('userName'=>'','email'=>'','password'=>'','passwordRepeat'=>'');
if(isset($_POST['submit'])){
  
  //userName
 if(empty($_POST['UserName'])){
   $errors['userName']= 'userName required';
 }
 else{
  $userName=$_POST['UserName'];

  if(!preg_match('/^[a-zA-Z\s]*$/',$userName)){
    $errors['userName']='please enter letters only';
  }
 }

 //email
 if(empty($_POST['email'])){
   $errors['email']='email required';
 }
 else{
 $email=$_POST['email'];
  if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
     $errors['email']= 'please enter a valid email';
  }
 }

 if(empty($_POST['Password'])){

   $errors['password']= 'password required';
 }
 else{
   $password=$_POST['Password'];
  if(!preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/',$password)){
    $errors['password']= 'Minimum eight characters, at least one letter and one number';
  }
 }

 if(empty($_POST['PasswordRepeat'])){
   $errors['passwordRepeat']= 'please retype your password';
 }
 else{
   $passwordRepeat=$_POST['PasswordRepeat'];
   if($password!==$passwordRepeat){
     $errors['passwordRepeat']=  'passwords do not match.';
   }

  // we want to check for errors
  // if(array_filter($errors)){
  //   //no errors do nothing
  // }
  // else{

  //   $
  // }
 }
}//end of POST check

?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="login_setup.css?v=<?php echo time(); ?>">
 <title>Document</title>
</head>
<body>
 <div class="wrapper">
  <section class="sectiondefault">
<h1>SignUp</h1>
<form action="signup.php" method="POST">
<ion-icon name="person-outline"></ion-icon>
<input type="text" name="UserName" placeholder="UserName" value="">
<div class="errors"><?php echo $errors['userName'];?></div>
<input type="text" name="email" placeholder="email" value="">
<div class="errors"><?php echo $errors['email'];?></div>
<input type="password" name="Password" placeholder="Password">
<div class="errors"><?php echo $errors['password'];?></div>
<!-- to confirm the password -->
<div class="pwd-info">
  <p>Minimum eight characters</p>
  <p>at least one letter and one number</p>
</div>
<input type="password" name="PasswordRepeat" placeholder="Repeat Password">
<div class="errors"><?php echo $errors['passwordRepeat'];?></div>
<input type="submit" class="button" name="submit">
<hr>
<a href="#" class="forgot_Pwd">Forgot password?</a>
<h3>Already a member?<a href="login.php">Log in</a></h3>
<!-- email. we want to get a reset password email -->
</form>
  </section>
 </div>
 <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>