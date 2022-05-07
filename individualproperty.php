<?php
include 'includes\db_config.php';
$id= $_GET['id'];

$sql="SELECT * FROM property_table WHERE property_id='$id'";
$result=mysqli_query($conn,$sql);
$records=mysqli_fetch_assoc($result);
$property_name= $records['property_name'];

 $sql3="SELECT * FROM property_images WHERE propertyName='$property_name' LIMIT 1";
    $result3=mysqli_query($conn,$sql3);
    $images=mysqli_fetch_assoc($result3);
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="individualproperty.css?v=<?php echo time(); ?>">
 <title>Property details</title>
</head>
<body>
 <div class="propertydetails">
  <div class="property-title">
  <h1><?php echo htmlspecialchars($records['property_name'])?></h1> 

  <div class="row">
    <p> <span class="Location"><b>Location:</b></span> <?php echo htmlspecialchars($records['location'])?> </p>
  <div>  
  <h2><?php echo "<a href='book_tour.php?id=".$records['property_id']."&name=".$records['owner_name']."'class=\"button\">Book Tour</a>"?></h2>
 </div>
 </div> 
  </div>
  <div class="gallery">
 </div>

  <?php echo "<img src=\"{$images['img_dir']}\" class=\"img1\"alt=\"\">";?>

 <div class="floating div">
  <h2>Property owned by <?php echo htmlspecialchars($records['owner_name'])?></h2>
  <p><?php echo htmlspecialchars($records['bedrooms']) ?>bedroom &nbsp <?php echo htmlspecialchars($records['bathrooms'])?> bathrooms &nbsp 10min commute time &nbsp</p>
  <h4>$<?php echo htmlspecialchars($records['price'])?></h4>
 </div>
 <hr class="line">

 <ul class="detailslist">
  <li><ion-icon name="business-outline"></ion-icon>Nearby Facilities <span>It is close to a school hospital and bus stop</span></li>
   <li><ion-icon name="bus-outline"></ion-icon>Commute Time <span>Takes 10 mins by bus to the central business district</span></li>
    <li><ion-icon name="bicycle-outline"></ion-icon>Good for joggers and Riders<span>Very safe environment for people who love to jog and take their psts on a walk</span></li>
     <li><ion-icon name="happy-outline"></ion-icon>Safe environment<span>Safe environment that is kid friendly</span></li>
 </ul>

 <hr class="line">

 <p class="propertydescription"><?php echo htmlspecialchars($records['description'])?></p>
 <p>Amenities: </p>
  <hr class="line">

 <div class="map">
  <h3>Location on map</h3>
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.826142031192!2d36.784110114274704!3d-1.2778060359762065!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f175467c8aa0d%3A0x12946ed8517a7fc!2sBoffar%20Court!5e0!3m2!1sen!2ske!4v1651461043065!5m2!1sen!2ske" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
   <b><?php echo htmlspecialchars($records['location'])?></b>
   <p>It a home unlike no other</p>
 </div>
 </div>
   <hr class="line">

   <div class="owner">
    <img src="images/host.png" alt="">
    <div>
     <h2>Owned by <a href="#"><?php echo htmlspecialchars($records['owner_name'])?></a></h2>
     <p><span>
     </span>&nbsp; Please contact owner for more information</p>
     
    </div>
   </div>

</div>



 <!--ionicons script  -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>