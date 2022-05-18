<?php
include 'includes\db_config.php';
session_start();
// to collect the profile
$id=$_SESSION['po_id'];
$sql="SELECT * FROM po_profile WHERE propertyOwnerId='$id'";
$result1=mysqli_query($conn,$sql);
$profile_count= mysqli_num_rows($result1);
$profile=mysqli_fetch_assoc($result1);

mysqli_free_result($result1);
mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="admin.css?v=<?php echo time(); ?>">
 <title>Responsive Property Owner Dashboard</title>
</head>
<body>
  <div class="container">
   <div class="navigation">
  <!-- navigation links -->
  <ul>
   <li>
    <a href="#">
     <span class="icon"><ion-icon name="aperture-outline"></ion-icon></span>
     <span class="title">Hi <?php echo $_SESSION['po_Uid']?></span>
    </a>
   </li>
   <li>
    <a href="propertyowner.php">
     <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
     <span class="title">Dashboard</span>
    </a>
   </li>
   <li>
    <a href="po_properties.php">
      <span class="icon"><ion-icon name="pricetag-outline"></ion-icon></span>
      <span class="title">Properties</span>
    </a>
   </li>
   <li>
    <a href="po_profile.php">
    <span class="icon"><ion-icon name="person-outline"></ion-icon></ion-icon></span>
    <span class="title">Profile</span>   
    </a>
   </li>
   <li>
    <a href="po_transactions.php">
    <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
     <span class="title">Transactions</span>
    </a>
   </li>
   <li>
    <a href="po_booking.php">

     <span class="icon"><ion-icon name="people-circle-outline"></ion-icon></span>
      <span class="title">Bookings</span>
     
    </a>
   </li>
   <li>
    <a href="includes\po_logout.inc.php">
     <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
     <span class="title">Sign Out</span>
    </a>
   </li>
  </ul>
   </div>

   <!-- main -->
   <div class="main">
    <div class="topbar">
     <div class="toggle"><ion-icon name="menu-outline"></ion-icon>
    </div>
    <!-- top bar -->
    <?php echo "<a href='po_editprofileform.php?id=".$_SESSION['po_id']."' class=\"btn\">Edit Profile</a>"?>
</div>

<!-- <hr> -->
    <div class="profile_details">
     <div class="profilediv">
      <div class="cardHeader">
       <h2>Your Profile</h2>
      </div>
      <?php 
      if($profile_count>0){
        echo "<h3>Name</h3>";
        echo "<p>".htmlspecialchars($profile['fullName'])."</p>";
        echo "<h3>System Username</h3>";
        echo "<p>".htmlspecialchars($profile['po_name'])."</p>";
        echo "<h3>Contact Information</h3>";
        echo "<p><ion-icon name=\"mail-open-outline\"></ion-icon>".htmlspecialchars($profile['email'])."</p>";
        echo "<p><ion-icon name=\"call-outline\"></ion-icon>".htmlspecialchars($profile['phone'])."</p>";
        echo "<p><ion-icon name=\"logo-linkedin\"></ion-icon>".htmlspecialchars($profile['ln'])."</p>";
        echo "<h3>About</h3>";
        echo "<p>".htmlspecialchars($profile['description'])."</p>";
      }
      else{
       echo "<h3>Name</h3>";
       echo "<p>No information available. please edit your profile</p>";
       echo "<h3>System Username</h3>";   
       echo "<p>No information available. please edit your profile</p>";        
       echo "<h3>Contact Information</h3>";
       echo "<p>No information available. please edit your profile</p>";
        echo "<h3>About</h3>";        
        echo "<p>No information available. please edit your profile</p>";
      }
      ?>
     </div>

</div>
</div>
    <!-- section content -->
 
<!-- ionicons script -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<script src="admin.js"></script>
</body>
</html>