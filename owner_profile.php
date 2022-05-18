<!-- profile page -->
<?php 
include 'includes\db_config.php';
$id=$_GET['id'];
// echo $id;
// properties
$sql1="SELECT * FROM property_table WHERE property_status='accepted'  AND propertyOwnerId='$id' ORDER BY property_id";
$result1=mysqli_query($conn,$sql1);

$property_count= mysqli_num_rows($result1);
$properties=mysqli_fetch_all($result1,MYSQLI_ASSOC);

// owners
// $id=$_SESSION['po_id'];
$sql2="SELECT * FROM po_profile WHERE propertyOwnerId='$id'";
$result2=mysqli_query($conn,$sql2);
$profile_count= mysqli_num_rows($result2);
$profile=mysqli_fetch_assoc($result2);

mysqli_free_result($result1);
mysqli_free_result($result2);

?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="admin.css">
 <link rel="stylesheet" href="property.css">
 <style>
  .heading{
  text-align: center;
  color: #333;
  font-size: 3rem;
  padding: 3rem 0;
}

.heading span{
  color:orangered ;
  padding: .2rem;
}

.profile_details{
 margin-left: 60px;
}
 </style>
 <title>Profile Page</title>
</head>
<body>

<h1 class="heading">Profile <span>page</span> </h1>
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
 

<h1 class="heading">Properties owned by <span><?php echo $_GET['name']; ?></span> </h1>

<section class="featured" id="featured">
 
    <div class="box-container">
      <?php foreach($properties as $property):?>
        <div class="box">
            <div class="image-container">
             <?php 
             $pn=$property['property_name'];
             $sql2="SELECT * FROM property_images WHERE propertyName='$pn' LIMIT 1";
             $result2=mysqli_query($conn,$sql2);
             $images=mysqli_fetch_assoc($result2);

             $sql3="SELECT * FROM property_images WHERE propertyName='$pn'";
             $result3=mysqli_query($conn,$sql3);
             $images_count= mysqli_num_rows($result3);
             ?>

             <?php echo "<img src=\"{$images['img_dir']}\" alt=\"\">";?>           
                <div class="info">
                    <h3><?php echo htmlspecialchars($property['purpose']);?></h3>
                </div>
                <div class="icons">
                    <?php echo "<a href='property_slideshow.php?name=".$property['property_name']."'><ion-icon name=\"image-outline\"></ion-icon><h3>".htmlspecialchars($images_count)."</h3></a>";?>
                </div>
            </div>
            <div class="content">
                <div class="price">
                    <h3>$<?php echo htmlspecialchars($property['price'])?></h3>
                    <a href="#"><ion-icon name="mail-outline"></ion-icon></a>
                    <a href="#"><ion-icon name="call-outline"></ion-icon></a>
                </div>
                <div class="location">
                    <p><?php echo htmlspecialchars($property['location'])?></p>
                </div>
                <div class="details">
                    <h3> <i class="fas fa-expand"></i><?php echo htmlspecialchars($property['area'])?>  sqft </h3>
                    <h3> <i class="fas fa-bed"></i><?php echo htmlspecialchars($property['bedrooms'])?>  beds </h3>
                    <h3> <i class="fas fa-bath"></i><?php echo htmlspecialchars($property['bathrooms'])?>  baths </h3>
                </div>
                <div class="buttons">
                <?php echo "<a href='individualproperty.php?id=".$property['property_id']."' class=\"btn\">View details</a>";?>
                 
                </div>
            </div>
        </div>
        <?php endforeach;?>
    </div>
    
</section>
 <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>

<?php
mysqli_close($conn);
?>