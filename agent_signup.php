<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="login_setup.css?v=<?php echo time(); ?>">
 <title>Agent Signup</title>
</head>
<body>
 <div class="wrapper">
  <section class="sectiondefault">
<h1>SignUp</h1>
<form action="includes\agentsignup.inc.php" method="POST">
<ion-icon name="person-outline"></ion-icon>
<input type="text" name="agentname" placeholder="Full name....">
<input type="text" name="email" placeholder="email">
<input type="text" name="username" placeholder="UserName">

<input type="password" name="password" placeholder="Password">
<!-- to confirm the password -->
<!-- <div class="pwd-info">
  <p>Minimum eight characters</p>
  <p>at least one letter and one number</p>
</div> -->
<input type="password" name="passwordRepeat" placeholder="Repeat Password">
<button type="submit" class="button" name="agent-submit">Sign Up as an Agent</button>
<hr>
<h3>Already a member?<a href="agent_login.php">Log in</a></h3>
<!-- email. we want to get a reset password email -->
</form>

<?php 
//check for get
  if(isset($_GET["error"])){

    if($_GET["error"]== "emptyinput"){
      echo "<p> Fill in all fields</p>";
    }
    elseif($_GET["error"]== "invaliduid"){
      echo "<p> Choose a proper username</p>";
    }
    elseif($_GET["error"]== "invalidemail"){
      echo "<p> Choose a proper email</p>";
    }
    elseif($_GET["error"]== "passwordsdontmatch"){
      echo "<p> Passwords dont match</p>";
    }
    elseif($_GET["error"]== "stmtfailed"){
      echo "<p>Something went wrong try again!</p>";
    }
    elseif($_GET["error"]== "usernametaken"){
      echo "<p>The username is already taken</p>";
    }
    elseif($_GET["error"]== "usernametaken"){
      echo "<p>The username is already taken</p>";
    }
    elseif($_GET["error"]== "signupsuccesful"){
      echo "<p>You have signed up</p>";
    }
  }

?>

  </section>
 </div>
 <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>