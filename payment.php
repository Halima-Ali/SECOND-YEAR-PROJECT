<?php
$id=$_GET['id'];
$name=$_GET['name'];
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="css/styles.css">
 <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
 <title>Pay Page</title>
</head>
<body>
  <div class="container">
    <h2 class="my-4 text-center">Intro To React Course [$50]</h2>
    <form action="./charge.php?id=$id&name=$name" method="post" id="payment-form">
      <div class="form-row">
      <input type="text" name="first_name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="First Name">
       <input type="text" name="last_name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Last Name">
       <input type="email" name="email" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Email Address">
        <div id="card-element" class="form-control">
          <!-- a Stripe Element will be inserted here. -->
        </div>
        <!-- Used to display form errors -->
        <div id="card-errors" role="alert"></div>
      </div>
      <button>Submit Payment</button>
    </form>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://js.stripe.com/v3/"></script>
  <script src="./js/charge.js"></script>
</body>
</html>