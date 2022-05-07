<?php
// delete property
include('includes\db_config.php');
$id=$_GET['id'];
$name= $_GET['name'];
$sql="DELETE FROM property_table WHERE property_id='$id'";
$sql1="DELETE FROM property_images WHERE propertyName='$name'";

if(mysqli_query($conn,$sql1)){

}
 else{
  //error
  echo 'query error: '. mysqli_error($conn);
 }

if(mysqli_query($conn,$sql)){
  //SUCCESS....
  header('Location: po_properties.php');
 }
 else{
  //error
  echo 'query error: '. mysqli_error($conn);
 }