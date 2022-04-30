<!-- to delete normal user -->
<?php
// delete property
include('includes\db_config.php');
$id=$_GET['id'];
$sql="DELETE FROM propertyowner WHERE propertyOwnerId='$id'";

if(mysqli_query($conn,$sql)){
  //SUCCESS....
  header('Location: admin_users.php');
 }
 else{
  //error
  echo 'query error: '. mysqli_error($conn);
 }