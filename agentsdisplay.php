<!-- where the agents will be displayed -->
<?php
include 'includes\db_config.php';

$sql= "SELECT * FROM agent_profile WHERE status='accepted' ORDER BY agentId";

$result=mysqli_query($conn,$sql);

$agents=mysqli_fetch_all($result,MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="agents1.css?v=<?php echo time(); ?>">
 <!-- <link rel="stylesheet" href="styles.css"> -->
 <title>Agents</title>
</head>
<body>
 <div class="headersection">
  <h1 class="logo">Real <span class="orange">Estate</span></h1>  
  <div>    
  <a href="index.php" class="register-btn">Index Page</a>
  <a href="agent_signup.php" class="register-btn">Register as an Agent</a>
  </div>  
  </div>

 <hr>

 <section class="agents" id="agents">
  <!-- <div class="title">
    <p>200+ agents featured</p>
    
        <form action="#" class="search">
          <input type="text" class="agent_search"  name="agent_search" placeholder="Enter an Agents name">
        </form>
  </div> -->
  <h1 class="heading"> Featured <span>Agents</span></h1>
    <div class="box-container">
<?php foreach($agents as $agent):?>
    <div class="box">
            <a href="https://mail.google.com/mail/u/0/#inbox" class="fa-envelope" target="blank"><ion-icon name="mail"></ion-icon></a>
            <a href="tel:<?php echo htmlspecialchars( $agent['phone'])?>" class="fa-phone"><ion-icon name="call-outline"></ion-icon></a>
            <?php 
            $id=$agent['agentId'];
            $sql2= "SELECT * FROM agent_images WHERE agentId='$id'";
            $result2=mysqli_query($conn,$sql2);
             $images=mysqli_fetch_assoc($result2);
             echo "<img src=\"{$images['img_dir']}\" alt=\"\">";?>
            <h3><?php echo htmlspecialchars($agent['agent_name']);?></h3>
            <span>Agent</span>
            <div class="share">
              <?php echo "<a href='agent_individual.php?id=".$agent['agentId']."' class=\"btn\">View Profile</a>"?>
            </div>
        </div>
<?php endforeach;?>

    </div>

</section>

<!-- ionicons -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script> 
</body>
</html>

<?php
mysqli_free_result($result2);
mysqli_free_result($result);
mysqli_close($conn);
?>