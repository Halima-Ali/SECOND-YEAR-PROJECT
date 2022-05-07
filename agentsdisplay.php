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
 <!-- <link rel="stylesheet" href="styles.css"> -->
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

 <section class="agents" id="agents">
  <div class="title">
    <h1 class="heading"> Featured <span>Agents</span></h1>
  </div>
  <div class="box-container">

        <div class="box">
            <a href="#" class="fas fa-envelope"></a>
            <a href="#" class="fas fa-phone"></a>
            <img src="images/pic-1.png" alt="">
            <h3>john deo</h3>
            <span>agent</span>
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
            <a href="#" class="btn">View Profile</a>
        </div>

        <div class="box">
            <a href="#" class="fas fa-envelope"></a>
            <a href="#" class="fas fa-phone"></a>
            <img src="images/pic-2.png" alt="">
            <h3>john deo</h3>
            <span>agent</span>
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
            <a href="#" class="btn">View Profile</a>
        </div>

        <div class="box">
            <a href="#" class="fas fa-envelope"></a>
            <a href="#" class="fas fa-phone"></a>
            <img src="images/pic-3.png" alt="">
            <h3>john deo</h3>
            <span>agent</span>
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
            <a href="#" class="btn">View Profile</a>
        </div>

        <div class="box">
            <a href="#" class="fas fa-envelope"></a>
            <a href="#" class="fas fa-phone"></a>
            <img src="images/pic-4.png" alt="">
            <h3>john deo</h3>
            <span>agent</span>
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
          <a href="#" class="btn">View Profile</a>
        </div>

</section>

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