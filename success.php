<?php
if(!empty($_GET['tid'])&& !empty($_GET['product'])){
$GET=filter_var_array($_GET, FILTER_SANITIZE_STRING);
$tid= $GET['tid'];
$product= $GET['product'];
}
else{
  header('Location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
 <title>Thank You!</title>
</head>
<body>
 <div class="container mt-4">
  <h2>Thank you for purchasing property id <?php echo $product;?></h2>
  <hr>
  <p>Your transaction Id is <?php echo $tid;?></p>
  <p>Check your email for more info</p>
  <p><a href="user_booking.php" class="btn btn-light mt-2">Done</a></p>
 </div>
</body>
</html>