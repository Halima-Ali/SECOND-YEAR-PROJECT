<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="login_setup.css?v=<?php echo time(); ?>">
 <title>Agent Login</title>
</head>
<body>
 <!-- login section -->
 <div class="wrapper">
  <section class="sectiondefault">
<h1>Log In</h1>
<form action="includes/agentslogin.inc.php" method="POST">
<ion-icon name="person-outline"></ion-icon>
<input type="text" name="agentname" placeholder="UserName/Email">
<input type="password" name="password" placeholder="Password">
<button type="submit" class="button" name="agentlogin-submit">Login as an Agent</button>
<hr>
<a href="reset-password.php" class="forgot_Pwd">Forgot password?</a>
<h3>Not Yet a Member?<a href="agent_signup.php">Sign Up</a></h3>
<!-- email. we want to get a reset password email -->
</form>
<?php

if(isset($_GET["error"])){

    if($_GET["error"]== "emptyinput"){
      echo "<p> Fill in all fields</p>";
    }
    elseif($_GET["error"]== "wronglogin"){
      echo "<p> Please enter correct login information</p>";
    }
    elseif($_GET["error"]== "userdoesnoteexist"){
      echo "<p> The User does not exist try again</p>";
    }
  }
?>
  </section>
 </div>
 <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<!-- disables back button -->
<script type="text/javascript"> 
        function back() { 
            window.history.forward();  
        } 
          
        // Force Client to forward to last (current) Page.
        setTimeout("back()", 0); 
          
        window.onunload = function () { null }; 
</script>
</body>
</html>
