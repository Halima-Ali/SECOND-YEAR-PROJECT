<?php
session_start();
include 'includes\db_config.php';

$user=$_SESSION['userUid'];
$id=$_GET['id'];
$owner=$_GET['name'];


if(isset($_POST['tour-submit'])){
  $date=$_POST['date'];
  $time=$_POST['time'];
  $request=$_POST['request'];
 
  $sql= "INSERT INTO book_tour(user,date,requests,status,time,property_id,owner_name) VALUES('$user','$date','$request','pending','$time','$id','$owner')";

  if(mysqli_query($conn,$sql)){
    header("Location: all_properties.php");
  }
  else{
   echo 'query error' . mysqli_error();
  }
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="agents.css">
 <title>Document</title>
</head>
<body>
 <form class="form1" action="<?php $_SERVER['PHP_SELF']?>" method="POST">
  <div>
   <label for="BookingDate">Book Date</label>
   <input type="text" name="date" placeholder="Add Date">

   </div>
   <div>
   <label for="Time">Time</label>
   <input type="text" name="time" placeholder="Schedule a time">
   </div>
   <div class="request">
   <label for="Request">Requests</label>
   <input type="text" name="request" placeholder="Online/ In-Person tour">
   </div>
   <button Type="submit" class="button" name="tour-submit">Book a Tour</button>
  
 </form>
</body>
</html>
