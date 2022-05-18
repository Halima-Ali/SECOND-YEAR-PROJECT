<!-- to delete normal user -->
<?php
// delete property
include('includes\db_config.php');
$id=$_GET['id'];
$name=$_GET['name'];
$sql="DELETE FROM users WHERE usersId='$id'";
$sql1="DELETE FROM book_tour WHERE user='$name'";

if(mysqli_query($conn,$sql1)){
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