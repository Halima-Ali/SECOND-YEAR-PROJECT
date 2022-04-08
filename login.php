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
 <!-- login section -->
 <div class="wrapper">
  <section class="sectiondefault">
<h1>Log In</h1>
<form action="includes/login.inc.php" method="POST">
<ion-icon name="person-outline"></ion-icon>
<input type="text" name="UserName" placeholder="UserName">
<input type="password" name="Password" placeholder="Password">
<button type="submit" name="login-submit">Login</button>
<hr>
<a href="#" class="forgot_Pwd">Forgot password?</a>
<h3>Not Yet a Member?<a href="signup.php">Sign Up</a></h3>
<!-- email. we want to get a reset password email -->
</form>
  </section>
 </div>
 <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
