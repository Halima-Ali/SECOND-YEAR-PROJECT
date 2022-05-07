<?php
include 'includes\db_config.php';
$sql1="SELECT * FROM property_table WHERE purpose='for-rent' ORDER BY property_id";
$result1=mysqli_query($conn,$sql1);

$property_count= mysqli_num_rows($result1);
$properties=mysqli_fetch_all($result1,MYSQLI_ASSOC);


mysqli_free_result($result1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="property.css">
 <title>All Properties</title>
</head>
<body>

<a href="tel:0792785777">0792785777</a>
 <!-- contains all property divs -->
<button><a href="po_signup.php">Sign Up Property Owner</a></button>

<!-- featured section starts  -->

<section class="featured" id="featured">

    <h1 class="heading"> <span>featured</span> properties </h1>

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

<!-- featured section ends -->

<!-- script ionicons -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>

<?php
 mysqli_free_result($result2);
 mysqli_free_result($result3);
 mysqli_close($conn);?>