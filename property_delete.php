<?php
// delete property
include('includes\db_config.php');
$id=$_GET['id'];
$sql="DELETE FROM property_table WHERE property_id='$id'";

if(mysqli_query($conn,$sql)){
  //SUCCESS....
  header('Location: po_properties.php');
 }
 else{
  //error
  echo 'query error: '. mysqli_error($conn);
 }