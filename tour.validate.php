<!-- changes tour to accepted -->
<!-- to change property status to accepted -->
<?php 

// accept property
include('includes\db_config.php');
$id=$_GET['id'];
$sql="UPDATE book_tour SET status='accepted' WHERE tour_id='$id'";

if(mysqli_query($conn,$sql)){
  //SUCCESS....
  header('Location:po_booking.php');
 }
 else{
  //error
  echo 'query error: '. mysqli_error($conn);
 }