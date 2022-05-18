<?php
session_start();
include 'includes\db_config.php';

$user=$_SESSION['userUid'];
$id=$_GET['id'];
$owner=$_GET['name'];

$date=$time=$request='';
$errors=array('date'=>'','time'=>'');


if(isset($_POST['tour-submit'])){
  // $date=$_POST['date'];
  // $time=$_POST['time'];
  $request=$_POST['request'];

  if(empty($_POST['date'])){
    $errors['date']='date required';
  } else{
    $date=$_POST['date'];
    //  if(!preg_match("^\\d{1,2}/\\d{2}/\\d{4}^",$date)){
    //    $errors['date']='Enter yyyy/mm/dd format';
    //  }
  }


  if(empty($_POST['time'])){
     $errors['time']='time required';
  }{
         $errors['time']='';
         $time=$_POST['time'];
  }

  if(array_filter($errors)){
    
  }
  else{

 $sql1= "DELETE FROM book_tour WHERE property_id='0'";
  $sql= "INSERT INTO book_tour(user,date,requests,tour_status,time,property_id,owner_name) VALUES('$user','$date','$request','pending','$time','$id','$owner')";
  if(mysqli_query($conn,$sql1)){
  }
  else{
   echo 'query error' . mysqli_error();
  }

  if(mysqli_query($conn,$sql)){
    header("Location: individualproperty.php?id=".$id."&name=".$name);
  }
  else{
   echo 'query error' . mysqli_error();
  }
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
   <input type="text" name="date" placeholder="Add Date YYYY/MM/DD format">
  <div class="errors"><?php echo htmlspecialchars($errors['date']);?></div>
   </div>
   <div>
   <label for="Time">Time</label>
   <input type="text" name="time" placeholder="Schedule a time">
   </div>
     <div class="errors"><?php echo htmlspecialchars($errors['time']);?></div>
   <div class="request">
   <label for="Request">Requests</label>
   <select name="request" id="">
     <option value="Physical Tour">Physical Tour</option>
     <option value="Online Tour">Online Tour</option>
       <div class="errors"><?php echo htmlspecialchars($errors['date']);?></div>
   </select>
   </div>
   <button Type="submit" class="button" name="tour-submit">Book a Tour</button>
  
 </form>
</body>
</html>
