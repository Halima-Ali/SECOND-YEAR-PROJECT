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
<h1>Reset your Password</h1>
<form action="includes/reset-request.inc.php" method="POST">
 <ion-icon name="person-outline"></ion-icon>
 <p>An email will be sent to you with instructions on how to reset your password</p>
<input type="text" name="email" placeholder="Enter your email adress">
<button type="submit" class="button" name="reset-request-submit">RECEIVE PASSWORD VIA EMAIL</button>
<!-- email. we want to get a reset password email -->
</form>
</section>
 </div>
 <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>