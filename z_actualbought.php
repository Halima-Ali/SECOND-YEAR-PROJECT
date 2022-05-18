<?php
include 'includes\db_config.php';

$sql="SELECT * FROM book_tour WHERE tour_status='yes'";
$result=mysqli_query($conn,$sql);

$pending_buy_rent_count= mysqli_num_rows($result);
$pending_buy_rents=mysqli_fetch_all($result,MYSQLI_ASSOC);

//to select accepted bookings
$sql2="SELECT * FROM book_tour WHERE tour_status='approved'";
$result2=mysqli_query($conn,$sql2);

$accepted_transaction_count= mysqli_num_rows($result2);
$accepted_transactions=mysqli_fetch_all($result2,MYSQLI_ASSOC);

//to select rejected properties
$sql3="SELECT * FROM book_tour WHERE tour_status='not approved'";
$result3=mysqli_query($conn,$sql3);

$rejected_transaction_count= mysqli_num_rows($result3);
$rejected_transactions=mysqli_fetch_all($result3,MYSQLI_ASSOC);

$interested_in_buying=$pending_buy_rent_count+$accepted_transaction_count+$rejected_transaction_count;

$sql4="SELECT * FROM book_tour WHERE tour_status='no'";
$result4=mysqli_query($conn,$sql);

$rejected_buy_rent_count= mysqli_num_rows($result4);
$rejected_buy_rents=mysqli_fetch_all($result4,MYSQLI_ASSOC);

// accepted
$sql5="SELECT * FROM book_tour WHERE tour_status='accepted'";
$result5=mysqli_query($conn,$sql5);

$accepted_tours_count= mysqli_num_rows($result5);
$accepted_tours=mysqli_fetch_all($result5,MYSQLI_ASSOC);

$attended_tour=$pending_buy_rent_count+$accepted_transaction_count+$rejected_transaction_count+$rejected_buy_rent_count+$accepted_tours_count;


// rejected
$sql6="SELECT * FROM book_tour WHERE tour_status='rejected'";
$result6=mysqli_query($conn,$sql6);

$rejected_tours_count= mysqli_num_rows($result6);
$rejected_tours=mysqli_fetch_all($result6,MYSQLI_ASSOC);

$attended_tour=$pending_buy_rent_count+$accepted_transaction_count+$rejected_transaction_count+$rejected_buy_rent_count+$accepted_tours_count;


// $bookings_count=$accepted_booking_count+$rejected_booking_count+$pending_booking_count;

mysqli_free_result($result);
mysqli_free_result($result2);
mysqli_free_result($result3);
mysqli_free_result($result4);
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="agents.css">
 <style>
  ul li{
   font-size:20px;
  }
 </style>
 <title>Document</title>
</head>
<body>
 <form>
  <h1>Tour <span class="orange"> Vs Transactions</span></h1>
  <ul>
  <li>The number of people who went for a tour was  <span class="orange"> <?php echo htmlspecialchars($attended_tour);?></span></li>
  <li>The number of people who did not go for a tour was  <span class="orange"> <?php echo htmlspecialchars($rejected_tours_count);?></span></li>
  <li>The number of people interested in buying/renting after a tour was  <span class="orange"> <?php echo htmlspecialchars($interested_in_buying);?></span></li>
  <li>The number of people not interested in buying/renting after a tour was  <span class="orange"> <?php echo htmlspecialchars($rejected_buy_rent_count);?></span></li>
  <li>The number of people who actually bought/rent after a tour was <span class="orange"> <?php echo htmlspecialchars($accepted_transaction_count);?></span></li>
  <li>The number of people interested in buying/renting after a tour but did not buy/rent property was <span class="orange"> <?php echo htmlspecialchars($rejected_transaction_count);?></span></li>
  </ul>
 </form> 

</body>
</html>