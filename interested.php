<?php
include 'includes\db_config.php';

$id=$_GET['id'];

$sql="UPDATE book_tour SET tour_status='yes' WHERE tour_id=$id";

if(mysqli_query($conn,$sql)){
header('Location:user_transaction.php');
}else{

   echo 'query error'. mysqli_error($conn);
}

mysqli_close($conn);
