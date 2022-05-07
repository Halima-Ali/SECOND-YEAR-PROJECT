<!-- to change property status to rejected -->
<?php

// reject property
include('includes\db_config.php');
$id=$_GET['id'];
$sql="UPDATE property_table SET property_status='rejected' WHERE property_id='$id'";

if(mysqli_query($conn,$sql)){
  //SUCCESS....
  header('Location: admin_property.php');
 }
 else{
  //error
  echo 'query error: '. mysqli_error($conn);
 }