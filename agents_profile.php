<?php
// to acess session variable
session_start();

include 'includes\db_config.php';
if(!isset($_SESSION['agentId'])){}

$id=$_SESSION['agentId'];

$sql= "SELECT * FROM agent_profile WHERE agentId='$id'";

$result=mysqli_query($conn,$sql);
$agent_count=mysqli_num_rows($result);
$agent=mysqli_fetch_assoc($result);

// print_r($agent);

mysqli_free_result($result);
mysqli_close($conn);



?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="agents.css?v=<?php echo time(); ?>">
 <title>Profile Page</title>
</head>
<body>

  <h1 class="formtitle">Your <span class="orange">Profile</span></h1>
  <hr>
  <div class="profilenav">
  <?php
  if(isset($_SESSION['agentId'])){
  echo " <p> Hi," .$_SESSION['agentname']."</p>";}?>
 <a href="agents_profileform.php" class="profilelink">Edit profile</a>
 <a href="includes\agentlogout.inc.php"class="profilelink">Sign out</a>
</div>

<div class="container">
    <div class="contactinfo">

    <?php 
    if($agent_count>0){
   echo "<h2 class=\"title\">contact information</h2>";
   echo " <p> <ion-icon name=\"mail-open-outline\"></ion-icon>" .htmlspecialchars($agent['agent_email'])."</p>";
   echo " <p><ion-icon name=\"call-outline\"></ion-icon>" .htmlspecialchars($agent['phone'])."</p>";
   echo " <p><ion-icon name=\"logo-instagram\"></ion-icon>" .htmlspecialchars($agent['instagram'])."</p>";
   echo " <p><ion-icon name=\"logo-linkedin\"></ion-icon>" .htmlspecialchars($agent['linkedin'])."</p>";
    }
    else{
    echo 'No information yet please edit your profile';

    }
  
?> 
    </div>
    <div class="otherinfo">
<?php 
 if($agent_count>0){
   echo "<h1>".$agent['agent_name']."</h1>";
   echo "<h2 class=\"title\">About me</h2>";
   echo " <p>" .$agent['description']."</p>";
   echo "<h2 class=\"title\">Status</h2>";
   echo "<p>" .$agent['status']."</p> "; 
 } 
 else{
    echo 'No information yet please edit your profile';
 }
?>     
     
    </div>
   </div>

   <!-- ionicons script -->
   <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>