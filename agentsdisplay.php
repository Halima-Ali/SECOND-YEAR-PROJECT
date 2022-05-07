<!-- where the agents will be displayed -->
<?php
include 'includes\db_config.php';

$sql= "SELECT * FROM agent_profile WHERE status='accepted' ORDER BY agentId";

$result=mysqli_query($conn,$sql);

$agents=mysqli_fetch_all($result,MYSQLI_ASSOC);

mysqli_free_result($result);
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="agents1.css">
 <title>Agents</title>
</head>
<body>
 <div class="headersection">
  <h1 class="logo">Real <span class="orange">Estate</span></h1>  
  <form action="#">
   <div>
    
  <a href="agent_signup.php" class="register-btn">Register as an Agent</a>
   <input type="text" class="agent_search"  name="agent_search" placeholder="Enter an Agents name">
   </div>
   
  </form>
  </div>
 
  <div class="titlepart">
    <h2>Featured Agents</h2>
    <p>200+ agents featured</p>
 </div>
 <hr>

 <div class="row">

 <?php foreach($agents as $agent):?>
 <div class="agentcard">
   <div><img src="images\pic-1.png" alt="profile pic 1"></div>
     
   <div class="info">
     <h6><?php echo htmlspecialchars($agent['agent_name']);?></h6>
     <p><?php echo htmlspecialchars($agent['company']);?></p>
     <button>View Profile</button>  

   </div>
 </div>
 <?php endforeach; ?>
</div>
 
</body>
</html>