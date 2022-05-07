<!-- to reject an agent lmaooo -->
<?php 

// accept property
include('includes\db_config.php');
$id=$_GET['id'];
$sql="UPDATE agent_profile SET status='rejected' WHERE agentNo='$id'";

if(mysqli_query($conn,$sql)){
  //SUCCESS....
  header('Location: admin_agents.php');
 }
 else{
  //error
  echo 'query error: '. mysqli_error($conn);
 }