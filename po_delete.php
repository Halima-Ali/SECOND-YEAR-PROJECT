<?php
// delete property
include('includes\db_config.php');
$id=$_GET['id'];
$name=$_GET['name'];
$sql="DELETE FROM propertyowner WHERE propertyOwnerId='$id'";
$sql1="DELETE FROM po_profile WHERE propertyOwnerId='$id'";
$sql2="DELETE FROM property_table WHERE owner_name='$name'";
if(mysqli_query($conn,$sql1)){
 }
 else{
  //error
  echo 'query error: '. mysqli_error($conn);
 }

 if(mysqli_query($conn,$sql2)){
 }
 else{
  //error
  echo 'query error: '. mysqli_error($conn);
 }

if(mysqli_query($conn,$sql)){
  //SUCCESS....
  header('Location: admin_users.php');
 }
 else{
  //error
  echo 'query error: '. mysqli_error($conn);
 }