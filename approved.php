<?php
include 'includes\db_config.php';
$id=$_GET['id'];
$po_id=$_GET['po_id'];

$sql1="UPDATE property_table SET property_status='sold' WHERE property_id=$po_id";
$sql="UPDATE book_tour SET tour_status='approved' WHERE tour_id='$id'";

if(mysqli_query($conn,$sql1)){
}else{
   echo 'query error'. mysqli_error($conn);
}
if(mysqli_query($conn,$sql)){
header('Location:po_transactions.php');
}else{

   echo 'query error'. mysqli_error($conn);
}

mysqli_close($conn);

