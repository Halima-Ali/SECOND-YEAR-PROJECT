<!-- delete agents page -->
<!-- to delete normal user -->
<?php
// delete property
include('includes\db_config.php');
$id=$_GET['id'];
$sql="DELETE FROM usersagents WHERE agentId='$id'";
$sql1="DELETE FROM agent_profile WHERE agentId='$id'";
$sql2="DELETE FROM agent_images WHERE agentId='$id'";

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